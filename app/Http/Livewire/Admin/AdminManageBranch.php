<?php

namespace App\Http\Livewire\Admin;

use App\Models\Branches;
use Livewire\Component;
use Livewire\WithPagination;

class AdminManageBranch extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $remarks;

    public function showModal()
    {
        $this->dispatchBrowserEvent('show-modal');
    }

    public function addBranch()
    {

        $branch = new Branches();
        $branch->name = $this->name;
        $branch->remarks = $this->remarks;
        $branch->save();

        $this->name = '';
        $this->remarks = '';

        $this->dispatchBrowserEvent('hide-modal');
        session()->flash('success', 'New Branch Added Successfully');
    }

    public function render()
    {
        $branches = Branches::orderBy('id', 'ASC')->paginate(5);
        return view('livewire.admin.admin-manage-branch', ['branches' => $branches])->layout('layouts.admin.base');
    }
}
