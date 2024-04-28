<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Center Outstandings</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/center-manager/dashboard">Dashboard</a></li>
        </ol>
    </div>


    <div class="row row-deck">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h5>({{ $branch->id }} : {{ $center->id }}) {{ $center->name }}</h5>
                    </div>
                </div>
                <div class="card-body">
                    <style>
                        td {
                            font-size: 0.8em !important;
                        }

                        th {
                            font-size: 0.8em !important;
                        }

                    </style>
                    <table class="table table-bordered">
                        <tr>
                            <thead>
                                <th>Principal Outstanding</th>
                                <th>Interest Outstanding</th>
                                <th>FD Outstanding</th>
                                <th>Total Outstanding</th>
                                <th>Principal at Risk</th>
                                <th>Interest at Risk</th>
                                <th>Total Risk Outstanding</th>
                            </thead>
                        </tr>

                        <tr>
                            <td>
                                {{ number_format($outstanding->principal_outstanding, 2) }}
                            </td>
                            <td>
                                {{ number_format($outstanding->interest_outstanding, 2) }}
                            </td>
                            <td>
                                {{ number_format($outstanding->fd_outstanding, 2) }}
                            </td>
                            <td>
                                <b>
                                    {{ number_format($outstanding->total_outstanding, 2) }}
                                </b>
                            </td>
                            <td>
                                {{ number_format($outstanding->principal_risk_outstanding, 2) }}
                            </td>
                            <td>
                                {{ number_format($outstanding->interest_risk_outstanding, 2) }}
                            </td>
                            <td>
                                <b>
                                    {{ number_format($outstanding->total_risk_outstanding, 2) }}
                                </b>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

{{-- @push('scripts')
    <script>
        window.addEventListener('show-modal', event => {
            $("#confirmPaymentModal").modal('show');
        })
        window.addEventListener('hide-modal', event => {
            $("#confirmPaymentModal").modal('hide');
        })
    </script>
@endpush --}}
