<?php

namespace App\Http\Livewire\BranchManager;

use App\Models\Outstanding;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BranchManagerOutstandingComponent extends Component
{
    public $branch;

    public $overall_outstandings;
    public $overall_principal_outstanding;
    public $overall_interest_outstanding;
    public $overall_fd_outstanding;
    public $overall_total_outstanding;
    public $overall_principal_risk_outstanding;
    public $overall_interest_risk_outstanding;
    public $overall_total_risk_outstanding;


    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->branch = $user->branchManager->branches;
    }
    public function render()
    {
        $this->outstandings = Outstanding::where('branch_id', $this->branch->id)->get();

        $this->overall_outstandings = $this->outstandings->sum('outstandings');
        $this->overall_principal_outstanding = $this->outstandings->sum('principal_outstanding');
        $this->overall_interest_outstanding = $this->outstandings->sum('interest_outstanding');
        $this->overall_fd_outstanding = $this->outstandings->sum('fd_outstanding');
        $this->overall_total_outstanding = $this->outstandings->sum('total_outstanding');
        $this->overall_principal_risk_outstanding = $this->outstandings->sum('principal_risk_outstanding');
        $this->overall_interest_risk_outstanding = $this->outstandings->sum('interest_risk_outstanding');
        $this->overall_total_risk_outstanding = $this->outstandings->sum('total_risk_outstanding');

        return view('livewire.branch-manager.branch-manager-outstanding-component')->layout('layouts.bm.base');
    }
}
