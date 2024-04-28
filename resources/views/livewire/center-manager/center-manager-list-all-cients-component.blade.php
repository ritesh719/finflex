<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">List of all clients</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/center-manager/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="center-manager/all-clients">List all clients</li>
        </ol>
    </div>

    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">


            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    <div class="card-title">List of all Clients</div>
                    <span class="d-block"><a href="/center-manager/add-client"
                            class="btn btn-success btn-sm text-light">Add new</a></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0"
                            style="width:100%">
                            <thead>
                                <tr class="border-bottom-0">
                                    <th class="wd-15p">A/C Number</th>
                                    <th class="wd-15p">Name</th>
                                    <th class="wd-15p">Mobile</th>
                                    <th class="wd-15p">Address</th>
                                    <th class="wd-15p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr class="border-top-0">
                                        <td>
                                            {{ $client->id }}
                                        </td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->mobile }}</td>
                                        <td>{{ $client->c_address }}</td>
                                        <td>
                                            <a href="/center-manager/view-client/{{ $client->id }}"
                                                class="btn btn-dark text-light btn-sm"> <i
                                                    class="fa fa-eye text-light"></i>
                                                View </a>
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
