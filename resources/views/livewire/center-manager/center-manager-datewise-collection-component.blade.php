<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Datewise Collection </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/center-manager/dashboard">Dashboard</a></li>
        </ol>
    </div>

    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">
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
                                <td><b>Amount</b></td>
                                <td><b>Principal</b></td>
                                <td><b>Interest</b></td>
                                <td><b>Processing fees</b></td>
                                <td><b>Insurance</b></td>
                                <td><b>Passbook Cost</b></td>
                                <td><b>FD</b></td>
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
                                        {{ number_format($d->principal_amount, 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($d->interest_amount, 2) }}
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

                                @php $t_amnt += $d->total_amount @endphp
                                @php $t_p += $d->principal_amount @endphp
                                @php $t_int += $d->interest_amount @endphp
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
                                    <td>0.00</td>
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
                                </tr>

                                @php
                                    $t_ins += $l->insurance;
                                    $t_p_f += $l->processing_fees;
                                    $t_p_c += $l->passbook_cost;
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
                                        0.00
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                    <td>
                                        {{ $fd->principal }}
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
                                        {{ number_format($pc->principal_amount, 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($pc->interest_amount, 2) }}
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
                                @php $t_p += $pc->principal_amount @endphp
                                @php $t_int += $pc->interest_amount @endphp
                            @endforeach

                            <tr>
                                <td><b>Total: </b></td>
                                <td></td>
                                <td>
                                    <b>{{ number_format($t_amnt, 2) }}</b>
                                </td>
                                <td>
                                    <b>{{ number_format($t_p, 2) }}</b>
                                </td>
                                <td>
                                    <b>{{ number_format($t_int, 2) }}</b>
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
                            </tr>

                            <tr>
                                <td colspan="4"><b>Today's total collection: </b></td>
                                <td colspan="4"><b>
                                        {{ number_format($t_amnt + $t_p_f + $t_ins + $t_fd + $t_p_c, 2) }} </b>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- table-wrapper -->
            </div>
        </div>
    </div>



</div>
