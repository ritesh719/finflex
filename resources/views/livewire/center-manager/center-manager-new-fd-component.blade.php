<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Center Manager</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/center-manager/new-loan">New loan</a></li>
        </ol>
    </div>
    @if (Session::has('fd_created_successfully'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('fd_created_successfully') }}
        </div>
    @endif
    <div class="row row-deck">
        <div class="col-lg-12">

            <form class="card" wire:submit.prevent="createNewFd">
                <div class="card-header">
                    <b style="font-size: 1.5em;">New fd form</b>
                    {{-- <a href="" wire:click.prevent="test" class="btn btn-dark">Test</a> --}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">
                                    FD opening date
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="input-group">
                                <input wire:model="fd_opening_date" class="form-control" placeholder="MM/DD/YYYY"
                                    type="date">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">
                                    Select Client
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <select required wire:model="client_id" class="custom-select">
                                    <option value="">Select Client</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->id }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">
                                    Client Name
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input required wire:model="client_name" type="text" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">
                                    FD amount
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input required wire:model="fd_amount" type="text" class="form-control"
                                    placeholder="Enter fd amount">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">
                                    Interest rate (per month)
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input required wire:model="interest_rate" type="text" class="form-control"
                                    placeholder="Enter interest rate">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-left">
                        <button type="submit" value="submit" name="submit"
                            class="btn btn-primary btn-lg">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')

@endpush
