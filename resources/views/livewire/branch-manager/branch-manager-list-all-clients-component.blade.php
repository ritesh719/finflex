<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">List of all clients</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/branch-manager/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="branch-manager/list-clients">List all clients</li>
        </ol>
    </div>

    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">
            @if (Session::has('client_add_successfully'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('client_add_successfully') }}
                </div>
            @endif



            <div class="card">
                <div class="card-header">
                    <div class="row w-100">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="form-label">
                                    Select Center:
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group text-center">
                                <select class="form-control" wire:model="center_id">
                                    @foreach ($centers as $center)
                                        <option value="{{ $center->id }}">{{ $center->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3 text-right">
                            <a href="/center-manager/add-client" class="btn btn-success text-light">Add new</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0"
                            style="width:100%">
                            <thead>
                                <tr class="border-bottom-0">
                                    <th>S. No.</th>
                                    <th>A/C Number</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Joining date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr class="border-top-0">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $client->id }}
                                        </td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->mobile }}</td>
                                        <td>{{ $client->c_address }}</td>
                                        <td>{{ $client->created_at->format('d-M-Y') }}</td>
                                        <td>
                                            <a href="/center-manager/view-client/{{ $client->id }}"
                                                class="btn btn-dark text-light btn-sm"> <i
                                                    class="fa fa-eye text-light"></i>
                                                View </a>
                                        </td>
                                    </tr>
                                @endforeach

                                <div class="d-flex align-items-center justify-content-end">
                                    {{ $clients->links() }}
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- table-wrapper -->
            </div>
        </div>
    </div>



</div>
