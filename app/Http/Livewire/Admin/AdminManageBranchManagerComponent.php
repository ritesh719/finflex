<?php

namespace App\Http\Livewire\Admin;

use App\Models\Branches;
use App\Models\BranchManagers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class AdminManageBranchManagerComponent extends Component

{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $email;
    public $password;
    public $branches_id;

    public function mount()
    {
        $this->branches_id = Branches::select('id')->first()->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'email' => 'required|unique:users,email',
        ]);
    }

    public function showModal()
    {
        $this->dispatchBrowserEvent('show-modal');
    }

    public function addBranchManager()
    {
        $this->validate([
            'email' => 'required|unique:users,email',
        ]);

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->role = 'BM';

        $user->save();

        $branchManager = new BranchManagers();

        $branchManager->user_id = $user->id;
        $branchManager->branches_id = $this->branches_id;

        $branchManager->save();

        $this->dispatchBrowserEvent('hide-modal');
        session()->flash('success', 'New Branch Manager Added Successfully');

        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
    public function render()
    {
        $branches = Branches::all();
        $branchManagers = BranchManagers::orderBy('id', 'ASC')->paginate(5);
        return view('livewire.admin.admin-manage-branch-manager-component', ['branches' => $branches, 'branchManagers' => $branchManagers])->layout('layouts.admin.base');
    }
}
