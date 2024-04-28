<?php

namespace App\Http\Livewire\CenterManager;

use App\Models\Branches;
use App\Models\Closing;
use App\Models\Due;
use App\Models\FD;
use App\Models\FDWithdrawal;
use App\Models\Loan;
use App\Models\Outstanding;
use App\Models\PartialDue;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CenterManagerClosingComponent extends Component
{

    public $selected_date;

    public $t_amnt;
    public $flag;
    public $t_p_f;
    public $t_ins;
    public $t_p_c;
    public $t_fd;
    public $t_l_d;
    public $t_fd_w;

    public $total_income;
    public $total_expense;

    public $is_closing_done;
    public $c_id;


    public function mount()
    {
        $current_date = new DateTime();
        $this->selected_date = $current_date->format('Y-m-d');
        $this->flag = 1;

        $user = User::find(Auth::user()->id);
        $this->c_id = $user->centerManager->centers->id;
    }

    public function closeCenter()
    {
        $user = User::find(Auth::user()->id);
        $center_id = $user->centerManager->centers->id;

        $s_d = new DateTime($this->selected_date);

        if (!count(Closing::where('center_id', $center_id)->get())) {
            $loans = Loan::where('center_id', $center_id)->whereDate('created_at', $s_d)->get();

            $total_principal = $loans->sum('total_pricipal');
            $total_interest = $loans->sum('total_interest');
            $total_amount = $loans->sum('total_amount');

            $dues = Due::where('center_id', $center_id)->whereDate('due_on_date', $s_d)->whereDate('updated_at', $s_d)->where('status', 'paid')->get();

            $total_principal_paid = $dues->sum('principal_amount');
            $total_interest_paid = $dues->sum('interest_amount');
            $total_amount_paid = $dues->sum('total_amount');

            $fds = FD::where('center_id', $center_id)->whereDate('created_at', $s_d)->get();

            $total_fd_deposit = $fds->sum('principal');

            $fd_w = FDWithdrawal::where('center_id', $center_id)->whereDate('created_at', $s_d)->get();

            $total_fd_withdrawal = $fd_w->sum('amount');

            $p_d_c = PartialDue::where('center_id', $center_id)->whereDate('updated_at', $s_d)->get();

            $total_partial_amount_collected = $p_d_c->sum('total_amount');
            $total_partial_principal_collected = $p_d_c->sum('principal_amount');
            $total_partial_interest_collected = $p_d_c->sum('interest_amount');

            $risk_dues = Due::where('center_id', $center_id)->whereDate('due_on_date', $s_d)->where('status', 'not paid')->get();

            $total_risk_principal = $risk_dues->sum('principal_amount');
            $total_risk_interest = $risk_dues->sum('interest_amount');
            $total_risk_amount = $risk_dues->sum('total_amount');

            $risk_collection = Due::where('center_id', $center_id)->whereDate('due_on_date', '!=', $s_d)->whereDate('updated_at', $s_d)->where('status', 'paid')->get();

            $total_risk_principal_collection = $risk_collection->sum('principal_amount');
            $total_risk_interest_collection = $risk_collection->sum('interest_amount');
            $total_risk_amount_collcetion = $risk_collection->sum('total_amount');

            $risk_partial = PartialDue::where('center_id', $center_id)->whereDate('created_at', $s_d)->get();

            $total_risk_principal += $risk_partial->sum('principal_amount');
            $total_risk_interest += $risk_partial->sum('interest_amount');
            $total_risk_amount += $risk_partial->sum('total_amount');

            $outstanding = Outstanding::where('center_id', $center_id)->get();

            $outstanding[0]->principal_outstanding += ($total_principal - $total_principal_paid - $total_partial_principal_collected - $total_risk_principal_collection);


            $outstanding[0]->interest_outstanding += ($total_interest - $total_interest_paid - $total_partial_interest_collected - $total_risk_interest_collection);

            $outstanding[0]->fd_outstanding += ($total_fd_withdrawal - $total_fd_deposit);

            $outstanding[0]->total_outstanding = $outstanding[0]->principal_outstanding + $outstanding[0]->interest_outstanding + $outstanding[0]->fd_outstanding;

            $outstanding[0]->principal_risk_outstanding += ($total_risk_principal - $total_risk_principal_collection);
            $outstanding[0]->interest_risk_outstanding += ($total_risk_interest - $total_risk_interest_collection);
            $outstanding[0]->total_risk_outstanding = $outstanding[0]->principal_risk_outstanding + $outstanding[0]->interest_risk_outstanding;

            // dd($outstanding[0]);
            $outstanding[0]->save();

            $closing = new Closing();
            $closing->status = 'closed';
            $closing->center_id = $this->c_id;
            $closing->created_at = $this->selected_date;
            $closing->save();
        } else {
            $last_entry = Closing::where('center_id', $center_id)->latest('created_at')->first();
            $interval = $last_entry->created_at->diff($s_d);
            if ($interval->days > 1) {
                $this->dispatchBrowserEvent('show-modal');
            } else {
                $loans = Loan::where('center_id', $center_id)->whereDate('created_at', $s_d)->get();

                $total_principal = $loans->sum('total_pricipal');
                $total_interest = $loans->sum('total_interest');
                $total_amount = $loans->sum('total_amount');

                $dues = Due::where('center_id', $center_id)->whereDate('due_on_date', $s_d)->whereDate('updated_at', $s_d)->where('status', 'paid')->get();

                $total_principal_paid = $dues->sum('principal_amount');
                $total_interest_paid = $dues->sum('interest_amount');
                $total_amount_paid = $dues->sum('total_amount');

                $fds = FD::where('center_id', $center_id)->whereDate('created_at', $s_d)->get();

                $total_fd_deposit = $fds->sum('principal');

                $fd_w = FDWithdrawal::where('center_id', $center_id)->whereDate('created_at', $s_d)->get();

                $total_fd_withdrawal = $fd_w->sum('amount');

                $p_d_c = PartialDue::where('center_id', $center_id)->whereDate('updated_at', $s_d)->get();

                $total_partial_amount_collected = $p_d_c->sum('total_amount');
                $total_partial_principal_collected = $p_d_c->sum('principal_amount');
                $total_partial_interest_collected = $p_d_c->sum('interest_amount');

                $risk_dues = Due::where('center_id', $center_id)->whereDate('due_on_date', $s_d)->where('status', 'not paid')->get();

                $total_risk_principal = $risk_dues->sum('principal_amount');
                $total_risk_interest = $risk_dues->sum('interest_amount');
                $total_risk_amount = $risk_dues->sum('total_amount');

                $risk_collection = Due::where('center_id', $center_id)->whereDate('due_on_date', '!=', $s_d)->whereDate('updated_at', $s_d)->where('status', 'paid')->get();

                $total_risk_principal_collection = $risk_collection->sum('principal_amount');
                $total_risk_interest_collection = $risk_collection->sum('interest_amount');
                $total_risk_amount_collcetion = $risk_collection->sum('total_amount');

                $risk_partial = PartialDue::where('center_id', $center_id)->whereDate('created_at', $s_d)->get();

                $total_risk_principal += $risk_partial->sum('principal_amount');
                $total_risk_interest += $risk_partial->sum('interest_amount');
                $total_risk_amount += $risk_partial->sum('total_amount');

                $outstanding = Outstanding::where('center_id', $center_id)->get();

                $outstanding[0]->principal_outstanding += ($total_principal - $total_principal_paid - $total_partial_principal_collected - $total_risk_principal_collection);


                $outstanding[0]->interest_outstanding += ($total_interest - $total_interest_paid - $total_partial_interest_collected - $total_risk_interest_collection);

                $outstanding[0]->fd_outstanding += ($total_fd_withdrawal - $total_fd_deposit);

                $outstanding[0]->total_outstanding = $outstanding[0]->principal_outstanding + $outstanding[0]->interest_outstanding + $outstanding[0]->fd_outstanding;

                $outstanding[0]->principal_risk_outstanding += ($total_risk_principal - $total_risk_principal_collection);
                $outstanding[0]->interest_risk_outstanding += ($total_risk_interest - $total_risk_interest_collection);
                $outstanding[0]->total_risk_outstanding = $outstanding[0]->principal_risk_outstanding + $outstanding[0]->interest_risk_outstanding;

                // dd($outstanding[0]);
                $outstanding[0]->save();

                $closing = new Closing();
                $closing->status = 'closed';
                $closing->center_id = $this->c_id;
                $closing->created_at = $this->selected_date;
                $closing->save();
            }
        }
    }


    public function render()
    {
        $user = User::find(Auth::user()->id);
        $c_id = $user->centerManager->centers->id;

        $branch = $user->centerManager->centers->branch;
        $center = $user->centerManager->centers;

        $this->is_closing_done = Closing::where('center_id', $this->c_id)->whereDate('created_at', $this->selected_date)->get()->count();

        $dues = Due::where('center_id', $c_id)->where('status', 'paid')->whereDate('updated_at', $this->selected_date)->get();
        $this->total_income = $dues->sum('total_amount');

        $loans = Loan::where('center_id', $c_id)->whereDate('created_at', $this->selected_date)->get();
        $this->total_income += $loans->sum('processing_fees');
        $this->total_income += $loans->sum('insurance');
        $this->total_income += $loans->sum('passbook_cost');
        $this->total_expense = $loans->sum('total_pricipal');

        $fds = FD::where('center_id', $c_id)->whereDate('created_at', $this->selected_date)->get();
        $this->total_income += $fds->sum('principal');

        $fdws = FDWithdrawal::where('center_id', $c_id)->whereDate('created_at', $this->selected_date)->get();
        $this->total_expense += $fdws->sum('amount');

        $p_cs = PartialDue::where('center_id', $c_id)->whereDate('updated_at', $this->selected_date)->get();
        $this->total_income += $p_cs->sum('total_amount');

        return view('livewire.center-manager.center-manager-closing-component', ['fdws' => $fdws, 'p_cs' => $p_cs, 'fds' => $fds, 'dues' => $dues, 'branch' => $branch, 'center' => $center, 'loans' => $loans])->layout('layouts.cm.base');
    }
}
