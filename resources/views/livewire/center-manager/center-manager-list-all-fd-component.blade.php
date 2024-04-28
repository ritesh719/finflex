<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">List of all FD</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/center-manager/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="center-manager/list-loans">List all loans</li>
        </ol>
    </div>

    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    <div class="card-title">List of all FD</div>
                    <span class="d-block"><a href="/center-manager/new-fd" class="btn btn-success text-light">New
                            FD</a></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered border-top-0 border-bottom-0"
                            style="width:100%; font-size: 0.8em;">
                            <tr class="border-bottom-0">
                                <td><b>B:C</b></td>
                                <td><b>Opening (YYYY/MM/DD)</b></td>
                                <td><b>Client</b></td>
                                <td><b>Client Name</b></td>
                                <td><b>Principal</b></td>
                                <td><b>Interest</b></td>
                                <td><b>Amount</b></td>
                                <td><b>Status</b></td>
                                <td><b>Action</b></td>
                                
                            </tr>
                            <tbody>
                                @foreach ($fds as $fd)
                                    <tr class="border-top-0">
                                        <td>
                                            <b>{{ $fd->branch_id }}:{{ $fd->center_id }}</b>
                                        </td>
                                        <td>
                                            <b>{{ $fd->created_at }}</b>
                                        </td>
                                        <td>
                                            <a
                                                href="/center-manager/view-client/{{ $fd->client_id }}">{{ $fd->client_id }}</a>
                                        </td>
                                        <td>
                                            <a
                                                href="/center-manager/view-client/{{ $fd->client_id }}">{{ $fd->client->name }}</a>
                                        </td>
                                        <td>
                                            {{ number_format($fd->principal, 2) }}
                                        </td>
                                        <td>
                                            {{ number_format($fd->interest, 2) }}
                                        </td>
                                        <td>
                                            <b>{{ number_format($fd->amount, 2) }}</b>
                                        </td>
                                        <td>
                                            {{ $fd->status }}
                                        </td>
                                        <td>
                                            @if ($fd->status == 'open')
                                                <a class="btn btn-sm btn-danger text-light"
                                                    wire:click.prevent="openModal({{ $fd->id }})">Close</a>
                                            @endif
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


    <div class="modal fade" id="fdCloseModal" tabindex="-1" role="dialog" aria-labelledby="fdCloseModal"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm FD Withdrawal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 py-3">Withdrawal Date:</div>
                        <div class="col-8">
                            <input wire:model="selected_date" class="form-control" placeholder="MM/DD/YYYY"
                                type="date" wire:change="calculateFd">
                        </div>
                        <div class="col-4 py-3">
                            <b>Principal</b>
                        </div>
                        <div class="col-8 py-3">
                            {{ $principal }}
                        </div>
                        <div class="col-4 py-3">
                            <b>Interest</b>
                        </div>
                        <div class="col-8 py-3">
                            <input type="number" class="form-control" wire:model="interest">
                        </div>

                        <div class="col-4 py-3">
                            <b>Total Amount</b>
                        </div>
                        <div class="col-8 py-3">
                            <input type="number" class="form-control" wire:model="total_amount">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    @if ($interest != 'NA')
                        <button type="button" class="btn btn-success" wire:click.prevent="closeFD">Confirm</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>


@push('scripts')
    <script>
        window.addEventListener('show-modal', event => {
            $("#fdCloseModal").modal('show');
        })
        window.addEventListener('hide-modal', event => {
            $("#fdCloseModal").modal('hide');
        })
    </script>
@endpush
