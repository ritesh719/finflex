<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Manage Center Managers</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="/admin/center-manager">Manage Center Manager</li>
        </ol>
    </div>

    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    <div class="card-title">List of Center Managers</div>
                    <div class="form-group">
                        <select id="branch_sel" class="form-control" wire:model="branch_id">
                            @foreach ($branches as $b)
                                <option value="{{ $b->id }}">({{ $b->id }}) {{ $b->name }}</option>
                            @endforeach
                        </select>
                    </div>
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
                                    <th class="wd-20p">Center</th>
                                    <th class="wd-10p">Email</th>
                                    <th class="wd-15p">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($centerManagers as $cm)
                                    <tr class="border-top-0">
                                        <td>{{ $cm->user->name }}</td>
                                        <td>{{ $cm->centers->name }}</td>
                                        <td>{{ $cm->user->email }}</td>
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
    <div wire:ignore.self class="modal fade" id="addNewCenterManagerMOdal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="#" wire:submit.prevent="addCenterManager">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">Add New Center Manager</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name:</label>
                            <input wire:model.defer="name" type="text" class="form-control" id="name"
                                placeholder="Enter name of Center Manager">
                        </div>
                        <div class="form-group">
                            <label for="center" class="form-control-label">Center:</label>
                            <select wire:model.defer="center_id" name="" id="center" required class="form-control">

                                <option value="">Select Center</option>
                                @foreach ($centers as $center)
                                    @if (!$center->centerManager)
                                        <option value="{{ $center->id }}">({{ $center->center_id }})
                                            {{ $center->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-control-label">Email:</label>
                            <input wire:model.defer="email" type="email" class="form-control" id="email"
                                placeholder="Enter e-mail">
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
            $("#addNewCenterManagerMOdal").modal('show');
        })
        window.addEventListener('hide-modal', event => {
            $("#addNewCenterManagerMOdal").modal('hide');
        })
    </script>
@endpush
