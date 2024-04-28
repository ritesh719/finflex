<?php

namespace App\Http\Livewire\Admin;

use App\Models\Branches;
use App\Models\CenterManagers;
use App\Models\Centers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class AdminManageCenterManagerComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $email;
    public $password;
    public $center_id;
    public $branch_id;

    public function mount()
    {
        $this->branch_id = Branches::select('id')->first()->id;
        $this->center_id = Centers::where('branch_id', $this->branch_id)->select('id')->first()->id;
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

    public function addCenterManager()
    {
        $this->validate([
            'email' => 'required|unique:users,email',
        ]);

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->role = 'CM';

        $user->save();

        $centerManager = new CenterManagers();

        $centerManager->user_id = $user->id;
        $centerManager->centers_id = $this->center_id;

        $centerManager->save();

        $this->dispatchBrowserEvent('hide-modal');
        session()->flash('success', 'New Center Manager Added Successfully');

        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function render()
    {
        $centers = Centers::where('branch_id', $this->branch_id)->get();
        $centerIds = Centers::where('branch_id', $this->branch_id)->pluck('id');
        $centerManagers = CenterManagers::whereIn('centers_id', $centerIds)->orderBy('id', 'ASC')->paginate(5);
        $branches = Branches::all();
        return view('livewire.admin.admin-manage-center-manager-component', ['branches' => $branches, 'centers' => $centers, 'centerManagers' => $centerManagers])->layout('layouts.admin.base');
    }
}
