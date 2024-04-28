<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-TileColor" content="#0061da">
    <meta name="theme-color" content="#1643a3">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- Title -->
    <title>Branch Manager | JS Micro Finance Corporation</title>
    <link rel="stylesheet" href="{{ asset('assets\fonts\fonts\font-awesome.min.css') }}">

    <!-- Sidemenu Css -->
    <link href="{{ asset('assets\plugins\fullside-menu\css\style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets\plugins\fullside-menu\waves.min.css') }}" rel="stylesheet">

    <!-- Dashboard Css -->
    <link href="{{ asset('assets\css\dashboard.css') }}" rel="stylesheet">

    <!-- Custom scroll bar css-->
    <link href="{{ asset('assets\plugins\scroll-bar\jquery.mCustomScrollbar.css') }}" rel="stylesheet">

    <!-- select2 Plugin -->
    <link href="{{ asset('assets\plugins\select2\select2.min.css') }}" rel="stylesheet">

    <!-- Custom scroll bar css-->
    <link href="{{ asset('assets\plugins\scroll-bar\jquery.mCustomScrollbar.css') }}" rel="stylesheet">

    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">

    <!---Font icons-->
    <link href="{{ asset('assets\css\icons.css') }}" rel="stylesheet">
    @livewireStyles

</head>

<body class="">
    <div id="global-loader"></div>
    <div class="page">
        <div class="page-main">
            <div class="app-header1 header py-1 d-flex">
                <div class="container-fluid">
                    <div class="d-flex">
                        <a class="header-brand" href="/branch-manager/dashboard">
                            {{-- <img src="{{ asset('assets\images\brand\logo.png') }}" class="header-brand-img"
                                alt="branch-manageror logo"> --}}
                            <p class="text-light header-brand-img pt-3" style="font-family: 'Roboto', sans-serif;">
                                JS</p>
                        </a>
                        <div class="menu-toggle-button">
                            <a class="nav-link wave-effect" href="#" id="sidebarCollapse">
                                <span class="fa fa-bars"></span>
                            </a>
                        </div>
                        <div class="d-flex order-lg-2 ml-auto header-right-icons header-search-icon">
                            <div class="p-2">
                                <form class="input-icon ">
                                    <div class="input-icon-addon">
                                        <i class="fe fe-search"></i>
                                    </div>
                                    <input type="search" class="form-control header-search" placeholder="Search&hellip;"
                                        tabindex="1">
                                </form>
                            </div>

                            <div class="dropdown d-none d-md-flex">
                                <a class="nav-link icon full-screen-link nav-link-bg">
                                    <i class="fa fa-expand" id="fullscreen-button"></i>
                                </a>
                            </div>
                            <div class="dropdown text-center selector">
                                <a href="#" class="nav-link leading-none" data-toggle="dropdown">
                                    <i class="fa fa-user-circle fa-2x text-light"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
                                    <div class="text-center">
                                        <a href="/branch-manager/dashboard"
                                            class="dropdown-item text-center font-weight-sembold user"
                                            data-toggle="dropdown">{{ Auth::user()->name }}</a>
                                        <span
                                            class="text-center user-semi-title text-dark">{{ Auth::user()->email }}</span>
                                        <div class="dropdown-divider"></div>
                                    </div>
                                    <a class="dropdown-item" href="/user/profile">
                                        <i class="dropdown-icon mdi mdi-account-outline"></i> Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon mdi mdi-compass-outline"></i> Need help?
                                    </a>
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
                                    </a>

                                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper">
                <!-- Sidebar Holder -->
                <nav id="sidebar" class="nav-sidebar" style="min-height: 100vh !important;">
                    <ul class="list-unstyled components" id="accordion">
                        <div class="user-profile">
                            <div class="dropdown user-pro-body">
                                <div>
                                    <i class="fa fa-user-circle-o fa-4x"></i>
                                </div>
                                <div class="mb-2"><a href="/branch-manager/dashboard" class=""
                                        data-toggle="" aria-haspopup="true" aria-expanded="false"> <span
                                            class="font-weight-semibold">{{ Auth::user()->email }}</span> </a>
                                    <br><span class="text-gray">{{ Auth::user()->name }}</span>
                                </div>
                            </div>
                        </div>

                        <li class="">
                            <a href="#homeSubmenu" class="accordion-toggle wave-effect" data-toggle="collapse"
                                aria-expanded="false">Clients
                            </a>
                            <ul class="collapse list-unstyled" id="homeSubmenu" data-parent="#accordion">
                                <li><a href="{{ route('branchmanager.listclients') }}">List all</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('branchmanager.expense') }}">Expenses</a>
                        </li>
                        <li><a href="{{ route('branchmanager.dailycashpositionreport') }}">Daily CPR (Closing)</a>
                        </li>
                        <li><a href="{{ route('branchmanager.datewisecashpositionreport') }}">Datewise CPR</a></li>
                        <li><a href="{{ route('branchmanager.monthlybalancesheet') }}">Monthly Balance Sheet</a></li>
                        <li><a href="{{ route('branchmanager.outstanding') }}">Outstanding Report</a></li>
                        <li><a href="{{ route('branchmanager.loanactivityreport') }}">Loan Activity Report</a></li>
                        <li><a href="{{ route('branchmanager.expensereport') }}">Expense Report</a></li>
                        <li><a href="{{ route('branchmanager.cdsreport') }}">CDS Report</a></li>
                    </ul>
                </nav>
                {{ $slot }}
            </div>
        </div>


    </div>

    <!--footer-->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
                    Copyright © 2021 <a href="#">Finflex.</a> Designed by <a href="#">Ritesh
                        Srivastava</a> All rights reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer-->

    <!-- Back to top -->
    <a href="#top" id="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>

    <!-- Dashboard Core -->
    <script src="{{ asset('assets\js\vendors\jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets\js\vendors\bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets\js\vendors\jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets\js\vendors\selectize.min.js') }}"></script>
    <script src="{{ asset('assets\js\vendors\jquery.tablesorter.min.js') }}"></script>
    <script src="{{ asset('assets\js\vendors\circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets\plugins\rating\jquery.rating-stars.js') }}"></script>

    <!-- Fullside-menu Js-->
    <script src="{{ asset('assets\plugins\fullside-menu\jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets\plugins\fullside-menu\waves.min.js') }}"></script>

    <!--Select2 js -->
    <script src="{{ asset('assets\plugins\select2\select2.full.min.js') }}"></script>


    <!-- file uploads js -->
    <script src="{{ asset('assets\plugins\fileuploads\js\dropify.min.js') }}"></script>

    <!-- Custom scroll bar Js-->
    <script src="{{ asset('assets\plugins\scroll-bar\jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <!-- Custom Js-->
    <script src="{{ asset('assets\js\custom.js') }}"></script>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            var css = '@page { size: landscape; } .pagebreak {page-break-before: always !important;}',
                head = document.head || document.getElementsByTagName('head')[0],
                style = document.createElement('style');

            style.type = 'text/css';
            style.media = 'print';

            if (style.styleSheet) {
                style.styleSheet.cssText = css;
            } else {
                style.appendChild(document.createTextNode(css));
            }

            head.appendChild(style);
            window.print();
            window.close();
            document.body.innerHTML = originalContents;
        }
    </script>
    @livewireScripts
    @stack('scripts')
</body>

</html>
