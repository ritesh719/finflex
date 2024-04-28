<?php

namespace App\Http\Livewire\CenterManager;

use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CenterManagerListAllCientsComponent extends Component
{
    public function render()
    {
        $c_m = User::find(Auth::user()->id);
        $center_id = $c_m->centerManager->centers->id;
        $clients = Client::where('center_id', $center_id)->get();
        return view('livewire.center-manager.center-manager-list-all-cients-component', ['clients' => $clients])->layout('layouts.cm.base');
    }
}
