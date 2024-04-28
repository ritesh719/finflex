<?php

namespace App\Http\Livewire\BranchManager;

use App\Models\Expense;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BranchManagerExpenseComponent extends Component
{
    public $name;
    public $amount;
    public $remarks;
    public $meeting_date;
    public $branch;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->branch = $user->branchManager->branches;
        $current_date = new DateTime();
        $this->meeting_date = $current_date->format('Y-m-d');
    }

    public function addExpense()
    {
        $expense = new Expense();
        $expense->name = $this->name;
        $expense->amount = $this->amount;
        if ($this->remarks) {
            $expense->remarks = $this->remarks;
        }
        $expense->branch_id = $this->branch->id;
        $expense->created_at = $this->meeting_date;

        $expense->save();

        session()->flash('success', 'Expense Added Successfully');
        return redirect(route('branchmanager.expense'));
    }

    public function render()
    {
        return view('livewire.branch-manager.branch-manager-expense-component')->layout('layouts.bm.base');
    }
}
