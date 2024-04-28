<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Dashboard</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard 1</li>
        </ol>
    </div>

    <div class="row row-cards">
        <div class="col-sm-12 col-lg-6 col-xl-3 col-md-6">
            <a href="{{ route('admin.manageCenter') }}">
                <div class="card card-img-holder text-default bg-color">
                    <div class="row">
                        <div class="col-4">
                            <div class="circle-icon bg-primary text-center align-self-center shadow-primary"><img
                                    src="{{ asset('assets\images\circle.svg') }}" class="card-img-absolute"><i
                                    class="lnr lnr-apartment fs-30  text-white mt-4"></i></div>
                        </div>
                        <div class="col-8">
                            <div class="card-body p-4">
                                <h1 class="mb-3">
                                    {{ $total_centers }}
                                </h1>
                                <h5 class="font-weight-normal mb-0">Centers</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-12 col-lg-6 col-xl-3 col-md-6">
            <div class="card card-img-holder text-default">
                <div class="row">
                    <div class="col-4">
                        <div
                            class="card-img-absolute circle-icon bg-secondary align-items-center text-center shadow-secondary">
                            <img src="{{ asset('assets\images\circle.svg') }}" class="card-img-absolute"><i
                                class="lnr lnr-users fs-30 text-white mt-4"></i>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card-body p-4">
                            <h1 class="mb-3">{{ $total_clients }}</h1>
                            <h5 class="font-weight-normal mb-0">Clients</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 col-xl-3 col-md-6">
            <div class="card card-img-holder text-default">
                <div class="row">
                    <div class="col-4">
                        <div class="card-img-absolute  circle-icon bg-info align-items-center text-center shadow-info">
                            <img src="{{ asset('assets\images\circle.svg') }}" class="card-img-absolute"><i
                                class="lnr lnr-briefcase fs-30 text-white mt-4"></i>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card-body p-4">
                            <h1 class="mb-3">{{ $total_loans }}</h1>
                            <h5 class="font-weight-normal mb-0">Loans</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 col-xl-3 col-md-6">
            <div class="card card-img-holder text-default">
                <div class="row">
                    <div class="col-4">
                        <div
                            class="card-img-absolute circle-icon bg-success align-items-center text-center shadow-success">
                            <img src="{{ asset('assets\images\circle.svg') }}" class="card-img-absolute"><i
                                class=" lnr lnr-lock fs-30 text-white mt-4 "></i>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card-body p-4">
                            <h1 class="mb-3">{{ $total_fds }}</h1>
                            <h5 class="font-weight-normal mb-0">FDs</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
