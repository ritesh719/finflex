<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Loan Details</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/center-manager/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="center-manager/list-loans">List all loans</li>
        </ol>
    </div>

    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row w-100">
                        <div class="col-6 py-2 bg-dark text-light">
                            <a class="text-light" href="/center-manager/view-client/{{ $loan->client_id }}"><b>A/C
                                    No. :
                                    {{ $loan->client->id }} <i class="fa fa-eye"></i></b></a>
                        </div>
                        <div class="col-6 py-2 bg-dark text-light">
                            <b>Name : {{ $loan->client->name }}</b>
                        </div>
                        <div class="col-6 py-2 bg-dark text-light">
                            <b>Branch: {{ $loan->branch_id }}</b>
                        </div>
                        <div class="col-6 py-2 bg-dark text-light">
                            <b>Center: {{ $loan->center_id }}</b>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td class="bg-dark text-light" colspan="9">
                                Loan Statement
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="3"><b>Amount</b></td>
                            <td colspan="3"><b>Principal</b></td>
                            <td colspan="3"><b>Interest</b></td>
                        </tr>
                        <tr class="text-center">
                            <td><b>Total</b></td>
                            <td><b>Paid</b></td>
                            <td><b>Due</b></td>
                            <td><b>Total</b></td>
                            <td><b>Paid</b></td>
                            <td><b>Due</b></td>
                            <td><b>Total</b></td>
                            <td><b>Paid</b></td>
                            <td><b>Due</b></td>
                        </tr>
                        <tr class="text-center">
                            <td>{{ number_format($loan->total_amount, 2) }}</td>
                            <td>{{ number_format($loan->paid_amount, 2) }}</td>
                            <td><b>{{ number_format($loan->due_amount, 2) }}</b></td>
                            <td>{{ number_format($loan->total_pricipal, 2) }}</td>
                            <td>{{ number_format($loan->paid_pricipal, 2) }}</td>
                            <td><b>{{ number_format($loan->due_pricipal, 2) }}</b></td>
                            <td>{{ number_format($loan->total_interest, 2) }}</td>
                            <td>{{ number_format($loan->paid_interest, 2) }}</td>
                            <td><b>{{ number_format($loan->due_interest, 2) }}</b></td>
                        </tr>
                    </table>

                    @if (Session::has('payment_successfull'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('payment_successfull') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <td colspan="7" class="bg-dark text-light">Partial Dues</td>
                        </tr>
                        <tr>
                            <td><b>S no.</b></td>
                            <td><b>Pricipal</b></td>
                            <td><b>Interest</b></td>
                            <td><b>Total amt.</b></td>
                            <td><b>Status</b></td>
                            <td><b>Action</b></td>
                        </tr>

                        @foreach ($partials as $p)
                            @if ($p->status == 'paid')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ number_format($p->principal_amount, 2) }}</td>
                                    <td>{{ number_format($p->interest_amount, 2) }}</td>
                                    <td>{{ number_format($p->total_amount, 2) }}</td>
                                    <td>{{ $p->status }}</td>
                                    @if ($p->status != 'paid')
                                        <td>
                                            <a class="btn btn-danger btn-sm text-light"
                                                wire:click.prevent="openPartialPaymentModal({{ $p->id }})">Pay</a>
                                        </td>
                                    @else
                                        <td class="bg-success text-light">
                                            <b>{{ $p->updated_at->format('d-m-Y h:i:s a') }}</b>
                                        </td>
                                    @endif
                                </tr>
                            @else
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ number_format($p->principal_amount, 2) }}</td>
                                    <td>{{ number_format($p->interest_amount, 2) }}</td>
                                    <td>{{ number_format($p->total_amount, 2) }}</td>
                                    <td>{{ $p->status }}</td>
                                    @if ($p->status != 'paid')
                                        <td>
                                            <a class="btn btn-danger btn-sm text-light"
                                                wire:click.prevent="openPartialPaymentModal({{ $p->id }})">Pay</a>
                                        </td>
                                    @else
                                        <td class="bg-success text-light">
                                            <b>{{ $p->updated_at->format('d-m-Y h:i:s a') }}</b>
                                        </td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                    </table>

                    <table class="table table-bordered">
                        <tr>
                            <td colspan="7" class="bg-dark text-light">Installments</td>
                        </tr>
                        <tr>
                            <td><b>S no.</b></td>
                            <td><b>Due date</b></td>
                            <td><b>Pricipal</b></td>
                            <td><b>Interest</b></td>
                            <td><b>Total amt.</b></td>
                            <td><b>Status</b></td>
                            <td><b>Action</b></td>
                        </tr>

                        @foreach ($dues as $due)
                            @if ($due->status == 'paid')
                                <tr>
                                    <td>{{ $due->emi_number }}</td>
                                    <td>{{ date('d-m-Y', strtotime($due->due_on_date)) }}</td>
                                    <td>{{ number_format($due->principal_amount, 2) }}</td>
                                    <td>{{ number_format($due->interest_amount, 2) }}</td>
                                    <td>{{ number_format($due->total_amount, 2) }}</td>
                                    <td>{{ $due->status }}</td>
                                    @if ($due->status != 'paid')
                                        <td>
                                            <a class="btn btn-danger btn-sm text-light"
                                                wire:click.prevent="openPaymentModal({{ $due->id }})">Pay</a>
                                        </td>
                                    @else
                                        <td class="bg-success text-light">
                                            <b>{{ $due->updated_at->format('d-m-Y h:i:s a') }}</b>
                                        </td>
                                    @endif
                                </tr>
                            @else
                                <tr>
                                    <td>{{ $due->emi_number }}</td>
                                    <td>{{ date('d-m-Y', strtotime($due->due_on_date)) }}</td>
                                    <td>{{ number_format($due->principal_amount, 2) }}</td>
                                    <td>{{ number_format($due->interest_amount, 2) }}</td>
                                    <td>{{ number_format($due->total_amount, 2) }}</td>
                                    <td>{{ $due->status }}</td>
                                    @if ($due->status != 'paid')
                                        <td>
                                            <a class="btn btn-danger btn-sm text-light"
                                                wire:click.prevent="openPaymentModal({{ $due->id }})">Pay</a>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmPaymentModal" tabindex="-1" role="dialog"
        aria-labelledby="confirmPaymentModal" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 py-3">Payment Date:</div>
                        <div class="col-8">
                            <input wire:model="payment_date" class="form-control" placeholder="MM/DD/YYYY"
                                type="date">
                        </div>
                        <div class="col-4 py-3">
                            <b>Installment Number</b>
                        </div>
                        <div class="col-8 py-3">
                            {{ $due_emi_number }}
                        </div>
                        <div class="col-4 py-3">
                            <b>Amount Payable</b>
                        </div>
                        <div class="col-8 py-3">
                            {{ $total_due_amount }}
                        </div>

                        <div class="col-4 py-3">
                            <b>Amount Paid</b>
                        </div>
                        <div class="col-8 py-3">
                            <div class="form-group">
                                <input wire:model="amount_paid" class="form-control" type="number">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" wire:click.prevent="makePayment">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmpPaymentModal" tabindex="-1" role="dialog"
        aria-labelledby="confirmPaymentModal" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Confirm Partial Due payment</h4>
                    <div class="form-group">
                        <label>Payment Date</label>
                        <input wire:model="payment_p_date" class="form-control" placeholder="MM/DD/YYYY" type="date">
                    </div>
                    <div class="form-group">
                        <label>Payment Amount</label>
                        <input wire:model="payment_p_amount" class="form-control"  type="number" step="0.01">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" wire:click.prevent="makePPayment">Confirm</button>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        window.addEventListener('show-modal', event => {
            $("#confirmPaymentModal").modal('show');
        })
        window.addEventListener('hide-modal', event => {
            $("#confirmPaymentModal").modal('hide');
        })
        window.addEventListener('show-p-modal', event => {
            $("#confirmpPaymentModal").modal('show');
        })
        window.addEventListener('hide-p-modal', event => {
            $("#confirmpPaymentModal").modal('hide');
        })
    </script>
@endpush
