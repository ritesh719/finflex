<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Centers</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="/admin/centers">Centers</li>
        </ol>
    </div>

    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    <div class="card-title">List of Centers </div>
                    <div class="form-group">
                        <select class="form-control" wire:model="selected_branch">
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->id }} : {{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <span class="d-block"><a href="#" class="btn btn-success text-light"
                            wire:click.prevent="showModal">Add new</a></span>
                </div>
                <div class="card-body">

                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0"
                            style="width:100%">
                            <thead>
                                <tr class="border-bottom-0">
                                    <th class="wd-15p">Center Id</th>
                                    <th class="wd-15p">Center Name</th>
                                    <th class="wd-15p">Branch Name</th>
                                    <th class="wd-15p">Center Manager Name</th>
                                    <th class="wd-15p">Number of Clients</th>
                                    <th class="wd-20p">Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($centers as $center)
                                    <tr class="border-top-0">
                                        <td>{{ $center->center_id }}</td>
                                        <td>{{ $center->name }}</td>
                                        <td>{{ $center->branch->name }}</td>
                                        @if ($center->centerManager)
                                            <td>{{ $center->centerManager->user->name }}</td>
                                        @else
                                            <td class="bg-warning">No Center Manager</td>
                                        @endif
                                        <td></td>
                                        <td>{{ $center->remarks }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>


                        <div class="d-flex align-items-center justify-content-end">
                            {{ $centers->links() }}
                        </div>
                    </div>
                </div>
                <!-- table-wrapper -->
            </div>
        </div>
    </div>


    <!-- Message Modal -->
    <div wire:ignore.self class="modal fade" id="addNewCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="addCenter">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">Add New Center</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="center_id" class="form-control-label">Center Id:</label>
                            <input type="number" wire:model.defer="center_id" required class="form-control"
                                id="center_id" placeholder="Enter Center Id">
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name:</label>
                            <input type="text" wire:model.defer="name" required class="form-control" id="name"
                                placeholder="Enter Center Name">
                        </div>
                        <div class="form-group">
                            <label for="branch" class="form-control-label">Select Branch:</label>
                            <select class="form-control" required wire:model.defer="branch_id">
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">({{ $branch->id }}) {{ $branch->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="remarks" class="form-control-label">Address:</label>
                            <input type="remarks" class="form-control" wire:model.defer="remarks" required
                                id="remarks" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>

</div>


@push('scripts')
    <script>
        window.addEventListener('show-modal', event => {
            $("#addNewCenter").modal('show');
        })
        window.addEventListener('hide-modal', event => {
            $("#addNewCenter").modal('hide');
        })
    </script>
@endpush
