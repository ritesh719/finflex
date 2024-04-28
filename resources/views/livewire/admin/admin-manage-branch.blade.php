<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Branches</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="/admin/branches">Branches</li>
        </ol>
    </div>

    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    <div class="card-title">List of Branches</div>
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
                                    <th class="wd-15p">Code</th>
                                    <th class="wd-15p">Branch Name</th>
                                    <th class="wd-15p">Branch Manager Name</th>
                                    <th class="wd-20p">Created at</th>
                                    <th class="wd-20p">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branches as $branch)
                                    <tr>
                                        <td>{{ $branch->id }}</td>
                                        <td>{{ $branch->name }}</td>
                                        @if ($branch->branchManager)
                                            <td>{{ $branch->branchManager->user->name }}</td>
                                        @else
                                            <td class="bg-warning">No Branch Manager</td>
                                        @endif
                                        <td>{{ $branch->created_at }}</td>
                                        <td>{{ $branch->remarks }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex align-items-center justify-content-end">
                            {{ $branches->links() }}
                        </div>
                    </div>
                </div>
                <!-- table-wrapper -->
            </div>
        </div>
    </div>


    <!-- Message Modal -->
    <div wire:ignore.self class="modal fade" id="addNewBranch" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="addBranch">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">Add New Branch</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name:</label>
                            <input type="text" wire:model.defer="name" required class="form-control" id="name"
                                placeholder="Enter Branch Name">
                        </div>
                        <div class="form-group">
                            <label for="remarks" class="form-control-label">Address:</label>
                            <input type="remarks" wire:model.defer="remarks" required class="form-control"
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
            $("#addNewBranch").modal('show');
        })
        window.addEventListener('hide-modal', event => {
            $("#addNewBranch").modal('hide');
        })
    </script>
@endpush
