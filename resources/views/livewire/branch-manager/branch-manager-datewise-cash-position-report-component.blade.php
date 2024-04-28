<div class=" content-area" id="printableArea">
    <div class="page-header">
        <h4 class="page-title">Datewise Cash Position Report - Branch </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/branch-manager/dashboard">Dashboard</a></li>
        </ol>
    </div>



    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row w-100">
                        <div class="col-2">
                            <div class="form-group">
                                <label class="form-label">
                                    <b>{{ $branch->id }} / {{ $branch->name }}</b>
                                </label>
                            </div>
                        </div>
                        <div class="col-1 text-right">
                            <div class="form-group">
                                <label class="form-label">From: </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="date" class="form-control" wire:model="meeting_date_from"
                                    value="{{ $meeting_date_from }}">
                            </div>

                        </div>
                        <div class="col-1 text-right">
                            <div class="form-group">
                                <label class="form-label">To: </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="date" class="form-control" wire:model="meeting_date_to"
                                    value="{{ $meeting_date_to }}">
                            </div>

                        </div>
                        <div class="col-2 d-flex align-items-center justify-content-end">
                            <div class="text-right">
                                <a class="btn btn-sm btn-dark text-light ml-4"
                                    onclick="printDiv('printableArea')">Print</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <style>
                        th {
                            font-size: 0.8em !important;
                            vertical-align: top;
                            line-height: normal;
                        }

                        td {
                            font-size: 0.8em !important;
                            vertical-align: top;
                            line-height: normal;
                        }

                    </style>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <thead>
                                    <th>Center ID / Name</th>
                                    <th>Principal Collected</th>
                                    <th>Interest Collected</th>
                                    <th>Processing fees</th>
                                    <th>Insurance Amount</th>
                                    <th>Passbook</th>
                                    <th>FD Collected</th>
                                    <th>FD Withdrawl</th>
                                    <th>Loan Disbursed</th>
                                    <th>Total Collected</th>
                                    <th>Disbursed Amount</th>
                                </thead>
                            </tr>

                            @foreach ($center_wise_data as $c_w_d)
                                <tr>
                                    <td>
                                        {{ $c_w_d['center_id'] }} / {{ $c_w_d['center_name'] }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_principal'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_interest'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_processing_fees'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_insurance'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_passbook'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_fd_deposit'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_fd_withdrawl'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['loan_disbursed'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_collected'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_disbursed'], 2) }}
                                    </td>
                                </tr>

                                @php
                                    $overall_total_principal += $c_w_d['total_principal'];
                                    $overall_total_interest += $c_w_d['total_interest'];
                                    $overall_total_processing_fees += $c_w_d['total_processing_fees'];
                                    $overall_total_insurance += $c_w_d['total_insurance'];
                                    $overall_total_passbook += $c_w_d['total_passbook'];
                                    $overall_total_fd_deposit += $c_w_d['total_fd_deposit'];
                                    $overall_total_fd_withdrawl += $c_w_d['total_fd_withdrawl'];
                                    $overall_loan_disbursed += $c_w_d['loan_disbursed'];
                                    $overall_total_collected += $c_w_d['total_collected'];
                                    $overall_total_disbursed += $c_w_d['total_disbursed'];
                                @endphp
                            @endforeach


                            <tr class="text-danger">
                                <td></td>
                                <td><b>
                                        {{ number_format($overall_total_principal, 2) }}
                                    </b></td>
                                <td><b>
                                        {{ number_format($overall_total_interest, 2) }}
                                    </b></td>
                                <td><b>
                                        {{ number_format($overall_total_processing_fees, 2) }}
                                    </b></td>
                                <td><b>
                                        {{ number_format($overall_total_insurance, 2) }}
                                    </b></td>
                                <td><b>
                                        {{ number_format($overall_total_passbook, 2) }}
                                    </b></td>
                                <td><b>
                                        {{ number_format($overall_total_fd_deposit, 2) }}
                                    </b></td>
                                <td><b>
                                        {{ number_format($overall_total_fd_withdrawl, 2) }}
                                    </b></td>
                                <td><b>
                                        {{ number_format($overall_loan_disbursed, 2) }}
                                    </b></td>
                                <td><b>
                                        {{ number_format($overall_total_collected, 2) }}
                                    </b></td>
                                <td><b>
                                        {{ number_format($overall_total_disbursed, 2) }}
                                    </b></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <table class="table ">
                        <tr class="text-danger">
                            <td><b>Total Cash Inflow: </b></td>
                            <td><b>{{ number_format($overall_total_collected, 2) }}</b></td>
                            <td><b>Total Cash Outflow</b></td>
                            <td><b>{{ number_format($overall_total_disbursed, 2) }}</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
