<?php

namespace App\Http\Livewire\CenterManager;

use App\Models\Client;
use App\Models\Due;
use App\Models\Loan;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CenterManagerNewLoanComponent extends Component
{
    public $client_id;
    public $disbursement_date;
    public $client_name;
    public $clients;
    public $loan_amount;
    public $processing_fees;
    public $insurance_fees;
    public $total_weeks;
    public $weekly_installment;
    public $payment_day;
    public $passbook_cost;

    public function mount()
    {
        $c_m = User::find(Auth::user()->id);
        $center_id = $c_m->centerManager->centers->id;
        $this->clients = Client::where('center_id', $center_id)->get();
        $current_date = new DateTime();
        $this->disbursement_date = $current_date->format('Y-m-d');
    }



    public function createNewLoan()
    {
        $total_amount = (int)$this->weekly_installment * (int)$this->total_weeks;
        $total_interest = (int)$total_amount - (int)$this->loan_amount;

        $c_m = User::find(Auth::user()->id);
        $center_id = $c_m->centerManager->centers->id;
        $branch_id = $c_m->centerManager->centers->branch->id;

        $start_date = new DateTime($this->disbursement_date);

        $loan = new Loan();

        $loan->created_at = $start_date->format('Y-m-d H:i:s');
        $loan->total_amount = $total_amount;
        $loan->paid_amount = 0;
        $loan->due_amount = $total_amount;

        $loan->total_pricipal = $this->loan_amount;
        $loan->paid_pricipal = 0;
        $loan->due_pricipal = $this->loan_amount;

        $loan->total_interest = $total_interest;
        $loan->paid_interest = 0;
        $loan->due_interest = $total_interest;

        $loan->status = 'open';

        $loan->total_weeks = $this->total_weeks;

        $loan->total_emi = $this->total_weeks;
        $loan->paid_emi = 0;
        $loan->due_emi = $this->total_weeks;

        $loan->processing_fees = $this->processing_fees;
        $loan->insurance = $this->insurance_fees;
        $loan->passbook_cost = $this->passbook_cost;

        $loan->client_id = $this->client_id;
        $loan->branch_id = $branch_id;
        $loan->center_id = $center_id;

        $loan->save();




        for ($i = 0; $i < $this->total_weeks; $i++) {
            $dues = new Due();

            $dues->total_amount = $this->weekly_installment;
            (float)$dues->principal_amount = (int)$this->loan_amount / (int)$this->total_weeks;
            (float)$dues->interest_amount = (int)$total_interest / (int)$this->total_weeks;

            $inc = $i * 7;
            $start_date = new DateTime($this->disbursement_date);
            $start_date->modify('next ' . $this->payment_day);
            $dues->due_on_date = $start_date->modify('+' . $inc . ' day')->format('Y-m-d H:i:s');

            $dues->emi_number = $i + 1;
            $dues->status = 'not paid';
            $dues->loan_id = $loan->id;
            $dues->branch_id = $branch_id;
            $dues->center_id = $center_id;

            $dues->save();
        }

        session()->flash('loan_created_successfully', 'New Loan Created');

        return redirect(route('centermanager.newloan'));
    }

    public function render()
    {
        $this->client_name = Client::where('id', $this->client_id)->pluck('name');
        return view('livewire.center-manager.center-manager-new-loan-component')->layout('layouts.cm.base');
    }
}
