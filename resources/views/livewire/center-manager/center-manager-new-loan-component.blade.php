<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Center Manager</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/center-manager/new-loan">New loan</a></li>
        </ol>
    </div>

    @if (Session::has('loan_created_successfully'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('loan_created_successfully') }}
        </div>
    @endif

    <div class="row row-deck">
        <div class="col-lg-12">
            <form class="card" wire:submit.prevent="createNewLoan">
                <div class="card-header">
                    <b style="font-size: 1.5em;">New loan form</b>
                    {{-- <a href="" wire:click.prevent="test" class="btn btn-dark">Test</a> --}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">
                                    Loan disbursement date
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="input-group">
                                <input wire:model="disbursement_date" class="form-control" placeholder="MM/DD/YYYY"
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
                                    Loan amount
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input required wire:model="loan_amount" type="text" class="form-control"
                                    placeholder="Enter loan amount">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">
                                    Processing fees
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input required wire:model="processing_fees" type="text" class="form-control"
                                    placeholder="Enter processing fee">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">
                                    Insurance fees
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input required wire:model="insurance_fees" type="text" class="form-control"
                                    placeholder="Enter insurance fees">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">
                                    Passbook fees
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input required wire:model="passbook_cost" type="text" class="form-control"
                                    placeholder="Enter passbook cost">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">
                                    Total weeks
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input required wire:model="total_weeks" type="text" class="form-control"
                                    placeholder="Enter total weeks">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">
                                    Weekly installment
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input required wire:model="weekly_installment" type="text" class="form-control"
                                    placeholder="Enter weekly installment">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">
                                    Payment day
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <select required wire:model="payment_day" class="custom-select">
                                    <option value="">Select Payment Day</option>
                                    <option value="monday">monday</option>
                                    <option value="tuesday">tuesday</option>
                                    <option value="wednesday">wednesday</option>
                                    <option value="thursday">thursday</option>
                                    <option value="friday">friday</option>
                                    <option value="saturday">saturday</option>
                                    <option value="sunday">sunday</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-left">
                    <button type="submit" value="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')

@endpush
