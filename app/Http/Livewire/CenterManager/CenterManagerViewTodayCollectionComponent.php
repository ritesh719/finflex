<?php

namespace App\Http\Livewire\CenterManager;

use App\Models\Due;
use App\Models\FD;
use App\Models\Loan;
use App\Models\PartialDue;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CenterManagerViewTodayCollectionComponent extends Component
{
    public $t_amnt;
    public $t_p;
    public $t_int;
    public $flag;
    public $t_p_f;
    public $t_p_c;
    public $t_ins;
    public $t_fd;


    public function mount()
    {
        $this->flag = 1;
    }

    public function render()
    {
        $user = User::find(Auth::user()->id);
        $c_id = $user->centerManager->centers->id;

        $branch = $user->centerManager->centers->branch;
        $center = $user->centerManager->centers;

        $dues = Due::where('center_id', $c_id)->where('status', 'paid')->whereDate('updated_at', Carbon::today())->get();

        $loans = Loan::where('center_id', $c_id)->whereDate('created_at', Carbon::today())->get();

        $fds = FD::where('center_id', $c_id)->whereDate('created_at', Carbon::today())->get();

        $p_cs = PartialDue::where('center_id', $c_id)->whereDate('updated_at', Carbon::today())->get();

        return view('livewire.center-manager.center-manager-view-today-collection-component', ['p_cs' => $p_cs, 'dues' => $dues, 'branch' => $branch, 'center' => $center, 'loans' => $loans, 'fds' => $fds])->layout('layouts.cm.base');
    }
}
