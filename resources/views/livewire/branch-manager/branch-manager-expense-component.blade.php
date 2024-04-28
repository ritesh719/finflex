<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Expenses - Branch</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/branch-manager/dashboard">Dashboard</a></li>
        </ol>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <form class="card" wire:submit.prevent="addExpense">
                <div class="card-header">
                    <div class="card-title">
                        Expenses Entry
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">Date: </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="date" class="form-control" wire:model="meeting_date">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">Name: </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" required class="form-control" placeholder="Enter expediture name"
                                    wire:model="name">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">Amount: </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="number" required class="form-control" placeholder="Enter amount"
                                    wire:model="amount">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">Remarks: </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter remarks"
                                    wire:model="remarks">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-right">
                    <button class="btn btn-danger text-light" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>



</div>
