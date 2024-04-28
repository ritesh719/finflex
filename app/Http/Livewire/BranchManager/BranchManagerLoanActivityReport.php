<?php

namespace App\Http\Livewire\BranchManager;

use App\Models\Centers;
use App\Models\FD;
use App\Models\FDWithdrawal;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BranchManagerLoanActivityReport extends Component
{
    public $branch;
    public $data;

    public $overall_outstanding_amount;
    public $overall_total_loans;
    public $overall_total_amount_given;
    public $overall_principal_collected;
    public $overall_principal_due;
    public $overall_interest_collected;
    public $overall_interest_due;
    public $overall_processing_collected;
    public $overall_insurance_collected;
    public $overall_passbook_collected;
    public $overall_fd_deposit;
    public $overall_fd_withdrawal;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->branch = $user->branchManager->branches;
        $this->data = array();
    }

    public function getLAR()
    {
        $centers = Centers::where('branch_id', $this->branch->id)->get();

        foreach ($centers as $center) {


            $loans = Loan::where('center_id', $center->id)->get();

            $outstanding_amount = $loans->sum('due_amount');
            $total_loans = count($loans);
            $total_amount_given = $loans->sum('total_pricipal');
            $principal_collected = $loans->sum('paid_pricipal');
            $principal_due = $loans->sum('due_pricipal');
            $interest_collected = $loans->sum('paid_interest');
            $interest_due = $loans->sum('due_interest');
            $processing_collected = $loans->sum('processing_fees');
            $insurance_collected = $loans->sum('insurance');
            $passbook_collected = $loans->sum('passbook_cost');

            $fd = FD::where('center_id', $center->id)->get();

            $fd_deposit = $fd->sum('principal');

            $fd_w = FDWithdrawal::where('center_id', $center->id)->get();

            $fd_withdrawal = $fd_w->sum('amount');


            $push_data = [
                'center_id' => $center->center_id,
                'center_name' => $center->center_name,
                'outstanding_amount' => $outstanding_amount,
                'total_loans' => $total_loans,
                'total_amount_given' => $total_amount_given,
                'principal_collected' => $principal_collected,
                'principal_due' => $principal_due,
                'interest_collected' => $interest_collected,
                'interest_due' => $interest_due,
                'processing_collected' => $processing_collected,
                'insurance_collected' => $insurance_collected,
                'passbook_collected' => $passbook_collected,
                'fd_deposit' => $fd_deposit,
                'fd_withdrawal' => $fd_withdrawal,
            ];

            array_push($this->data, $push_data);

            $this->overall_outstanding_amount += $outstanding_amount;
            $this->overall_total_loans += $total_loans;
            $this->overall_total_amount_given += $total_amount_given;
            $this->overall_principal_collected += $principal_collected;
            $this->overall_principal_due += $principal_due;
            $this->overall_interest_collected += $interest_collected;
            $this->overall_interest_due += $interest_due;
            $this->overall_processing_collected += $processing_collected;
            $this->overall_insurance_collected += $insurance_collected;
            $this->overall_passbook_collected += $passbook_collected;
            $this->overall_fd_deposit += $fd_deposit;
            $this->overall_fd_withdrawal += $fd_withdrawal;
        }
    }

    public function render()
    {
        $this->getLAR();
        return view('livewire.branch-manager.branch-manager-loan-activity-report')->layout('layouts.bm.base');
    }
}
