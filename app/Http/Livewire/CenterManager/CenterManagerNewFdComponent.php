<?php

namespace App\Http\Livewire\CenterManager;

use App\Models\Client;
use App\Models\FD;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CenterManagerNewFdComponent extends Component
{

    public $client_id;
    public $fd_opening_date;
    public $client_name;
    public $clients;
    public $fd_amount;
    public $tenure_months;
    public $interest_rate;


    public function mount()
    {
        $c_m = User::find(Auth::user()->id);
        $center_id = $c_m->centerManager->centers->id;
        $this->clients = Client::where('center_id', $center_id)->get();
        $current_date = new DateTime();
        $this->fd_opening_date = $current_date->format('Y-m-d');
    }

    public function createNewFd()
    {

        $c_m = User::find(Auth::user()->id);
        $center_id = $c_m->centerManager->centers->id;
        $branch_id = $c_m->centerManager->centers->branch->id;

        $fd = new FD();

        $fd->principal = $this->fd_amount;
        $fd->interest = $this->interest_rate;
        $fd->amount = $fd->principal;
        $fd->tenure_months = 'NA';


        $fd->mature_on = 'NA';

        $fd->status = 'open';
        $fd->client_id = $this->client_id;
        $fd->branch_id = $branch_id;
        $fd->center_id = $center_id;
        $fd->created_at = $this->fd_opening_date;

        $fd->save();

        session()->flash('fd_created_successfully', 'New FD Created');

        return redirect(route('centermanager.newfd'));
    }

    public function render()
    {
        $this->client_name = Client::where('id', $this->client_id)->pluck('name');
        return view('livewire.center-manager.center-manager-new-fd-component')->layout('layouts.cm.base');
    }
}
