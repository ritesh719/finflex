<?php

namespace App\Http\Livewire\CenterManager;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CenterManagerListAllLoansComponent extends Component
{
    public function render()
    {
        $c_m = User::find(Auth::user()->id);
        $center_id = $c_m->centerManager->centers->id;
        $loans = Loan::where('center_id', $center_id)->get();
        return view('livewire.center-manager.center-manager-list-all-loans-component', ['loans' => $loans])->layout('layouts.cm.base');
    }
}
