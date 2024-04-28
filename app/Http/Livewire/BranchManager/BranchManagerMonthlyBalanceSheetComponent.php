<?php

namespace App\Http\Livewire\BranchManager;

use App\Models\BranchBalanceSheet;
use App\Models\Due;
use App\Models\Expense;
use App\Models\FD;
use App\Models\FDWithdrawal;
use App\Models\Loan;
use App\Models\PartialDue;
use App\Models\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BranchManagerMonthlyBalanceSheetComponent extends Component
{
    public $branch;
    public $start_date;
    public $end_date;

    public $data;


    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->branch = $user->branchManager->branches;
        $date = new DateTime();
        $this->start_date = $date->format('Y-m-01');
        $this->end_date = $date->format('Y-m-d');

        $this->data = array();
    }

    public function getBBS()
    {
        unset($this->data);
        $this->data = array();
        $bbs = BranchBalanceSheet::where('branch_id', $this->branch->id)->whereDate('created_at', '>=', $this->start_date)->wheredate('created_at', '<=', $this->end_date)->get();

        foreach ($bbs as $b) {

            $date = $b->created_at;
            $loans = Loan::where('branch_id', $this->branch->id)->whereDate('created_at', $date)->get();
            $l_d = $loans->sum('total_pricipal');
            $proc_c = $loans->sum('processing_fees');
            $ins_c = $loans->sum('insurance');
            $pass_c = $loans->sum('passbook_cost');

            $dues = Due::where('branch_id', $this->branch->id)->whereDate('updated_at', $date)->where('status', 'paid')->get();

            $p_collected = $dues->sum('principal_amount');
            $i_collected = $dues->sum('interest_amount');

            $p_d = PartialDue::where('branch_id', $this->branch->id)->whereDate('updated_at', $date)->where('status', 'paid')->get();

            $p_collected += $p_d->sum('principal_amount');
            $i_collected += $p_d->sum('interest_amount');

            $fds = FD::where('branch_id', $this->branch->id)->whereDate('created_at', $date)->get();

            $fd_c = $fds->sum('principal');

            $fdw = FDWithdrawal::where('branch_id', $this->branch->id)->whereDate('created_at', $date)->get();

            $fd_w = $fdw->sum('amount');

            $expenses = Expense::where('branch_id', $this->branch->id)->whereDate('created_at', $date)->get();


            $push_data = [
                'date' => $b->created_at->format('d/m/Y'),
                'opening_balance' => $b->opening_balance,
                'principal' => $p_collected,
                'interest' => $i_collected,
                'processing' => $proc_c,
                'insurance' => $ins_c,
                'passbook' => $pass_c,
                'fd_collected' => $fd_c,
                'fd_withdrawal' => $fd_w,
                'loan_disbursed' => $l_d,
                'expenses' => $expenses->sum('amount'),
                'closing_balance' => $b->closing_balance,
            ];

            array_push($this->data, $push_data);
        }
    }

    public function render()
    {
        $this->getBBS();
        return view('livewire.branch-manager.branch-manager-monthly-balance-sheet-component')->layout('layouts.bm.base');
    }
}
