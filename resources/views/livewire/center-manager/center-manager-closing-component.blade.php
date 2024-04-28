<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Center Closing</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/center-manager/dashboard">Dashboard</a></li>
        </ol>
    </div>


    <div class="row row-deck">
        <div class="col-lg-12">
            <div class="card" id="printableArea">
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    <div class="row w-100">
                        <div class="col-2">
                            <b>({{ $branch->id }}:{{ $center->center_id }})</b>
                        </div>
                        <div class="col-4 text-center"><b>Center Performance Report on: </b></div>
                        <div class="col-4 text-center">
                            <div class="input-group">
                                <input wire:model="selected_date" value="{{ $selected_date }}" type="date">
                            </div>
                        </div>
                        <div class="col-2 text-right">
                            <a href="" class="btn btn-sm btn-dark text-light"
                                onclick="printDiv('printableArea')">Print</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td><b>S. no.</b></td>
                                <td><b>A/C No.</b></td>
                                <td><b>Installments</b></td>
                                <td><b>Processing fees</b></td>
                                <td><b>Insurance</b></td>
                                <td><b>Passbook Cost</b></td>
                                <td><b>FD Deposits</b></td>
                                <td><b>Loan Disbursed</b></td>
                                <td><b>FD Withdrawal</b></td>
                            </tr>
                            @foreach ($dues as $d)
                                <tr>
                                    <td>{{ $flag++ }}</td>
                                    <td>
                                        {{ $d->loan->client_id }}
                                    </td>
                                    <td>
                                        {{ number_format($d->total_amount, 2) }}
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                </tr>

                                {{ $t_amnt += $d->total_amount }}
                            @endforeach

                            @foreach ($loans as $l)
                                <tr>
                                    <td>
                                        {{ $flag++ }}
                                    </td>
                                    <td>
                                        {{ $l->client_id }}
                                    </td>
                                    <td>0.00</td>
                                    <td>
                                        {{ number_format($l->processing_fees, 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($l->insurance, 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($l->passbook_cost, 2) }}
                                    </td>
                                    <td>0.00</td>
                                    <td>
                                        {{ number_format($l->total_pricipal, 2) }}
                                    </td>
                                    <td>0.00</td>
                                </tr>

                                @php
                                    $t_ins += $l->insurance;
                                    $t_p_f += $l->processing_fees;
                                    $t_p_c += $l->passbook_cost;
                                    $t_l_d += $l->total_pricipal;
                                @endphp
                            @endforeach

                            @foreach ($fds as $fd)
                                <tr>
                                    <td>
                                        {{ $flag++ }}
                                    </td>
                                    <td>
                                        {{ $fd->client_id }}
                                    </td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        {{ number_format($fd->principal, 2) }}
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>

                                </tr>

                                @php
                                    $t_fd += $fd->principal;
                                @endphp
                            @endforeach

                            @foreach ($p_cs as $pc)
                                <tr>
                                    <td>
                                        {{ $flag++ }}
                                    </td>
                                    <td>
                                        {{ $pc->loan->client_id }}
                                    </td>
                                    <td>
                                        {{ number_format($pc->total_amount, 2) }}
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                </tr>

                                @php $t_amnt += $pc->total_amount @endphp
                            @endforeach

                            @foreach ($fdws as $fdw)
                                <tr>
                                    <td>
                                        {{ $flag++ }}
                                    </td>
                                    <td>
                                        {{ $fdw->client_id }}
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        {{ number_format($fdw->amount, 2) }}
                                    </td>
                                </tr>

                                @php $t_fd_w += $fdw->amount @endphp
                            @endforeach

                            <tr>
                                <td><b>Total: </b></td>
                                <td></td>
                                <td>
                                    <b>{{ number_format($t_amnt, 2) }}</b>
                                </td>
                                <td>
                                    <b>{{ number_format($t_p_f, 2) }}</b>
                                </td>
                                <td>
                                    <b>{{ number_format($t_ins, 2) }}</b>
                                </td>
                                <td>
                                    <b>{{ number_format($t_p_c, 2) }}</b>
                                </td>
                                <td>
                                    <b>{{ number_format($t_fd, 2) }}</b>
                                </td>
                                <td>
                                    <b>{{ number_format($t_l_d, 2) }}</b>
                                </td>
                                <td>
                                    <b>{{ number_format($t_fd_w, 2) }}</b>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4"><b>Today's total collection: </b></td>
                                <td colspan="5"><b>
                                        {{ number_format($total_income, 2) }} </b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><b>Today's distribution: </b></td>
                                <td colspan="5"><b>
                                        {{ number_format($total_expense, 2) }} </b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><b>Today's balance: </b></td>
                                <td colspan="5"><b>
                                        {{ number_format($total_income - $total_expense, 2) }}
                                    </b>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    @if (!$is_closing_done)
                        <a class="btn btn-danger text-light" wire:click.prevent="closeCenter">Close Center</a>
                    @endif
                </div>
                <!-- table-wrapper -->
            </div>
        </div>

    </div>

    <div class="modal fade" id="errormodal" tabindex="-1" role="dialog" aria-labelledby="errormodal"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Previous Closing not done</h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

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
    <script>
        window.addEventListener('show-modal', event => {
            $("#errormodal").modal('show');
        })
        window.addEventListener('hide-modal', event => {
            $("#errormodal").modal('hide');
        })
    </script>
@endpush
