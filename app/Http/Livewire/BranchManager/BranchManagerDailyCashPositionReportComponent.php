<?php

namespace App\Http\Livewire\BranchManager;

use App\Models\BranchBalanceSheet;
use App\Models\Centers;
use App\Models\Branches;
use App\Models\Closing;
use App\Models\Due;
use App\Models\Expense;
use App\Models\PartialDue;
use App\Models\FD;
use App\Models\FDWithdrawal;
use App\Models\Loan;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BranchManagerDailyCashPositionReportComponent extends Component
{
    public $center_wise_data;
    public $overall_total_principal;
    public $overall_total_interest;
    public $overall_total_processing_fees;
    public $overall_total_insurance;
    public $overall_total_passbook;
    public $overall_total_fd_deposit;
    public $overall_total_fd_withdrawl;
    public $overall_total_collected;
    public $overall_total_disbursed;
    public $overall_loan_disbursed;

    public $income;
    public $expense;


    public $meeting_date;

    public $branch;
    public $centers;

    public $is_branch_closed;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->branch = $user->branchManager->branches;
        $this->centers = Centers::where('branch_id', $this->branch->id)->get();
        $this->center_wise_data = array();
        $this->overall_total = array();
        $current_date = new DateTime();
        $this->meeting_date = $current_date->format('Y-m-d');
    }

    public function getCPR()
    {
        unset($this->center_wise_data);
        $this->center_wise_data = array();
        $this->income = 0;
        $this->expense = 0;
        foreach ($this->centers as $center) {

            $total_disbursed_amount = 0;
            $total_processing_fees = 0;
            $total_insurance = 0;
            $total_principal = 0;
            $total_interest = 0;
            $total_fd_deposit = 0;
            $total_fd_withdrawl = 0;
            $total_passbook = 0;

            $loans = Loan::where('center_id', $center->id)->whereDate('created_at', $this->meeting_date)->get();

            foreach ($loans as $loan) {
                $total_disbursed_amount += $loan->total_pricipal;
                $total_processing_fees += $loan->processing_fees;
                $total_insurance += $loan->insurance;
                $total_passbook += $loan->passbook_cost;
            }

            $dues = Due::where('center_id', $center->id)->whereDate('updated_at', $this->meeting_date)->where('status', 'paid')->get();

            foreach ($dues as $due) {
                $total_principal += $due->principal_amount;
                $total_interest += $due->interest_amount;
            }
            
            $p_cs = PartialDue::where('center_id', $center->id)->whereDate('updated_at', $this->meeting_date)->where('status', 'paid')->get();
            
            foreach ($p_cs as $due) {
                $total_principal += $due->principal_amount;
                $total_interest += $due->interest_amount;
            }

            $fds_deposit = FD::where('center_id', $center->id)->whereDate('created_at', $this->meeting_date)->where('status', 'open')->get();

            foreach ($fds_deposit as $fd_d) {
                $total_fd_deposit += $fd_d->principal;
            }

            $fds_withdrawl = FDWithdrawal::where('center_id', $center->id)->whereDate('created_at', $this->meeting_date)->get();

            foreach ($fds_withdrawl as $fd_w) {
                $total_fd_withdrawl += $fd_w->amount;
            }

            $is_center_closed = count(Closing::where('center_id', $center->id)->whereDate('created_at', $this->meeting_date)->get());

            $center_data = [
                'closing_status' => $is_center_closed,
                'center_name' => $center->name,
                'center_id' => $center->center_id,
                'total_principal' => $total_principal,
                'total_interest' => $total_interest,
                'total_passbook' => $total_passbook,
                'total_processing_fees' => $total_processing_fees,
                'total_insurance' => $total_insurance,
                'total_fd_deposit' => $total_fd_deposit,
                'total_fd_withdrawl' => $total_fd_withdrawl,
                'total_collected' => $total_principal + $total_interest + $total_processing_fees + $total_insurance + $total_fd_deposit + $total_passbook,
                'loan_disbursed' => $total_disbursed_amount,
                'total_disbursed' => $total_disbursed_amount + $total_fd_withdrawl,
            ];

            $this->income += $center_data['total_collected'];
            $this->expense += $center_data['total_disbursed'];

            array_push($this->center_wise_data, $center_data);
        }
    }

    public function closeBranch()
    {
        $user = User::find(Auth::user()->id);
        $branch = $user->branchManager->branches;

        $expense = Expense::where('branch_id', $branch->id)->whereDate('created_at', $this->meeting_date)->get();

        $this->expense += $expense->sum('amount');

        $is_old_branch = count(BranchBalanceSheet::where('branch_id', $branch->id)->get());

        $prev_entries = count(BranchBalanceSheet::where('branch_id', $branch->id)->whereDate('created_at', '>', $this->meeting_date)->get());

        if (!$is_old_branch) {
            $bbs = new BranchBalanceSheet();
            $bbs->opening_balance = $branch->total_allocated_funds;
            $bbs->closing_balance = $branch->total_allocated_funds + $this->income - $this->expense;
            $bbs->branch_id = $branch->id;
            $bbs->created_at = $this->meeting_date;
            
            $brn = Branches::find($branch->id);
            $brn->balance += ($this->income - $this->expense);
            $brn->save();
            $bbs->save();
        } else {
            $bbs = new BranchBalanceSheet();
            $last_entry =  BranchBalanceSheet::where('branch_id', $branch->id)->latest('created_at')->first();
            $interval = $last_entry->created_at->diff($this->meeting_date);
            if ($interval->days > 1) {
                $this->dispatchBrowserEvent('show-modal');
            } else {
                $brn = Branches::find($branch->id);
                
                $last_entry = $brn->balance;
                $brn->balance = $brn->balance + $this->income - $this->expense;
                $brn->save();
                $bbs->opening_balance = $last_entry;
                $bbs->closing_balance = $bbs->opening_balance + $this->income - $this->expense;
                $bbs->branch_id = $branch->id;
                $bbs->created_at = $this->meeting_date;
                $bbs->save();
            }
        }
    }

    public function render()
    {
        $user = User::find(Auth::user()->id);
        $branch_id = $user->branchManager->branches->id;
        $this->getCPR();
        $this->is_branch_closed = count(BranchBalanceSheet::where('branch_id', $branch_id)->whereDate('created_at', $this->meeting_date)->get());
        return view('livewire.branch-manager.branch-manager-daily-cash-position-report-component')->layout('layouts.bm.base');
    }
}



// <?php
// $a = array();
// $a1 = array();
// $a2 = array();
// array_push($a1, ['name' => 'a1', 'num' => '1']);
// array_push($a2, ['name' => 'a2', 'num' => '2']);
// array_push($a, $a1);
// array_push($a, $a2);

// foreach($a as $o)
// {
//     echo $o[0]['name'].'  '.$o[0]['num'];
//     echo '<br>';
// }
// 
