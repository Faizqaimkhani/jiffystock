<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Trader Ready Stocks is a B2B ecommerce system" />
    <meta name="author" content="A-Z Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Trader Ready Stocks</title>

    <!-- app favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('dashboard/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/css/vendors.css') }}" rel="stylesheet"> -->

    <!-- bootstrap links -->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap-4.2.1/css/bootstrap.min.css') }}">

    <script src="{{ asset('frontend/vendor/bootstrap-4.2.1/js/bootstrap.bundle.min.js') }}"></script>

    <link href="{{ asset('assets') }}/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <!-- font awesome links -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <!-- jqurey -->
    <script src="{{ asset('frontend/vendor/jquery-3.3.1/jquery.min.js') }}"></script>

    @yield('service_css')

    @yield('js')

    <script>
        var base_url = '{{ url("/") }}';

    </script>
    <style>
      .notify {
        float: right;
        margin-left: 27px;
        background: white;
        color: orange;
        padding: 0px;
        border-radius: 62px;
        width: 18px;
        height: 19px;
        text-align: center;
        font-weight: bolder;
        margin-top: -5px;
     }
  </style>

</head>
<body>
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="{{ asset('dashboard/assets/img/loader/loader.svg') }}" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->
            <!-- begin app-header -->
            <header class="app-header top-bar">
                <!-- begin navbar -->
                <nav class="navbar navbar-expand-md">

                    <!-- begin navbar-header -->
                    <div class="navbar-header d-flex align-items-center">
                        <a href="javascript:void:(0)" class="mobile-toggle"><i class="ti ti-align-right"></i></a>
                        <a class="navbar-brand" href="/">
                            <img src="{{asset('frontend/images/logos/png/logo_web.png')}}" class="img-fluid logo-desktop" alt="logo" />
                            <img src="{{asset('frontend/images/logos/png/logo_web.png')}}" class="img-fluid logo-mobile" alt="logo" />
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-align-left"></i>
                    </button>
                    <!-- end navbar-header -->
                    <!-- begin navigation -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="navigation d-flex">
                            <ul class="navbar-nav nav-left">
                                <li class="nav-item">
                                    <a href="javascript:void(0)" class="nav-link sidebar-toggle">
                                        <i class="ti ti-align-right"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="navbar-nav nav-right ml-auto">
                          {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti ti-email"></i>
                                    </a>
                                    <div class="dropdown-menu extended animated fadeIn" aria-labelledby="navbarDropdown">
                                        <ul>
                                            <li class="dropdown-header bg-gradient p-4 text-white text-left">Messages
                                                <label class="label label-info label-round">6</label>
                                                <a href="#" class="float-right btn btn-square btn-inverse-light btn-xs m-0">
                                                    <span class="font-13"> Mark all as read</span></a>
                                            </li>
                                            <li class="dropdown-body">
                                                <ul class="scrollbar scroll_dark max-h-240">
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <img class="img-fluid" src="assets/img/avtar/03.jpg" alt="user3">
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Brianing Leyon</p>
                                                                    <small>You will sail along until you...</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <img class="img-fluid" src="assets/img/avtar/01.jpg" alt="user">
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Jimmyimg Leyon</p>
                                                                    <small>Okay</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <img class="img-fluid" src="assets/img/avtar/02.jpg" alt="user2">
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Brainjon Leyon</p>
                                                                    <small>So, make the decision...</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <img class="img-fluid" src="assets/img/avtar/04.jpg" alt="user4">
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Smithmin Leyon</p>
                                                                    <small>Thanks</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <img class="img-fluid" src="assets/img/avtar/05.jpg" alt="user5">
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Jennyns Leyon</p>
                                                                    <small>How are you</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <img class="img-fluid" src="assets/img/avtar/06.jpg" alt="user6">
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Demian Leyon</p>
                                                                    <small>I like your themes</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-footer">
                                                <a class="font-13" href="javascript:void(0)"> View All messages </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-bell"></i>
                                        <span class="notify">
                                                    <span class="blink"></span>
                                        <span class="dot"></span>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu extended animated fadeIn" aria-labelledby="navbarDropdown">
                                        <ul>
                                            <li class="dropdown-header bg-gradient p-4 text-white text-left">Notifications
                                                <a href="#" class="float-right btn btn-square btn-inverse-light btn-xs m-0">
                                                    <span class="font-13"> Clear all</span></a>
                                            </li>
                                            <li class="dropdown-body min-h-240 nicescroll">
                                                <ul class="scrollbar scroll_dark max-h-240">
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <div class="bg-type bg-type-md">
                                                                        <span>HY</span>
                                                                    </div>
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">New registered user</p>
                                                                    <small>Just now</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <div class="bg-type bg-type-md bg-success">
                                                                        <span>GM</span>
                                                                    </div>
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">New invoice received</p>
                                                                    <small>22 min</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <div class="bg-type bg-type-md bg-danger">
                                                                        <span>FR</span>
                                                                    </div>
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Server error report</p>
                                                                    <small>7 min</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <div class="bg-type bg-type-md bg-info">
                                                                        <span>HT</span>
                                                                    </div>
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Database report</p>
                                                                    <small>1 day</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <div class="bg-type bg-type-md">
                                                                        <span>DE</span>
                                                                    </div>
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Order confirmation</p>
                                                                    <small>2 day</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-footer">
                                                <a class="font-13" href="javascript:void(0)"> View All Notifications
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link search" href="javascript:void(0)">
                                        <i class="ti ti-search"></i>
                                    </a>
                                    <div class="search-wrapper">
                                        <div class="close-btn">
                                            <i class="ti ti-close"></i>
                                        </div>
                                        <div class="search-content">
                                            <form>
                                                <div class="form-group">
                                                    <i class="ti ti-search magnifier"></i>
                                                    <input type="text" class="form-control autocomplete" placeholder="Search Here" id="autocomplete-ajax" autofocus="autofocus">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li> --}}
                                <li class="nav-item dropdown user-profile">
                                    <a href="javascript:void(0)" class="nav-link dropdown-toggle " id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ asset('dashboard/assets/img/avtar/02.jpg') }}" alt="avtar-img">
                                        <span class="bg-success user-status"></span>
                                    </a>
                                    <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                                        <div class="bg-gradient px-4 py-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="mr-1">
                                                   @if(Auth::user()->badge_verification_status == 2)
                                                    <h4 class="text-white mb-0">{{Auth::user()->name}} <i class="fa fa-check" style="font-size:18px" aria-hidden="true"></i></h4>
                                                    @else
                                                    <h4 class="text-white mb-0">{{Auth::user()->name}}</h4>
                                                    @endif
                                                    <small class="text-white">{{Auth::user()->email}}</small>
                                                </div>
                                                <a href="{{ route('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="text-white font-20 tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"> <i
                                                                class="zmdi zmdi-power"></i>
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>

                                        <div class="p-4 d-none">
                                            <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                                                <i class="fa fa-user pr-2 text-success"></i> Profile</a>
                                            <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                                                <i class="fa fa-envelope pr-2 text-primary"></i> Inbox
                                                <span class="badge badge-primary ml-auto">6</span>
                                            </a>
                                            <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                                                <i class=" ti ti-settings pr-2 text-info"></i> Settings
                                            </a>
                                            <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                                                <i class="fa fa-compass pr-2 text-warning"></i> Need help?</a>
                                            <div class="row mt-2">
                                                <div class="col">
                                                    <a class="bg-light p-3 text-center d-block" href="#">
                                                        <i class="fe fe-mail font-20 text-primary"></i>
                                                        <span class="d-block font-13 mt-2">My messages</span>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="bg-light p-3 text-center d-block" href="#">
                                                        <i class="fe fe-plus font-20 text-primary"></i>
                                                        <span class="d-block font-13 mt-2">Compose new</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end navigation -->
                </nav>
                <!-- end navbar -->
            </header>
            <!-- end app-header -->
            <!-- begin app-container -->
            <div class="app-container">
                <!-- begin app-nabar -->
                <div class="sidebar" data-color="orange">
                    <!-- begin sidebar-nav -->
                    <div class="sidebar-wrapper" id="sidebar-wrapper">
                        <ul class="nav">
                            <li class="active">
                                <a href="/home" aria-expanded="false">
                                   <i class="now-ui-icons design_app"></i>
                                    <span class="nav-title">Dashboards</span>
                                </a>
                            </li>

                            @if(Auth::user()->usertype == "admin")
                            <li><a href="/suppliers" aria-expanded="false"><i class="nav-icon ti ti-user"></i><span class="nav-title">Suppliers</span></a> </li>
                            <li><a href="/buyyers" aria-expanded="false"><i class="nav-icon ti ti-user"></i><span class="nav-title">Buyers</span></a> </li>
                            <li><a href="/companies" aria-expanded="false"><i class="nav-icon ti ti-user"></i><span class="nav-title">Companies</span></a> </li>

                            <li><a href="/country" aria-expanded="false"><i class="nav-icon ti ti-flag-alt-2"></i><span class="nav-title">Country</span></a> </li>
                            <li><a href="/city" aria-expanded="false"><i class="nav-icon ti ti-bar-chart-alt"></i><span class="nav-title">City</span></a> </li>
                            <li><a href="/add-package-price" aria-expanded="false"><i class="nav-icon ti ti-package"></i><span class="nav-title">Adds Packages Price</span></a> </li>
                            <li><a href="/products-category" aria-expanded="false"><i class="nav-icon ti ti-shopping-cart"></i><span class="nav-title">Products Categories</span></a> </li>
                            <li><a href="/products-sub-category" aria-expanded="false"><i class="nav-icon ti ti-shopping-cart-full"></i><span class="nav-title">Products Sub Categories</span></a> </li>
                            <li><a href="/colors" aria-expanded="false"><i class="nav-icon ti ti-paint-bucket"></i><span class="nav-title">Product Colors</span></a> </li>
                            <li><a href="/all-products" aria-expanded="false"><i class="nav-icon ti ti-layout"></i><span class="nav-title">Products</span></a> </li>
                            <li><a href="{{ route('admin.wallet') }}" aria-expanded="false"><i class="nav-icon ti ti-wallet"></i><span class="nav-title">Wallet</span></a> </li>
                            <li><a href="{{route('admin_auctions')}}" aria-expanded="false"><i class="nav-icon ti ti-control-shuffle"></i><span class="nav-title">Products Auctions</span></a> </li>
                            <li><a href="{{route('admin_product_adds')}}" aria-expanded="false"><i class="nav-icon ti ti-plus"></i><span class="nav-title">Products Adds</span></a> </li>
                            <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-angle-double-right"></i><span class="nav-title">Website Frontend</span></a>
                                <ul aria-expanded="false">
                                    <li> <a href='/frontend-slider'>Sliders</a> </li>
                                    <li> <a href="{{route('add-show')}}">Addvertisement</a> </li>
                                    {{-- <li> <a href='calendar-list.html'>Calendar List</a> </li> --}}
                                </ul>
                            </li>
                            <li><a href="{{route('all-bids')}}" aria-expanded="false"><i class="nav-icon ti ti-angle-right"></i><span class="nav-title">Bids</span></a> </li>
                            <li><a href="{{route('user.setting')}}" aria-expanded="false"><i class="nav-icon ti ti-settings"></i><span class="nav-title">Setting</span></a> </li>
                            <li><a href="{{route('orders')}}" aria-expanded="false"><i class="nav-icon ti ti-shopping-cart"></i><span class="nav-title">Orders</span></a> </li>
                            <li><a href="{{route('pending-orders')}}" aria-expanded="false"><i class="nav-icon ti ti-shopping-cart"></i><span class="nav-title">Pending Orders</span></a> </li>
                            <li><a href="{{route('withdraw-customer')}}" aria-expanded="false"><i class="nav-icon ti ti-bag"></i><span class="nav-title">Customer Withdraw Request</span></a> </li>
                            <li><a href="{{route('withdraw-seller')}}" aria-expanded="false"><i class="nav-icon ti ti-bag"></i><span class="nav-title">Seller Withdraw Request</span></a> </li>
                            <li><a href="{{route('admin_support')}}" aria-expanded="false"><i class="nav-icon ti ti-headphone-alt"></i><span class="nav-title">Support</span></a> </li>

                            @endif



                            @if(Auth::user()->usertype == "user")
                            <li><a href="/products" aria-expanded="false"><i class="nav-icon ti ti-layout"></i><span class="nav-title">Products</span></a> </li>
                            <li><a href="/product-add" aria-expanded="false"><i class="nav-icon ti ti-package"></i><span class="nav-title">Publish Product</span></a></li>
                            <li><a href="/product-auction" aria-expanded="false"><i class="nav-icon ti ti-control-shuffle"></i><span class="nav-title">Auctions</span></a> </li>
                            <li><a href="/Advertisement" aria-expanded="false"><i class="nav-icon ti ti-desktop"></i><span class="nav-title">Advertisement</span></a> </li>
                            <li><a href="/wallet" aria-expanded="false"><i class="nav-icon ti ti-wallet"></i><span class="nav-title">Wallet</span></a> </li>
                            <li><a href="{{route('pending-bids')}}" aria-expanded="false"><i class="nav-icon ti ti-angle-right"></i><span class="nav-title">Pending Bids</span></a></li>
                            <li><a href="{{route('accepted-bids')}}" aria-expanded="false"><i class="nav-icon ti ti-angle-double-right"></i><span class="nav-title">Approved Bids</span></a></li>
                            <li><a href="{{route('rejected-bids')}}" aria-expanded="false"><i class="nav-icon ti ti-angle-double-left"></i><span class="nav-title">Rejected Bids</span></a></li>
                            <li><a href="{{route('user.setting')}}" aria-expanded="false"><i class="nav-icon ti ti-settings"></i><span class="nav-title">Setting</span></a> </li>
                            <li><a href="{{route('orders')}}" aria-expanded="false"><i class="nav-icon ti ti-layout-accordion-list"></i><span class="nav-title">Orders</span></a> </li>
                             <li><a href="{{route('customer_request')}}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Customer Request <span class="notify"> @if(auth()->check())
                            {{getunread(auth()->id())}}
                            @else
                            0
                            @endif
                            </span>
                            </span></a> </li>@endif

                        </ul>
                    </div>
                    <!-- end sidebar-nav -->
                </div>
                <!-- end app-navbar -->
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                        @yield('content')
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
            <!-- begin footer -->
            <footer class="footer">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-left">
                        <p>&copy; Copyright 2021. All rights reserved.</p>
                    </div>
                   <div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">
                        <p><a target="_blank" href="http://az-solutions.pk/">Az-solutions</a></p>
                    </div>
                </div>
            </footer>
            <!-- end footer -->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->

    <!-- plugins -->
    <script src="{{ asset('dashboard/assets/js/vendors.js') }}"></script>

    <!-- custom app -->
    <script src="{{ asset('dashboard/assets/js/app.js') }}"></script>

    <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
    <!-- <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script> -->
    <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets') }}/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets') }}/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
    <!-- boostrap js -->
    @yield('ckEditor')

</body>
</html>
