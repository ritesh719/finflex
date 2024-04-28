<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Outstanding Report - Branch</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/branch-manager/dashboard">Dashboard</a></li>
        </ol>
    </div>



    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h5>Centerwise Outstanding Report</h5>
                    </div>
                </div>
                <div class="card-body">
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
                                    <th>Center ID</th>
                                    <th>Principal Outstanding</th>
                                    <th>Interest Outstanding</th>
                                    <th>FD Outstanding</th>
                                    <th>Total Outstanding</th>
                                    <th>Principal at Risk</th>
                                    <th>Interest at Risk</th>
                                    <th>Total Risk Outstanding</th>
                                </thead>
                            </tr>

                            @foreach ($outstandings as $outstanding)
                                <tr>
                                    <td>
                                        {{ $branch->id }} : {{ $outstanding->center->center_id }}
                                    </td>
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
                            @endforeach

                            <tr>
                                <td>
                                    <b>Total</b>
                                </td>
                                <td>
                                    {{ number_format($overall_principal_outstanding, 2) }}
                                </td>
                                <td>
                                    {{ number_format($overall_interest_outstanding, 2) }}
                                </td>
                                <td>
                                    {{ number_format($overall_fd_outstanding, 2) }}
                                </td>
                                <td>
                                    <b>
                                        {{ number_format($overall_total_outstanding, 2) }}
                                    </b>
                                </td>
                                <td>
                                    {{ number_format($overall_principal_risk_outstanding, 2) }}
                                </td>
                                <td>
                                    {{ number_format($overall_interest_risk_outstanding, 2) }}
                                </td>
                                <td>
                                    <b>
                                        {{ number_format($overall_total_risk_outstanding, 2) }}
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
