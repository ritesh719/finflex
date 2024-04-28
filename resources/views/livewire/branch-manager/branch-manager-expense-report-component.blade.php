<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Datewise Expense Report - Branch </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/branch-manager/dashboard">Dashboard</a></li>
        </ol>
    </div>



    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="card" id="printableArea">
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
                                    <th>Date</th>
                                    <th>Expense</th>
                                    <th>Amount</th>
                                    <th>Remark</th>
                                </thead>
                            </tr>

                            @foreach ($expenses as $e)
                                <tr>
                                    <td>{{ $e->created_at->format('d-M-Y') }}</td>
                                    <td>{{ $e->name }}</td>
                                    <td>{{ $e->amount }}</td>
                                    <td>{{ $e->remarks }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
