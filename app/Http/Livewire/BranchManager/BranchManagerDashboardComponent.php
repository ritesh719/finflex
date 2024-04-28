<?php

namespace App\Http\Livewire\BranchManager;

use App\Models\Centers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BranchManagerDashboardComponent extends Component
{
    public $branch;
    public $centers;
    public $total_clients;
    public $total_loans;
    public $total_fds;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->branch = $user->branchManager->branches;
        $this->centers = Centers::where('branch_id', $this->branch->id)->get();

        foreach ($this->centers as $c) {
            $this->total_clients += count($c->client);
            $this->total_loans += count($c->loan);
            $this->total_fds += count($c->fd);
        }
    }

    public function render()
    {
        return view('livewire.branch-manager.branch-manager-dashboard-component')->layout('layouts.bm.base');
    }
}
