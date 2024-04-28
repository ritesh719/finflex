<?php

namespace App\Http\Livewire\Admin;

use App\Models\Branches;
use App\Models\Fund;
use Livewire\Component;

class AdminAddFundsComponent extends Component
{
    public $branches;
    public $funding_amount;
    public $selected_branch_id;

    public function mount()
    {
    }

    public function addFundsToBranch()
    {
        $branch = Branches::find($this->selected_branch_id);
        $branch->total_allocated_funds += $this->funding_amount;
        $branch->balance += $this->funding_amount;

        $branch->save();

        $funds = new Fund();
        $funds->fund_amount = $this->funding_amount;
        $funds->branch_id = $this->selected_branch_id;
        $funds->save();

        $this->selected_branch_id = '';
        $this->funding_amount = '';
    }

    public function render()
    {
        $this->branches = Branches::all();
        return view('livewire.admin.admin-add-funds-component')->layout('layouts.admin.base');
    }
}
