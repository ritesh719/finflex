<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Daily Cash Position Report - Branch</h4>
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
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <b>{{ $branch->id }} / {{ $branch->name }}</b>
                                </label>
                            </div>
                        </div>
                        <div class="col-3 text-right">
                            <div class="form-group">
                                <label class="form-label">Meeting Date: </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="date" class="form-control" wire:model="meeting_date"
                                    value="{{ $meeting_date }}">
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
                <div class="card-footer">
                    <table class="table ">
                        <tr class="bg-dark text-light">
                            <td><b>Total Cash Inflow: </b></td>
                            <td><b>{{ number_format($income, 2) }}</b></td>
                            <td><b>Total Cash Outflow</b></td>
                            <td><b>{{ number_format($expense, 2) }}</b></td>
                        </tr>
                    </table>

                    <div class="text-right">
                        @if (!$is_branch_closed)
                            <a class="btn btn-danger text-light" wire:click.prevent="closeBranch">
                                Close Branch
                            </a>
                        @endif
                    </div>
                </div>
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
            $("#errormodal").modal('show');
        })
        window.addEventListener('hide-modal', event => {
            $("#errormodal").modal('hide');
        })
    </script>
@endpush
