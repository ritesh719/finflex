<?php

namespace App\Http\Livewire\BranchManager;

use App\Models\Centers;
use App\Models\Expense;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BranchManagerExpenseReportComponent extends Component
{

    public $meeting_date_from;
    public $meeting_date_to;

    public $branch;
    public $centers;

    public $expenses;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->branch = $user->branchManager->branches;
        $this->centers = Centers::where('branch_id', $this->branch->id)->get();
        $this->center_wise_data = array();
        $this->overall_total = array();
        $current_date = new DateTime();
        $this->meeting_date_from = $current_date->format('Y-m-01');
        $this->meeting_date_to = $current_date->format('Y-m-d');
    }

    public function getExpense()
    {
        $this->expenses = Expense::where('branch_id', $this->branch->id)->whereDate('created_at', '>=', $this->meeting_date_from)->whereDate('created_at', '<=', $this->meeting_date_to)->get();
    }

    public function render()
    {
        $this->getExpense();
        return view('livewire.branch-manager.branch-manager-expense-report-component')->layout('layouts.bm.base');
    }
}
