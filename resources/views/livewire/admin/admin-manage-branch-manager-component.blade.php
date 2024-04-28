<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Manage Branch Managers</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="/admin/branch-manager">Manage Branch Managers</li>
        </ol>
    </div>

    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    <div class="card-title">List of Branch Managers</div>
                    <span class="d-block"><a href="#" class="btn btn-success text-light"
                            wire:click.prevent="showModal">Add new</a></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0"
                            style="width:100%">
                            <thead>
                                <tr class="border-bottom-0">
                                    <th class="wd-15p">Name</th>
                                    <th class="wd-15p">Branch</th>
                                    <th class="wd-10p">Email</th>
                                    <th class="wd-15p">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branchManagers as $bm)
                                    <tr class="border-top-0">
                                        <td>{{ $bm->user->name }}</td>
                                        <td>{{ $bm->branches->name }}</td>
                                        <td>{{ $bm->user->email }}</td>
                                        <td>Active</td>
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


    <!-- Message Modal -->
    <div wire:ignore.self class="modal fade" id="addNewBranchManagerMOdal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="addBranchManager">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">Add New Branch Manager</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name:</label>
                            <input wire:model.defer="name" type="text" class="form-control" id="name"
                                placeholder="Enter name of Branch Manager">
                        </div>
                        <div class="form-group">
                            <label for="branch" class="form-control-label">Branch:</label>
                            <select wire:model.defer="branches_id" required name="" id="branch" class="form-control">
                                <option value="">Select Branch</option>
                                @foreach ($branches as $branch)
                                    @if (!$branch->branchManager)
                                        <option value="{{ $branch->id }}">({{ $branch->id }}) {{ $branch->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-control-label">Email:</label>
                            <input wire:model.defer="email" type="email" class="form-control" id="email"
                                placeholder="Enter e-mail">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-control-label">Password:</label>
                            <input wire:model.defer="password" type="password" class="form-control" id="password"
                                placeholder="Enter password">
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
            $("#addNewBranchManagerMOdal").modal('show');
        })
        window.addEventListener('hide-modal', event => {
            $("#addNewBranchManagerMOdal").modal('hide');
        })
    </script>
@endpush
