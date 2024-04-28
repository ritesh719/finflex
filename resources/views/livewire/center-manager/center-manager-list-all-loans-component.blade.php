<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">List of all loans</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/center-manager/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="center-manager/list-loans">List all loans</li>
        </ol>
    </div>

    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">
            @if (Session::has('loan_created_successfully'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('loan_created_successfully') }}
                </div>
            @endif



            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    <div class="card-title">List of all loans</div>
                    <span class="d-block"><a href="/center-manager/new-loan"
                            class="btn btn-success text-light">New Loan</a></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered border-top-0 border-bottom-0"
                            style="width:100%; font-size: 0.8em;">
                            <tr class="border-bottom-0">
                                <td><b>Branch</b></td>
                                <td><b>Date</b></td>
                                <td><b>Client</b></td>
                                <td colspan="3" class="text-center"><b>Amount</b></td>
                                <td colspan="3" class="text-center"><b>Principal</b></td>
                                <td colspan="3" class="text-center"><b>Interest</b></td>
                                <td><b>Installments</b></td>
                                <td colspan="3" class="text-center"><b>Security</b></td>
                                <td><b>Action</b></td>
                            </tr>
                            <tr>
                                <td><b>Center</b></td>
                                <td></td>
                                <td><b>A/C Number</b></td>
                                <td><b>Total </b></td>
                                <td><b>Paid</b></td>
                                <td><b>Due</b></td>
                                <td><b>Total </b></td>
                                <td><b>Paid</b></td>
                                <td><b>Due</b></td>
                                <td><b>Total </b></td>
                                <td><b>Paid</b></td>
                                <td><b>Due</b></td>
                                <td><b>Paid/Due</b></td>
                                <td><b>Processing fee</b></td>
                                <td><b>Insurance fee</b></td>
                                <td><b>View</b></td>
                            </tr>
                            <tbody>
                                @foreach ($loans as $loan)
                                    <tr class="border-top-0">
                                        <td>
                                            <b>{{ $loan->branch_id }}:{{ $loan->center_id }}</b>
                                        </td>
                                        <td>
                                            <b>{{ $loan->created_at->format('d/m/Y') }}</b>
                                        </td>
                                        <td>
                                            <a
                                                href="/center-manager/view-client/{{ $loan->client_id }}">{{ $loan->client_id }}</a>
                                        </td>
                                        <td>
                                            {{ number_format($loan->total_amount, 2) }}
                                        </td>
                                        <td>
                                            {{ number_format($loan->paid_amount, 2) }}
                                        </td>
                                        <td>
                                            <b>{{ number_format($loan->due_amount, 2) }}</b>
                                        </td>
                                        <td>
                                            {{ number_format($loan->total_pricipal, 2) }}
                                        </td>
                                        <td>
                                            {{ number_format($loan->paid_pricipal, 2) }}
                                        </td>
                                        <td>
                                            <b>{{ number_format($loan->due_pricipal, 2) }}</b>
                                        </td>
                                        <td>
                                            {{ number_format($loan->total_interest, 2) }}
                                        </td>
                                        <td>
                                            {{ number_format($loan->paid_interest, 2) }}
                                        </td>
                                        <td>
                                            <b>{{ number_format($loan->due_interest, 2) }}</b>
                                        </td>
                                        <td>
                                            {{ $loan->paid_emi }} / {{ $loan->total_emi }}
                                        </td>
                                        <td>
                                            <b>{{ $loan->processing_fees }}</b>
                                        </td>
                                        <td>
                                            <b>{{ $loan->insurance }}</b>
                                        </td>
                                        <td>
                                            <a href="/center-manager/loan/{{ $loan->id }}"
                                                class="btn btn-sm btn-danger">View</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- table-wrapper -->
            </div>
        </div>
    </div>



</div>
