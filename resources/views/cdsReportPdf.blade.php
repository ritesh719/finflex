<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CDS Report</title>

    <!-- Dashboard Css -->

</head>

<style>
    @include('style');

</style>

<style>
    td {
        padding: 3px 5px !important;
        font-size: 1em;
    }

    td img {
        vertical-align: top;
    }

</style>

<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Closing Data
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
                                <th>Total Disbursed</th>
                            </thead>
                        </tr>

                        @foreach ($center_wise_data as $c_w_d)
                            @if ($c_w_d['closing_status'])
                                <tr class="bg-danger text-light">
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
                            @else
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
                            @endif

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


                        <tr class="bg-dark text-light">
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
                <div class="card-footer">
                    <table class="table ">
                        <tr class="bg-dark text-light">
                            <td><b>Total Cash Inflow: </b></td>
                            <td><b>{{ number_format($income, 2) }}</b></td>
                            <td><b>Total Cash Outflow</b></td>
                            <td><b>{{ number_format($expense, 2) }}</b></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>

        @foreach ($cds_data as $c_d)
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Collection Sheet
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td class="bg-dark text-light" colspan="9">
                                    {{ $c_d['center_name'] }}
                                </td>
                            </tr>

                            <tr>
                                <th>S.No.</th>
                                <th>A/C No.</th>
                                <th>Name</th>
                                <th>Husband</th>
                                <th>Mobile</th>
                                <th>Amount</th>
                                <th>Installment No.</th>
                                <th>Due Date</th>
                                <th>Sign</th>
                            </tr>

                            @foreach ($c_d['due_data'] as $d_d)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $d_d->loan->id }}
                                    </td>
                                    <td>
                                        {{ $d_d->loan->client->name }}
                                    </td>
                                    <td>
                                        {{ $d_d->loan->client->husband_name }}
                                    </td>
                                    <td>
                                        {{ $d_d->loan->client->mobile }}
                                    </td>
                                    <td>
                                        {{ $d_d->total_amount }}
                                    </td>
                                    <td>
                                        {{ $d_d->emi_number }}
                                    </td>
                                    <td>
                                        {{ date('d-M-Y', strtotime($d_d->due_on_date)) }}
                                    </td>
                                    <td style="width: 15%;">

                                    </td>
                                </tr>
                            @endforeach


                            @foreach ($c_d['partial_due_data'] as $p_d)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $p_d->loan->id }}
                                    </td>
                                    <td>
                                        {{ $p_d->loan->client->name }}
                                    </td>
                                    <td>
                                        {{ $p_d->loan->client->husband_name }}
                                    </td>
                                    <td>
                                        {{ $p_d->loan->client->mobile }}
                                    </td>
                                    <td>
                                        {{ $p_d->total_amount }}
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td style="width: 15%;">

                                    </td>
                                </tr>
                            @endforeach

                        </table>

                    </div>
                </div>
            </div>

        @endforeach
    </div>
</body>

</html>
