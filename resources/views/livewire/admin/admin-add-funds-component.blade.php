<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Add Funds</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
        </ol>
    </div>

    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="row">
                <form class="card" wire:submit.prevent="addFundsToBranch">
                    <div class="card-header">
                        <h5>Add funds to branch</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Select Branch: </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <select required class="form-control" wire:model='selected_branch_id'>
                                        <option value="">Select Branch</option>
                                        @foreach ($branches as $b)
                                            <option value="{{ $b->id }}">{{ $b->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Funding Amount: </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <input required wire:model="funding_amount" type="number" class="form-control"
                                        placeholder="Enter Amount">
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Branch Balance Status</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <thead>
                                        <th>S. No.</th>
                                        <th>Name</th>
                                        <th>Total Funds Allocated</th>
                                        <th>Balance</th>
                                    </thead>
                                </tr>

                                @foreach ($branches as $b)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $b->name }}</td>
                                        <td>{{ $b->total_allocated_funds }}</td>
                                        <td>{{ $b->balance }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>


@push('scripts')

@endpush
