<?php

namespace App\Http\Livewire\Admin;

use App\Models\Branches;
use App\Models\Centers;
use App\Models\Outstanding;
use Livewire\Component;
use Livewire\WithPagination;

class AdminManageCenter extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $remarks;
    public $center_id;
    public $branch_id;
    public $selected_branch;

    public function mount()
    {
        $this->selected_branch = Branches::select('id')->first()->id;
        $this->branch_id = $this->selected_branch;
    }

    public function showModal()
    {
        $this->dispatchBrowserEvent('show-modal');
    }

    public function addCenter()
    {

        $center = new Centers();
        $center->name = $this->name;
        $center->branch_id = $this->branch_id;
        $center->center_id = $this->center_id;
        $center->remarks = $this->remarks;
        $center->save();

        $outstanding = new Outstanding();
        $outstanding->principal_outstanding = 0;
        $outstanding->interest_outstanding = 0;
        $outstanding->fd_outstanding = 0;
        $outstanding->total_outstanding = 0;
        $outstanding->principal_risk_outstanding = 0;
        $outstanding->interest_risk_outstanding = 0;
        $outstanding->total_risk_outstanding = 0;
        $outstanding->center_id = $center->id;
        $outstanding->branch_id = $this->branch_id;
        $outstanding->save();

        $this->name = '';
        $this->remarks = '';
        $this->center_id = '';

        $this->dispatchBrowserEvent('hide-modal');
        session()->flash('success', 'New Center Added Successfully');
    }

    public function render()
    {
        $this->branch_id = $this->selected_branch;
        $centers = Centers::where('branch_id', $this->selected_branch)->orderBy('id', 'DESC')->paginate(5);
        $branches = Branches::all();
        return view('livewire.admin.admin-manage-center', ['centers' => $centers, 'branches' => $branches])->layout('layouts.admin.base');
    }
}
