<?php

namespace App\Http\Livewire\BranchManager;

use App\Models\Centers;
use App\Models\Closing;
use App\Models\Due;
use App\Models\FD;
use App\Models\FDWithdrawal;
use App\Models\Loan;
use App\Models\PartialDue;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CDSReportComponent extends Component
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

    public $cds_data;


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

    public function getCDSData()
    {

        unset($this->cds_data);
        $this->cds_data = array();
        
        $cds_date = Carbon::tomorrow();
        
        if($cds_date->format('l') == 'Saturday' || $cds_date->format('l') == 'Sunday'){
            $cds_date = $cds_date->next('Monday')->format('Y-m-d');
        }
        
        

        foreach ($this->centers as $c) {

            $dues = Due::where('center_id', $c->id)->whereDate('due_on_date', '<=', $cds_date)->where('status', 'not paid')->orderBy('due_on_date', 'desc')->get();
            $pd = PartialDue::where('center_id', $c->id)->where('status', 'not paid')->get();
            $td = Due::where('center_id', $c->id)->whereDate('due_on_date', '<=', $cds_date)->where('status', 'not paid')->orderBy('due_on_date', 'desc')->get()->sum('total_amount');
            $tpd = PartialDue::where('center_id', $c->id)->where('status', 'not paid')->get()->sum('total_amount');
            $push_data = [
                'center_name' => $c->name,
                'center_id' => $c->center_id,
                'due_data' => $dues,
                'partial_due_data' => $pd,
                'total_due' => $td+$tpd,
            ];

            array_push($this->cds_data, $push_data);
        }
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

    public function render()
    {
        $this->getCPR();
        $this->getCDSData();
        return view('livewire.branch-manager.c-d-s-report-component')->layout('layouts.bm.base');
    }
}
