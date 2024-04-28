<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Monthly Balance Sheet - Branch</h4>
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
                                <label class="form-label">Start</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input type="date" class="form-control" wire:model="start_date">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="form-label">End</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input type="date" class="form-control" wire:model="end_date">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <style>
                            th {
                                font-size: 0.7em !important;
                                padding: 5px 1px 5px 1px !important;
                            }

                            td {
                                font-size: 0.8em;
                                padding: 5px 1px 5px 1px !important;
                            }

                        </style>
                        <table class="table-bordered table text-center">
                            <tr>
                                <thead>
                                    <th>Date</th>
                                    <th>Opening</th>
                                    <th>Principal</th>
                                    <th>Interest</th>
                                    <th>Processing</th>
                                    <th>Insurance</th>
                                    <th>Passbook</th>
                                    <th>FD Collected</th>
                                    <th>FD Withdrawal</th>
                                    <th>Loan Disbursed</th>
                                    <th>Expenses</th>
                                    <th>Closing</th>
                                </thead>
                            </tr>
                            @foreach ($data as $b)
                                <tr>
                                    <td><b>{{ $b['date'] }}</b></td>
                                    <td><b>{{ number_format($b['opening_balance'], 2) }}</b></td>
                                    <td>
                                        {{ number_format($b['principal'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($b['interest'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($b['processing'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($b['insurance'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($b['passbook'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($b['fd_collected'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($b['fd_withdrawal'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($b['loan_disbursed'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($b['expenses'], 2) }}
                                    </td>
                                    <td><b>{{ number_format($b['closing_balance'], 2) }}</b></td>
                                </tr>
                            @endforeach



                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
