<?php

namespace App\Http\Livewire\CenterManager;

use App\Models\Client;
use App\Models\Due;
use App\Models\Loan;
use App\Models\PartialDue;
use Carbon\Carbon;
use DateTime;
use Livewire\Component;

class CenterManagerViewLoanDetailsComponent extends Component
{
    public $loan_id;

    public $total_due_amount;
    public $due_emi_number;
    public $selected_due_id;

    public $payment_date;
    public $payment_p_date;
    public $payment_p_amount;
    public $current_date;

    public $amount_paid;

    public $selected_p_id;

    public function mount($id)
    {
        $this->loan_id = $id;
        $this->current_date = new DateTime();
        $this->payment_date = $this->current_date->format('Y-m-d');
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


    public function openPartialPaymentModal($p_id)
    {
        $this->selected_p_id = $p_id;
        $partial_dues = PartialDue::find($p_id);
        $this->payment_p_amount = $partial_dues->total_amount;
        $this->dispatchBrowserEvent('show-p-modal');
        // dd($p_id);
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
            $due->principal_amount = ($this->amount_paid / $this->total_due_amount) * $due->principal_amount;
            $old_interest = $due->interest_amount;
            $due->interest_amount = ($this->amount_paid / $this->total_due_amount) * $due->interest_amount;
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


        $loan = Loan::find($this->loan_id);
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
        $this->loan_id = $this->loan_id;
    }

    public function makePPayment()
    {


        $partial_dues = PartialDue::find($this->selected_p_id);
        
        $actual_amount = $partial_dues->total_amount;
        $actual_paid_amount = $this->payment_p_amount;
        
        $paid_percent = ($actual_paid_amount / $actual_amount);
        
        if($paid_percent != 1){
            $newPD = new PartialDue();
            $newPD->total_amount = $partial_dues->total_amount * (1 - $paid_percent);
            $newPD->principal_amount = $partial_dues->principal_amount * (1 - $paid_percent);
            $newPD->interest_amount = $partial_dues->interest_amount * (1 - $paid_percent);
            $newPD->status = 'not paid';
            $newPD->loan_id = $partial_dues->loan_id;
            $newPD->branch_id = $partial_dues->branch_id;
            $newPD->center_id = $partial_dues->center_id;
            $newPD->save();
        }
        
        $partial_dues->total_amount = $partial_dues->total_amount * $paid_percent;
        $partial_dues->principal_amount = $partial_dues->principal_amount * $paid_percent;
        $partial_dues->interest_amount = $partial_dues->interest_amount * $paid_percent;
        $partial_dues->status = 'paid';
        $partial_dues->updated_at = $this->payment_p_date;
        $partial_dues->save();
        
        


        $loan = Loan::find($this->loan_id);
        $loan->paid_amount = $loan->paid_amount + $partial_dues->total_amount;
        $loan->due_amount = $loan->total_amount - $loan->paid_amount;

        $loan->paid_pricipal = $loan->paid_pricipal + $partial_dues->principal_amount;
        $loan->due_pricipal = $loan->total_pricipal - $loan->paid_pricipal;

        $loan->paid_interest = $loan->paid_interest + $partial_dues->interest_amount;
        $loan->due_interest = $loan->total_interest - $loan->paid_interest;

        $loan->save();

        session()->flash('payment_successfull', 'Payment Successfull');
        $this->dispatchBrowserEvent('hide-p-modal');
        $this->loan_id = $this->loan_id;
    }

    public function render()
    {
        $loan = Loan::find($this->loan_id);
        $dues = Due::where('loan_id', $this->loan_id)->get();
        $partials = PartialDue::where('loan_id', $this->loan_id)->get();
        return view('livewire.center-manager.center-manager-view-loan-details-component', ['loan' => $loan, 'dues' => $dues, 'partials' => $partials])->layout('layouts.cm.base');
    }
}
