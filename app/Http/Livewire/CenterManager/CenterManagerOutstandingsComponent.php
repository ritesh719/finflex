<?php

namespace App\Http\Livewire\CenterManager;

use App\Models\Outstanding;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CenterManagerOutstandingsComponent extends Component
{
    public $center;
    public $branch;
    public $outstanding;
    public function mount()
    {
        $c_m = User::find(Auth::user()->id);

        $this->center = $c_m->centerManager->centers;
        $this->branch = $c_m->centerManager->centers->branch;
    }

    public function render()
    {
        $this->outstanding = Outstanding::where('center_id', $this->center->id)->get()[0];
        return view('livewire.center-manager.center-manager-outstandings-component')->layout('layouts.cm.base');
    }
}
