<?php

namespace App\Http\Livewire\BranchManager;

use App\Models\Centers;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class BranchManagerListAllClientsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $center_id;
    public $centers;

    public function mount()
    {
        $c_m = User::find(Auth::user()->id);
        $branch = $c_m->branchManager->branches;
        $this->centers = Centers::where('branch_id', $branch->id)->get();

        $this->center_id = Centers::where('branch_id', $branch->id)->first()->id;
    }

    public function render()
    {

        $clients = Client::where('center_id', $this->center_id)->paginate(30);
        return view('livewire.branch-manager.branch-manager-list-all-clients-component', ['clients' => $clients])->layout('layouts.bm.base');
    }
}
