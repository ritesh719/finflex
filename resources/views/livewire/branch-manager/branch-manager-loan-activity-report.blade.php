<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Loan Activity Report - Branch</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/branch-manager/dashboard">Dashboard</a></li>
        </ol>
    </div>



    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title w-100">
                        Centerwise loan activity report
                        <a onclick="printDiv('p')" class="btn btn-sm btn-dark text-light float-right">Print</a>
                    </div>
                </div>
                <div class="card-body" id="p">
                    <div class="table-responsive">
                        <style>
                            th {
                                font-size: 0.8em !important;
                                text-transform: capitalize !important;
                                padding: 5px 1px 5px 1px !important;
                            }

                            td {
                                font-size: 0.8em !important;
                                text-transform: capitalize !important;
                                padding: 5px 1px 5px 1px !important;
                            }

                        </style>
                        <table class="table table-bordered text-center">
                            <tr>
                                <thead>
                                    <th>Center ID</th>
                                    <th>Outstanding Amount</th>
                                    <th>Total Loans</th>
                                    <th>Total Amount Given</th>
                                    <th>Principal Collected</th>
                                    <th>Principal Due</th>
                                    <th>Interest Collected</th>
                                    <th>Interest Due</th>
                                    <th>Processing Collected</th>
                                    <th>Insurance Collected</th>
                                    <th>Passbook Collected</th>
                                    <th>FD Deposit</th>
                                    <th>FD Withdrawal</th>
                                </thead>
                            </tr>

                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $branch->id }}:{{ $d['center_id'] }}</td>
                                    <td>{{ number_format($d['outstanding_amount'], 2) }}</td>
                                    <td>{{ $d['total_loans'] }}</td>
                                    <td>{{ number_format($d['total_amount_given'], 2) }}</td>
                                    <td>{{ number_format($d['principal_collected'], 2) }}</td>
                                    <td>{{ number_format($d['principal_due'], 2) }}</td>
                                    <td>{{ number_format($d['interest_collected'], 2) }}</td>
                                    <td>{{ number_format($d['interest_due'], 2) }}</td>
                                    <td>{{ number_format($d['processing_collected'], 2) }}</td>
                                    <td>{{ number_format($d['insurance_collected'], 2) }}</td>
                                    <td>{{ number_format($d['passbook_collected'], 2) }}</td>
                                    <td>{{ number_format($d['fd_deposit'], 2) }}</td>
                                    <td>{{ number_format($d['fd_withdrawal'], 2) }}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <td><b>Total</b></td>
                                <td><b>{{ number_format($overall_outstanding_amount, 2) }} </b> </td>
                                <td><b>{{ $overall_total_loans }} </b> </td>
                                <td><b>{{ number_format($overall_total_amount_given, 2) }} </b> </td>
                                <td><b>{{ number_format($overall_principal_collected, 2) }} </b> </td>
                                <td><b>{{ number_format($overall_principal_due, 2) }} </b> </td>
                                <td><b>{{ number_format($overall_interest_collected, 2) }} </b> </td>
                                <td><b>{{ number_format($overall_interest_due, 2) }} </b> </td>
                                <td><b>{{ number_format($overall_processing_collected, 2) }} </b> </td>
                                <td><b>{{ number_format($overall_insurance_collected, 2) }} </b> </td>
                                <td><b>{{ number_format($overall_passbook_collected, 2) }} </b> </td>
                                <td><b>{{ number_format($overall_fd_deposit, 2) }} </b> </td>
                                <td><b>{{ number_format($overall_fd_withdrawal, 2) }} </b> </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
