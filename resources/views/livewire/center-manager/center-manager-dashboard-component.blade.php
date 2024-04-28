<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">{{ $branch->id }} / {{ $center->center_id }} ({{ $center->name }})</h4>
        <ol class="breadcrumb">
            <div class="form-group">
                <select name="" id="" class="form-control" wire:change="changeCenter" wire:model="selected_center_id">
                    @foreach ($centers_list as $c_l)
                        <option value="{{ $c_l->id }}">({{ $c_l->center_id }}) {{ $c_l->name }}</option>
                    @endforeach
                </select>
            </div>
        </ol>
    </div>

    @if (Session::has('payment_successfull'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('payment_successfull') }}
        </div>
    @endif

    <div class="row row-deck">
        <div class="col-lg-12">
            <div class="card" id="printableAreaWeek">
                <div class="card-header">
                    <div class="col-6">
                        <b>Collection Due Sheet (CDS) - Weekly</b>
                    </div>
                    <div class="col-6 text-right">
                        <a class="btn btn-sm btn-dark text-light" onclick="printDiv('printableAreaWeek')">Print</a>
                    </div>
                </div>
                <style>
                    th {
                        font-size: 0.8em !important;
                    }

                </style>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>S. No.</th>
                                    <th>A/C No.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th>Principal Due</th>
                                    <th>Interest Due</th>
                                    <th>Total</th>
                                    <th>Installment</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            @foreach ($dues_this_week as $due)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}.
                                    </td>
                                    <td>
                                        {{ $due->loan->client->id }}
                                    </td>
                                    <td>
                                        {{ $due->loan->client->name }}
                                    </td>
                                    <td>
                                        {{ $due->loan->client->c_address }}
                                    </td>
                                    <td>
                                        {{ $due->loan->client->mobile }}
                                    </td>
                                    <td>
                                        {{ number_format($due->principal_amount, 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($due->interest_amount, 2) }}
                                    </td>
                                    <td>
                                        <b>{{ number_format($due->total_amount, 2) }}</b>
                                    </td>
                                    <td>
                                        {{ $due->emi_number }}
                                    </td>
                                    <td>
                                        {!! date('d-M-y', strtotime($due->due_on_date)) !!}
                                    </td>
                                    <td>
                                        {{ $due->status }}
                                    </td>
                                    <td>
                                        <a href="/center-manager/loan/{{ $due->loan->id }}"
                                            class="btn btn-sm btn-danger">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card" id="printableAreaPrev">
                <div class="card-header">
                    <div class="col-6">
                        <b>Collection Due Sheet (CDS) - Previous</b>
                    </div>
                    <div class="col-6 text-right">
                        <a class="btn btn-sm btn-dark text-light" onclick="printDiv('printableAreaPrev')">Print</a>
                    </div>
                </div>
                <style>
                    th {
                        font-size: 0.8em !important;
                    }

                </style>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>S. No.</th>
                                    <th>A/C No.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th>Principal Due</th>
                                    <th>Interest Due</th>
                                    <th>Total</th>
                                    <th>Installment</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            @foreach ($prev_dues as $due)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}.
                                    </td>
                                    <td>
                                        {{ $due->loan->client->id }}
                                    </td>
                                    <td>
                                        {{ $due->loan->client->name }}
                                    </td>
                                    <td>
                                        {{ $due->loan->client->c_address }}
                                    </td>
                                    <td>
                                        {{ $due->loan->client->mobile }}
                                    </td>
                                    <td>
                                        {{ number_format($due->principal_amount, 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($due->interest_amount, 2) }}
                                    </td>
                                    <td>
                                        <b>{{ number_format($due->total_amount, 2) }}</b>
                                    </td>
                                    <td>
                                        {{ $due->emi_number }}
                                    </td>
                                    <td>
                                        {!! date('d-M-y', strtotime($due->due_on_date)) !!}
                                    </td>
                                    <td>
                                        <a href="/center-manager/loan/{{ $due->loan->id }}"
                                            class="btn btn-sm btn-danger">View</a>
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
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
                        <div class="col-4">Payment Date:</div>
                        <div class="col-8">
                            <input wire:model="payment_date" class="form-control" placeholder="MM/DD/YYYY"
                                type="date">
                        </div>
                        <div class="col-4">
                            <b>Installment Number</b>
                        </div>
                        <div class="col-8">
                            {{ $due_emi_number }}
                        </div>
                        <div class="col-4">
                            <b>Amount Payable</b>
                        </div>
                        <div class="col-8">
                            {{ $total_due_amount }}
                        </div>
                    </div>
                    <div class="col-4">
                        <b>Amount Paid</b>
                    </div>
                    <div class="col-8">
                        {{ $amount_paid }}
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

</div>


@push('scripts')
    <script>
        window.addEventListener('show-modal', event => {
            $("#confirmPaymentModal").modal('show');
        })
        window.addEventListener('hide-modal', event => {
            $("#confirmPaymentModal").modal('hide');
        })
    </script>
@endpush
