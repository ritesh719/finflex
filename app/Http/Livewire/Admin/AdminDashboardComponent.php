<?php

namespace App\Http\Livewire\Admin;

use App\Models\Centers;
use App\Models\Client;
use App\Models\FD;
use App\Models\Loan;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public $total_centers;
    public $total_clients;
    public $total_loans;
    public $total_fds;

    public function mount()
    {
        $this->total_centers = Centers::count();
        $this->total_clients = Client::count();
        $this->total_loans = Loan::count();
        $this->total_fds = FD::count();
    }

    public function render()
    {
        return view('livewire.admin.admin-dashboard-component')->layout('layouts.admin.base');
    }
}
