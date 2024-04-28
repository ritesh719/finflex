<?php

namespace App\Http\Livewire\CenterManager;

use App\Models\Branches;
use App\Models\CenterManagers;
use App\Models\Centers;
use App\Models\Due;
use App\Models\Loan;
use App\Models\PartialDue;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CenterManagerDashboardComponent extends Component
{
    public $center;
    public $branch;
    public $dues_this_week;
    public $dues_this_month;
    public $prev_dues;
    public $payment_date;
    public $current_date;

    public $total_due_amount;
    public $due_emi_number;
    public $selected_due_id;

    public $centers_list;
    public $selected_center_id;

    public $amount_paid;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->center = $user->centerManager->centers;
        $this->branch = Branches::find($this->center->branch_id);
        $this->current_date = new DateTime();
        $this->payment_date = $this->current_date->format('Y-m-d');

        $this->centers_list = Centers::where('branch_id', $this->branch->id)->get();
        $this->selected_center_id = $this->center->id;
    }

    public function changeCenter()
    {
        // dd($this->selected_center_id);

        $center_manager = CenterManagers::where('user_id', Auth::user()->id)->update(array('centers_id' => $this->selected_center_id));

        return redirect(route('centermanager.dashboard'));
    }

    public function fetchWeekData()
    {
        $now = Carbon::now();
        $this->dues_this_week = Due::where('center_id', $this->center->id)->whereDate('due_on_date', '>=', $now->startOfWeek())->whereDate('due_on_date', '<=', $now->endOfWeek())->get();
    }

    public function fetchMonthData()
    {
        $now = Carbon::now();
        $this->dues_this_month = Due::where('center_id', $this->center->id)->whereDate('due_on_date', '>=', $now->startOfWeek())->whereDate('due_on_date', '<=', $now->endOfWeek())->get();
    }

    public function fetchPrevDues()
    {
        $now = Carbon::now();
        $this->prev_dues = Due::where('center_id', $this->center->id)->whereDate('due_on_date', '<', $now->startOfWeek())->get();
    }

    public function openPaymentModal($due_id)
    {
        $due = Due::find($due_id);
        $this->selected_due_id = $due_id;
        $this->total_due_amount = $due->total_amount;
        $this->due_emi_number = $due->emi_number;

        $this->amount_paid = $due->total_amount;
        $this->dispatchBrowserEvent('show-modal');
        // dd($due_id);
    }


    public function makePayment()
    {
        if ($this->amount_paid == $this->total_due_amount) {
            $due = Due::find($this->selected_due_id);
            $due->status = 'paid';
            $due->updated_at = $this->payment_date;
            $due->save();
        } else {
            $due = Due::find($this->selected_due_id);
            $due->status = 'paid';
            $due->updated_at = $this->payment_date;
            $old_principal = $due->principal_amount;
            $due->principal_amount = (($this->amount_paid / $this->total_due_amount) * 100) * $due->principal_amount;
            $old_interest = $due->interest_amount;
            $due->interest_amount = (($this->amount_paid / $this->total_due_amount) * 100) * $due->interest_amount;
            $due->total_amount = $this->amount_paid;

            $due->save();

            $partial_dues = new PartialDue();
            $partial_dues->total_amount = $this->total_due_amount - $this->amount_paid;
            $partial_dues->principal_amount = $old_principal - $due->principal_amount;
            $partial_dues->interest_amount = $old_interest - $due->interest_amount;
            $partial_dues->status = 'not paid';
            $partial_dues->loan_id = $due->loan_id;
            $partial_dues->branch_id = $due->branch_id;
            $partial_dues->center_id = $due->center_id;

            $partial_dues->save();
        }

        $loan = Loan::find($due->loan_id);
        $loan->paid_amount = $loan->paid_amount + $due->total_amount;
        $loan->due_amount = $loan->total_amount - $loan->paid_amount;

        $loan->paid_pricipal = $loan->paid_pricipal + $due->principal_amount;
        $loan->due_pricipal = $loan->total_pricipal - $loan->paid_pricipal;

        $loan->paid_interest = $loan->paid_interest + $due->interest_amount;
        $loan->due_interest = $loan->total_interest - $loan->paid_interest;

        $loan->paid_emi = $loan->paid_emi + 1;
        $loan->due_emi = $loan->due_emi - 1;

        $loan->save();

        session()->flash('payment_successfull', 'Payment Successfull');
        $this->dispatchBrowserEvent('hide-modal');
    }

    public function render()
    {
        $this->fetchWeekData();
        $this->fetchMonthData();
        $this->fetchPrevDues();

        return view('livewire.center-manager.center-manager-dashboard-component')->layout('layouts.cm.base');
    }
}
