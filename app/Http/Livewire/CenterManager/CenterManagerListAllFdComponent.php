<?php

namespace App\Http\Livewire\CenterManager;

use App\Models\FD;
use App\Models\FDWithdrawal;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CenterManagerListAllFdComponent extends Component
{
    public $selected_date;
    public $selected_fd_id;
    public $principal;
    public $interest;
    public $total_amount;
    public $branch_id;
    public $center_id;

    public function mount()
    {
        $today = new DateTime();
        $this->selected_date = $today->format('Y-m-d');
    }

    public function closeFD()
    {
        $fd_w = new FDWithdrawal();
        $fd_w->amount = $this->total_amount;
        $fd_w->principal = $this->principal;
        $fd_w->interest = $this->interest;
        $fd_w->fd_id = $this->selected_fd_id;
        $fd_w->created_at = $this->selected_date;
        $fd_w->branch_id = $this->branch_id;
        $fd_w->center_id = $this->center_id;

        $fd = FD::find($this->selected_fd_id);
        $fd->amount = $this->total_amount;
        $fd->mature_on = $this->selected_date;
        $fd->status = 'closed';

        $fd_w->client_id = $fd->client_id;

        $fd_w->save();
        $fd->save();
        $this->dispatchBrowserEvent('hide-modal');
    }

    public function openModal($id)
    {
        $this->selected_fd_id = $id;
        $this->calculateFd();
        $this->dispatchBrowserEvent('show-modal');
    }

    public function calculateFd()
    {
        $fd = FD::find($this->selected_fd_id);
        $this->principal = $fd->principal;
        $this->branch_id = $fd->branch_id;
        $this->center_id = $fd->center_id;

        $start = new DateTime($fd->created_at);
        $end = new DateTime($this->selected_date);
        if ($start < $end) {
            $interval = $start->diff($end);
            $this->interest = $this->principal * ($fd->interest / 100) * ($interval->days / 30);
            $this->total_amount = $this->principal + $this->interest;
        } else {
            $this->interest = 'NA';
            $this->total_amount = 'NA';
        }
    }

    public function render()
    {
        $c_m = User::find(Auth::user()->id);
        $center_id = $c_m->centerManager->centers->id;
        $fds = FD::where('center_id', $center_id)->get();
        return view('livewire.center-manager.center-manager-list-all-fd-component', ['fds' => $fds])->layout('layouts.cm.base');
    }
}
