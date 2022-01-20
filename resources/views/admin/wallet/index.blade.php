@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'admin_wallet','namePage' => 'Jiffystock Wallet Management'])

@section('content')
<!-- begin container-fluid -->
<div class="panel-header panel-header-sm">
</div>
@if (session()->has('message'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <span>{{ session()->get('message') }}</span>
</div>
<br>
@endif
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <span>{{ session()->get('error') }}</span>
</div>
<br>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="p-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="my-input">My Wallet</label>
                            <h2>{{auth('web')->user()->admin_wallet ? auth('web')->user()->admin_wallet->price : 0 }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="my-input">Deposit</label>
                            <h3>{{ auth('web')->user()->admin_wallet ? auth('web')->user()->admin_wallet->deposit : 0 }}</h3>
                            <div class="mt-3">
                                {{-- <a href="#" class="btn-lg btn-danger">Deposit</a> --}}
                                <!-- <button data-toggle="modal" data-target="#depositModal" class="btn"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 172 172" style=" fill:#000000;">
                                        <defs>
                                            <linearGradient x1="73.01042" y1="39.63525" x2="103.01367" y2="146.72317" gradientUnits="userSpaceOnUse" id="color-1_vArWbbq0EbTM_gr1">
                                                <stop offset="0" stop-color="#00b3ee"></stop>
                                                <stop offset="1" stop-color="#0082d8"></stop>
                                            </linearGradient>
                                        </defs>
                                        <g transform="translate(-0.86,-0.86) scale(1.01,1.01)">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                <g>
                                                    <path d="M154.53125,32.25h-137.0625c-5.69033,0 -10.30208,4.61175 -10.30208,10.30208v86.89583c0,5.69033 4.61175,10.30208 10.30208,10.30208h137.0625c5.69033,0 10.30208,-4.61175 10.30208,-10.30208v-86.89583c0,-5.69033 -4.61175,-10.30208 -10.30208,-10.30208z" fill="url(#color-1_vArWbbq0EbTM_gr1)"></path>
                                                    <path d="M150.12017,89.59408c0.1935,-0.85283 0.215,-2.95983 0.215,-3.827c0,-5.17075 -1.1825,-9.37042 -3.55108,-12.53092c-2.61225,-3.37192 -6.5145,-5.15283 -11.2875,-5.15283c-5.45742,0 -9.81475,2.3005 -12.55242,6.30308c-0.41925,-0.87075 -0.903,-1.66267 -1.45483,-2.36858c-2.236,-2.90967 -5.504,-4.44692 -9.44567,-4.44692c-1.53008,0 -2.99567,0.2795 -4.39317,0.83492l-0.05375,-0.29383h-11.51325c0.61992,-1.161 0.97108,-2.49042 0.97108,-3.89867c0,-4.58308 -3.698,-8.31333 -8.24167,-8.31333c-4.59025,0 -8.32408,3.73025 -8.32408,8.31333c0,1.2685 0.29025,2.4725 0.80267,3.5475c-1.3115,-0.11108 -2.51192,0.03583 -3.62992,0.35833h-8.97267v-0.01075h-6.38192v-8.69317l-14.33692,2.3865l-1.10367,6.7725l-2.69108,0.44075l-0.086,0.5375c-2.107,-0.78117 -4.96292,-1.46917 -8.471,-1.46917c-3.83775,0 -7.12725,1.06067 -9.46717,3.02075c-2.75558,2.21808 -4.20683,5.3965 -4.20683,9.18767c0,2.39367 0.54467,4.31075 1.45483,5.86592l-2.08908,13.72775l2.16433,1.21475c2.32917,1.29717 6.75817,2.8165 11.59925,2.8165c4.04917,0 7.44258,-1.03558 9.70008,-2.90608c0.97108,-0.73458 2.02458,-1.78808 2.86667,-3.25725c0.645,1.38675 1.54083,2.5585 2.6875,3.5045c2.15358,1.71642 5.04175,2.54775 8.83292,2.54775c1.74867,0 3.08167,-0.18992 4.09217,-0.40133v0.51242h16.0605v-20.56475c0.31533,-0.06808 0.78117,-0.10392 1.40825,-0.1075v20.67225h12.44492v11.40217l16.039,-2.69108l0.05375,-8.82575c0.16483,0.00358 0.33325,0.00717 0.4945,0.00717c2.98492,0 7.25983,-0.77758 10.65325,-4.48275c0.69158,-0.75608 1.30792,-1.59817 1.84183,-2.52625c0.64858,1.09292 1.419,2.064 2.31483,2.91325c2.88817,2.78783 6.89433,4.20325 11.90742,4.20325c4.40392,0 8.56058,-1.07142 11.39858,-2.93475l1.935,-1.27208l-1.161,-7.31358h0.84567zM63.253,81.88275v7.08783l-0.49808,0.1505c-0.10392,0.03225 -0.26875,0.07167 -0.45508,0.1075v-7.34583zM46.39342,83.56692c-0.01075,-0.01075 -0.01792,-0.0215 -0.02867,-0.03225l0.02867,-0.17558z" fill="#000000" opacity="0.05"></path>
                                                    <path d="M145.36508,74.32908c-2.2575,-2.91325 -5.67242,-4.45408 -9.8685,-4.45408c-6.26725,0 -10.89333,3.47225 -12.88208,9.25575c-0.4945,-2.46533 -1.34375,-4.47917 -2.54058,-6.02c-1.90992,-2.48683 -4.61175,-3.75175 -8.03025,-3.75175c-2.06758,0 -3.95958,0.57692 -5.72617,1.74867l-0.21858,-1.20758h-11.14058h-3.03508c1.98875,-1.11083 3.33608,-3.24292 3.33608,-5.69033c0,-3.59767 -2.89533,-6.52167 -6.45,-6.52167c-3.60125,0 -6.53242,2.924 -6.53242,6.52167c0,2.44742 1.36525,4.5795 3.37908,5.69033h-2.54417l-0.54108,-0.12183c-0.80267,-0.17917 -1.46558,-0.26158 -2.08192,-0.26158c-1.59458,0 -3.04225,0.42283 -4.22833,1.19683l-0.13258,-0.80625h-9.56392v-0.01075h-6.05583v-8.36708l-10.98292,1.8275l-1.10725,6.7725l-2.6875,0.44433l-0.24725,1.53725l-0.33325,-0.16483c-1.60175,-0.774 -4.9665,-2.07117 -9.53167,-2.07117c-3.41133,0 -6.30308,0.91375 -8.342,2.61942c-2.31483,1.86692 -3.54033,4.56158 -3.54033,7.79733c0,6.20992 4.3,8.61433 8.94758,10.29133c2.32558,0.83492 2.838,1.28283 3.00642,1.28283c0.02508,0 0.45508,0.1935 -1.11442,0.1935c-1.90633,0 -5.24958,-1.02483 -7.44975,-2.28258l-2.26825,-1.29717l-1.58742,10.449l1.08217,0.60558c2.13567,1.19325 6.22425,2.59075 10.72133,2.59075c3.62992,0 6.62917,-0.89225 8.61792,-2.537c2.47608,-1.88125 3.73025,-4.65833 3.73025,-8.24883c0.00717,-6.33533 -4.35375,-8.75408 -9.073,-10.4275c-1.161,-0.43717 -1.8705,-0.75608 -2.29333,-0.95675c1.88483,0.00358 4.28567,0.65933 6.42133,1.75225l2.18583,1.118l0.44792,-2.71975h3.0745v11.18358c0,3.89508 1.08575,6.76892 3.25725,8.56417c1.849,1.46917 4.30358,2.15717 7.7185,2.15717c2.58717,0 4.18175,-0.45508 5.1385,-0.72742l0.74533,-0.21142v1.0535h12.47717v-19.88392c0.53392,-0.44433 1.38675,-0.79192 3.08883,-0.79192c0.37267,-0.00358 0.774,-0.00358 1.32225,0.07525l0.5805,0.07883v20.52175h12.44492v11.07608l12.46642,-2.08908l0.05733,-9.288c0.77758,0.12542 1.54442,0.1935 2.27542,0.1935c2.62658,0 6.37833,-0.67367 9.331,-3.90225c1.43333,-1.5695 2.49042,-3.57258 3.1605,-6.00208c0.688,2.60508 1.87767,4.71567 3.55825,6.31383c2.54417,2.45458 6.13467,3.698 10.66758,3.698c4.0635,0 7.86183,-0.96392 10.41675,-2.64092l0.9675,-0.63783l-1.30792,-8.24525h1.51217l0.31175,-1.40108c0.16842,-0.74533 0.16842,-3.32892 0.16842,-3.43642c-0.00358,-4.76942 -1.06425,-8.61433 -3.17842,-11.43442zM65.04467,90.28925l-1.763,0.54108c-0.36908,0.11108 -1.42258,0.33325 -2.03892,0.33325c-0.42283,0 -0.55183,-0.08242 -0.55183,-0.08242c0,-0.00358 -0.18275,-0.22217 -0.18275,-1.08217v-9.9115h2.84517v-1.62683l1.69133,0.13975zM110.65692,85.19733c0.01075,2.92758 -0.49808,4.56158 -0.93525,5.42875c-0.61275,1.02125 -1.43333,1.23267 -2.22883,1.11083v-11.23375c0.90658,-0.73817 1.55158,-0.74892 1.58383,-0.74892c1.16458,0 1.58025,2.80933 1.58025,5.44308zM137.43517,91.977c-1.20758,0 -2.04967,-0.21858 -2.59075,-0.68083c-0.20425,-0.172 -0.37983,-0.40133 -0.52317,-0.69158h9.3095c-1.85258,0.91017 -3.9345,1.37242 -6.19558,1.37242zM134.03458,81.61758c0.258,-1.45842 0.69875,-2.19658 1.31867,-2.19658c0.688,0 1.03558,1.10725 1.21117,2.19658z" fill="#000000" opacity="0.07"></path>
                                                    <path d="M132.03508,83.40925c0.24725,-3.94525 1.2685,-5.77992 3.31817,-5.77992c1.96367,0 3.03867,1.88842 3.17483,5.77992zM146.74825,85.76708c0,-4.4075 -0.9675,-7.89408 -2.79858,-10.33792c-1.935,-2.49758 -4.82317,-3.7625 -8.45308,-3.7625c-7.482,0 -12.169,5.53983 -12.169,14.41217c0,4.95933 1.23625,8.69675 3.7195,11.05458c2.21092,2.13208 5.38575,3.19992 9.42417,3.19992c3.75175,0 7.22758,-0.89942 9.43133,-2.34708l-0.96033,-6.04867c-2.17508,1.18608 -4.69417,1.83108 -7.50708,1.83108c-1.68417,0 -2.88817,-0.36908 -3.741,-1.10367c-0.93883,-0.78475 -1.462,-2.04967 -1.64833,-3.85567h14.577c0.09317,-0.41208 0.12542,-2.4295 0.12542,-3.04225zM111.28758,91.49325c-0.79192,1.35092 -1.90275,2.07833 -3.18917,2.07833c-0.86358,0 -1.69133,-0.18992 -2.39725,-0.52675v-13.32283c1.53367,-1.58025 2.91683,-1.75942 3.3755,-1.75942c2.26108,0 3.37192,2.44025 3.37192,7.22758c0.01075,2.72333 -0.40133,4.84467 -1.161,6.30308zM118.65492,74.20725c-1.5695,-2.04608 -3.79475,-3.05658 -6.61125,-3.05658c-2.55133,0 -4.81242,1.08217 -6.93017,3.354l-0.50883,-2.80933h-7.85467v39.388l8.89025,-1.49067l0.06092,-10.02975c1.38675,0.43358 2.79142,0.66292 4.05275,0.66292c2.24675,0 5.4825,-0.56258 8.00875,-3.31817c2.39008,-2.61583 3.569,-6.67217 3.569,-12.04358c0,-4.74792 -0.87792,-8.34917 -2.67675,-10.65683zM84.30508,71.69533h8.86158v28.638h-8.86158zM88.80933,68.91825c2.57283,0 4.65833,-2.1285 4.65833,-4.70492c0,-2.62658 -2.09267,-4.73 -4.65833,-4.73c-2.6445,0 -4.74075,2.10342 -4.74075,4.73c0,2.58 2.09625,4.70492 4.74075,4.70492zM80.49242,71.30833c-2.52625,0 -4.58308,1.333 -5.34275,3.69442l-0.5375,-3.30025h-7.77583v28.63083h8.89383v-18.8125c1.118,-1.36883 2.68392,-1.86333 4.8805,-1.86333c0.45508,0 0.91733,0 1.5695,0.09317v-8.22017c-0.65575,-0.14692 -1.19683,-0.22217 -1.68775,-0.22217zM63.35333,78.31375l1.10367,-6.622h-5.73692v-8.04458l-7.62892,1.2685l-1.10725,6.77608l-2.68392,0.44075l-0.99258,6.18483h3.66933v12.97883c0,3.37192 0.85283,5.72975 2.58,7.1595c1.50858,1.20042 3.62275,1.76658 6.60408,1.76658c2.3435,0 3.73742,-0.40133 4.64758,-0.65933v-7.01975c-0.47658,0.14692 -1.72,0.41208 -2.56567,0.41208c-1.72,0 -2.52625,-0.89583 -2.52625,-2.95625v-11.69958h4.63683zM37.73608,82.59583c-2.53342,-0.94958 -4.00617,-1.69492 -4.00617,-2.87742c0,-0.98542 0.82058,-1.55517 2.31483,-1.55517c2.64092,0 5.40725,1.00692 7.24908,1.94933l1.075,-6.55392c-1.49783,-0.72383 -4.54725,-1.892 -8.7505,-1.892c-3.01,0 -5.50042,0.78833 -7.21683,2.22525c-1.90633,1.53725 -2.87383,3.73742 -2.87383,6.39983c0,4.82675 2.95267,6.87283 7.7615,8.60717c3.07092,1.10367 4.13517,1.88842 4.13517,3.11033c0,1.15383 -0.98183,1.84183 -2.84875,1.84183c-2.236,0 -5.88025,-1.11083 -8.33842,-2.51908l-1.0105,6.63992c2.064,1.15383 5.86233,2.36142 9.847,2.36142c3.17842,0 5.81217,-0.7525 7.53217,-2.1715c2.03533,-1.548 3.02433,-3.85925 3.02433,-6.82625c0.00717,-4.95575 -3.02075,-7.01617 -7.89408,-8.73975z" fill="#ffffff"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg></button> -->
                                <button onclick="paymentModal()" class="btn "><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 172 172" style=" fill:#000000;">
                                        <g transform="translate(1.72,1.72) scale(0.98,0.98)">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none" stroke="none"></path>
                                                <g stroke="none">
                                                    <g>
                                                        <rect x="1" y="1" transform="scale(2.6875,2.6875)" width="62" height="62" rx="6" ry="0" fill="#005699"></rect>
                                                        <path d="M153.1875,2.6875h-134.375c-8.90559,0 -16.125,7.21941 -16.125,16.125v26.875c0,32.65384 26.47116,59.125 59.125,59.125h48.375c32.65384,0 59.125,-26.47116 59.125,-59.125v-26.875c0,-8.90559 -7.21941,-16.125 -16.125,-16.125z" fill="#0178bc"></path>
                                                        <path d="M153.1875,2.6875h-134.375c-8.90559,0 -16.125,7.21941 -16.125,16.125v10.75c0,-8.90559 7.21941,-16.125 16.125,-16.125h134.375c8.90559,0 16.125,7.21941 16.125,16.125v-10.75c0,-8.90559 -7.21941,-16.125 -16.125,-16.125z" fill="#0291d5"></path>
                                                        <path d="M153.1875,158.5625h-134.375c-8.90559,0 -16.125,-7.21941 -16.125,-16.125v10.75c0,8.90559 7.21941,16.125 16.125,16.125h134.375c8.90559,0 16.125,-7.21941 16.125,-16.125v-10.75c0,8.90559 -7.21941,16.125 -16.125,16.125z" fill="#00457a"></path>
                                                        <path d="M61.30188,118.25l8.4925,-37.65187l0.08062,0.02687h18.8125c13.35839,0 24.1875,-10.82911 24.1875,-24.1875c13.35839,0 24.1875,10.82911 24.1875,24.1875c0,13.35839 -10.82911,24.1875 -24.1875,24.1875h-21.5l-10.75,34.9375h-24.1875z" fill="#add1e9"></path>
                                                        <path d="M83.85,56.4375h29.025c0,13.35839 -10.82911,24.1875 -24.1875,24.1875h-18.8125l-0.08062,-0.02688l3.57437,-15.77563c1.10524,-4.90075 5.45741,-8.38249 10.48125,-8.385z" fill="#e6eff6"></path>
                                                        <path d="M112.875,56.4375h-29.025c-5.02384,0.00251 -9.37601,3.48425 -10.48125,8.385l-3.57438,15.77563l-8.4925,37.65187h-26.36437l17.89875,-81.78062c0.53353,-2.46617 2.71741,-4.22447 5.24063,-4.21937h30.61063c13.3498,0.02072 24.16678,10.8377 24.1875,24.1875z" fill="#fdfef9"></path>
                                                        <path d="M36.70319,118.25l-1.76569,8.0625h24.53956l1.82481,-8.0625z" fill="#00457a"></path>
                                                        <path d="M112.875,104.8125h-21.5l-10.75,34.9375h-22.36269l-1.82481,8.0625h24.1875l10.75,-34.9375h21.5c7.13185,0.04101 13.91408,-3.08539 18.51498,-8.53486c4.60091,-5.44947 6.5459,-12.65987 5.30971,-19.68389c-1.96558,11.62856 -12.03118,20.1443 -23.82469,20.15625z" fill="#00457a"></path>
                                                    </g>
                                                </g>
                                                <path d="" fill="none" stroke="none"></path>
                                                <path d="" fill="none" stroke="none"></path>
                                            </g>
                                        </g>
                                    </svg></button>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="my-input">Withdraw</label>
                            <h3>{{isset($wallet->refunds)?$wallet->refunds:0}}</h3>
                            <div class="mt-3">
                                <button data-toggle="modal" data-target="#withdrawModal" class="btn btn-danger btn-lg">Withdraw</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="my-input">Sell Products</label>
                            <h3>{{isset($wallet->sell_products)?$wallet->sell_products:0}}</h3>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        @include('includes.user-paypal')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-body">
                <div>
                    <ul class="nav nav-pills" role="tablist">
                        <li role="presentation" class="nav-item  active text-light"><a class="nav-link" href="#pending" aria-controls="pending" role="tab" data-toggle="tab">Request</a></li>
                        <li role="presentation" class="nav-item"><a class="nav-link" href="#approved" aria-controls="approved" role="tab" data-toggle="tab">Approved</a></li>
                        <li role="presentation" class="nav-item"><a class="nav-link" href="#canceled" aria-controls="canceled" role="tab" data-toggle="tab">Canceled</a></li>

                    </ul>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div role="tabpanel" class="tab-pane active" id="pending">
                        <div class="datatable-wrapper table-responsive">
                            <table id="datatable" class="display compact table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 20% ">Name</th>
                                        <th style="width: 20% ">Email</th>
                                        <th style="width: 20% ">Amount</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Pendingrequests as $request)
                                    <tr>
                                        <td>{{ $request->user->name }}</td>
                                        <td>{{ $request->stripe_email }}</td>
                                        <td>{{ $request->price }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="approved">
                        <div class="datatable-wrapper table-responsive">
                            <table id="datatable" class="display compact table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 20% ">Name</th>
                                        <th style="width: 20% ">Email</th>
                                        <th style="width: 20% ">Amount</th>
                                        <!-- <th style="width: 20% ">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Approvedrequests as $request)
                                    <tr>
                                        <td>{{ $request->user->name }}</td>
                                        <td>{{ $request->stripe_email }}</td>
                                        <td>{{ $request->price }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="canceled">

                        <div class="datatable-wrapper table-responsive">
                            <table id="datatable" class="display compact table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 20% ">Name</th>
                                        <th style="width: 20% ">Email</th>
                                        <th style="width: 20% ">Amount</th>
                                        <!-- <th style="width: 20% ">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Cancelledrequest as $request)
                                    <tr>
                                        <td>{{ $request->user->name }}</td>
                                        <td>{{ $request->stripe_email }}</td>
                                        <td>{{ $request->price }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
</div>
<!-- end container-fluid -->

{{-- Deposit now modal --}}
<div class="modal fade" id="depositModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    {{-- <form action="{{route('submit-bid')}}" method="post"> --}}
    <form role="form" action="{{route('deposit-in-wallet')}}" method="post" class="validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Deposit Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class='form-row row'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>Name on Card</label> <input class='form-control' size='4' type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-xs-12 form-group card required'>
                            <label class='control-label'>Card Number</label> <input autocomplete='off' class='form-control card-num' size='20' type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                            <label class='control-label'>CVC</label>
                            <input autocomplete='off' class='form-control card-cvc' placeholder='e.g 415' size='4' type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Month</label> <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Year</label> <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-xs-12 col-md-12 form-group amount required'>
                            <label class='control-label'>Amount</label>
                            <input class='form-control deposit-amount' placeholder='Enter the amount that you want to deposit' min="50" type='number'>
                        </div>
                    </div>

                    {{-- <div class='form-row row'>
                            <div class='col-md-12 hide error form-group'>
                                <div class='alert-danger alert'>Fix the errors before you begin.</div>
                            </div>
                        </div> --}}

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div class="pull-left"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 172 172" style=" fill:#000000;">
                            <g transform="translate(0.516,0.516) scale(0.994,0.994)">
                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="none" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                    <g stroke="#cccccc" stroke-linejoin="round">
                                        <path d="M149.65792,136.16667h-127.31583c-6.43567,0 -11.59208,-4.90917 -11.59208,-11.29467v-81.055c0,-6.38908 5.15642,-11.567 11.59208,-11.567h127.31225c6.43567,0 11.59567,5.17792 11.59567,11.567v81.055c0,6.3855 -5.16,11.29467 -11.59208,11.29467z" fill="#03a9f4"></path>
                                        <path d="M138.52808,83.40925c-0.13617,-3.8915 -1.21117,-5.77992 -3.17483,-5.77992c-2.04967,0 -3.07092,1.83467 -3.31817,5.77992zM146.62283,88.80933h-14.577c0.18633,1.806 0.7095,3.07092 1.64833,3.85567c0.85283,0.73458 2.05683,1.10367 3.741,1.10367c2.81292,0 5.332,-0.645 7.50708,-1.83108l0.96033,6.04867c-2.20375,1.44767 -5.67958,2.34708 -9.43133,2.34708c-4.03842,0 -7.21325,-1.06783 -9.42417,-3.19992c-2.48325,-2.35783 -3.7195,-6.09525 -3.7195,-11.05458c0,-8.87233 4.687,-14.41217 12.169,-14.41217c3.62992,0 6.51808,1.26492 8.45308,3.7625c1.83108,2.44383 2.79858,5.93042 2.79858,10.33792c0,0.61275 -0.03225,2.63017 -0.12542,3.04225zM112.44858,85.19017c0,-4.78733 -1.11083,-7.22758 -3.37192,-7.22758c-0.45867,0 -1.84183,0.17917 -3.3755,1.75942v13.32283c0.70592,0.33683 1.53367,0.52675 2.39725,0.52675c1.28642,0 2.39725,-0.72742 3.18917,-2.07833c0.75967,-1.45842 1.17175,-3.57975 1.161,-6.30308zM121.33167,84.86408c0,5.37142 -1.17892,9.42775 -3.569,12.04358c-2.52625,2.75558 -5.762,3.31817 -8.00875,3.31817c-1.26133,0 -2.666,-0.22933 -4.05275,-0.66292l-0.06092,10.02975l-8.89025,1.49067v-39.388h7.85467l0.50883,2.80933c2.11775,-2.27183 4.37883,-3.354 6.93017,-3.354c2.8165,0 5.04175,1.0105 6.61125,3.05658c1.79883,2.30767 2.67675,5.90892 2.67675,10.65683zM84.30508,71.69533h8.86158v28.638h-8.86158zM84.06858,64.21333c0,-2.62658 2.09625,-4.73 4.74075,-4.73c2.56567,0 4.65833,2.10342 4.65833,4.73c0,2.57642 -2.0855,4.70492 -4.65833,4.70492c-2.6445,0 -4.74075,-2.12492 -4.74075,-4.70492zM82.18017,71.5305v8.22017c-0.65217,-0.09317 -1.11442,-0.09317 -1.5695,-0.09317c-2.19658,0 -3.7625,0.4945 -4.8805,1.86333v18.8125h-8.89383v-28.63083h7.77583l0.5375,3.30025c0.75967,-2.36142 2.8165,-3.69442 5.34275,-3.69442c0.49092,0 1.032,0.07525 1.68775,0.22217zM63.35333,78.29942h-4.63683v11.69958c0,2.06042 0.80625,2.95625 2.52625,2.95625c0.84567,0 2.08908,-0.26517 2.56567,-0.41208v7.01975c-0.91017,0.258 -2.30408,0.65933 -4.64758,0.65933c-2.98133,0 -5.0955,-0.56617 -6.60408,-1.76658c-1.72717,-1.42975 -2.58,-3.78758 -2.58,-7.1595v-12.97883h-3.66933l0.99258,-6.18483l2.68392,-0.44075l1.10725,-6.77608l7.62892,-1.2685v8.04458h5.73692l-1.10367,6.622zM37.73608,82.59583c4.87333,1.72358 7.90125,3.784 7.89408,8.73975c0,2.967 -0.989,5.27825 -3.02433,6.82625c-1.72,1.419 -4.35375,2.1715 -7.53217,2.1715c-3.98467,0 -7.783,-1.20758 -9.847,-2.36142l1.0105,-6.63992c2.45817,1.40825 6.10242,2.51908 8.33842,2.51908c1.86692,0 2.84875,-0.688 2.84875,-1.84183c0,-1.22192 -1.06425,-2.00667 -4.13517,-3.11033c-4.80883,-1.73433 -7.7615,-3.78042 -7.7615,-8.60717c0,-2.66242 0.9675,-4.86258 2.87383,-6.39983c1.71642,-1.43692 4.20683,-2.22525 7.21683,-2.22525c4.20325,0 7.25267,1.16817 8.7505,1.892l-1.075,6.55392c-1.84183,-0.94242 -4.60817,-1.94933 -7.24908,-1.94933c-1.49425,0 -2.31483,0.56975 -2.31483,1.55517c0,1.1825 1.47275,1.92783 4.00617,2.87742z" fill="#ffffff"></path>
                                    </g>
                                    <path d="M0,172v-172h172v172z" fill="none" stroke="none" stroke-linejoin="miter"></path>
                                    <g stroke="none" stroke-linejoin="miter">
                                        <path d="M149.65792,136.16667h-127.31583c-6.43567,0 -11.59208,-4.90917 -11.59208,-11.29467v-81.055c0,-6.38908 5.15642,-11.567 11.59208,-11.567h127.31225c6.43567,0 11.59567,5.17792 11.59567,11.567v81.055c0,6.3855 -5.16,11.29467 -11.59208,11.29467z" fill="#03a9f4"></path>
                                        <path d="M132.03508,83.40925c0.24725,-3.94525 1.2685,-5.77992 3.31817,-5.77992c1.96367,0 3.03867,1.88842 3.17483,5.77992zM146.74825,85.76708c0,-4.4075 -0.9675,-7.89408 -2.79858,-10.33792c-1.935,-2.49758 -4.82317,-3.7625 -8.45308,-3.7625c-7.482,0 -12.169,5.53983 -12.169,14.41217c0,4.95933 1.23625,8.69675 3.7195,11.05458c2.21092,2.13208 5.38575,3.19992 9.42417,3.19992c3.75175,0 7.22758,-0.89942 9.43133,-2.34708l-0.96033,-6.04867c-2.17508,1.18608 -4.69417,1.83108 -7.50708,1.83108c-1.68417,0 -2.88817,-0.36908 -3.741,-1.10367c-0.93883,-0.78475 -1.462,-2.04967 -1.64833,-3.85567h14.577c0.09317,-0.41208 0.12542,-2.4295 0.12542,-3.04225zM111.28758,91.49325c-0.79192,1.35092 -1.90275,2.07833 -3.18917,2.07833c-0.86358,0 -1.69133,-0.18992 -2.39725,-0.52675v-13.32283c1.53367,-1.58025 2.91683,-1.75942 3.3755,-1.75942c2.26108,0 3.37192,2.44025 3.37192,7.22758c0.01075,2.72333 -0.40133,4.84467 -1.161,6.30308zM118.65492,74.20725c-1.5695,-2.04608 -3.79475,-3.05658 -6.61125,-3.05658c-2.55133,0 -4.81242,1.08217 -6.93017,3.354l-0.50883,-2.80933h-7.85467v39.388l8.89025,-1.49067l0.06092,-10.02975c1.38675,0.43358 2.79142,0.66292 4.05275,0.66292c2.24675,0 5.4825,-0.56258 8.00875,-3.31817c2.39008,-2.61583 3.569,-6.67217 3.569,-12.04358c0,-4.74792 -0.87792,-8.34917 -2.67675,-10.65683zM84.30508,71.69533h8.86158v28.638h-8.86158zM88.80933,68.91825c2.57283,0 4.65833,-2.1285 4.65833,-4.70492c0,-2.62658 -2.09267,-4.73 -4.65833,-4.73c-2.6445,0 -4.74075,2.10342 -4.74075,4.73c0,2.58 2.09625,4.70492 4.74075,4.70492zM80.49242,71.30833c-2.52625,0 -4.58308,1.333 -5.34275,3.69442l-0.5375,-3.30025h-7.77583v28.63083h8.89383v-18.8125c1.118,-1.36883 2.68392,-1.86333 4.8805,-1.86333c0.45508,0 0.91733,0 1.5695,0.09317v-8.22017c-0.65575,-0.14692 -1.19683,-0.22217 -1.68775,-0.22217zM63.35333,78.31375l1.10367,-6.622h-5.73692v-8.04458l-7.62892,1.2685l-1.10725,6.77608l-2.68392,0.44075l-0.99258,6.18483h3.66933v12.97883c0,3.37192 0.85283,5.72975 2.58,7.1595c1.50858,1.20042 3.62275,1.76658 6.60408,1.76658c2.3435,0 3.73742,-0.40133 4.64758,-0.65933v-7.01975c-0.47658,0.14692 -1.72,0.41208 -2.56567,0.41208c-1.72,0 -2.52625,-0.89583 -2.52625,-2.95625v-11.69958h4.63683zM37.73608,82.59583c-2.53342,-0.94958 -4.00617,-1.69492 -4.00617,-2.87742c0,-0.98542 0.82058,-1.55517 2.31483,-1.55517c2.64092,0 5.40725,1.00692 7.24908,1.94933l1.075,-6.55392c-1.49783,-0.72383 -4.54725,-1.892 -8.7505,-1.892c-3.01,0 -5.50042,0.78833 -7.21683,2.22525c-1.90633,1.53725 -2.87383,3.73742 -2.87383,6.39983c0,4.82675 2.95267,6.87283 7.7615,8.60717c3.07092,1.10367 4.13517,1.88842 4.13517,3.11033c0,1.15383 -0.98183,1.84183 -2.84875,1.84183c-2.236,0 -5.88025,-1.11083 -8.33842,-2.51908l-1.0105,6.63992c2.064,1.15383 5.86233,2.36142 9.847,2.36142c3.17842,0 5.81217,-0.7525 7.53217,-2.1715c2.03533,-1.548 3.02433,-3.85925 3.02433,-6.82625c0.00717,-4.95575 -3.02075,-7.01617 -7.89408,-8.73975z" fill="#ffffff"></path>
                                    </g>
                                    <path d="" fill="none" stroke="none" stroke-linejoin="miter"></path>
                                </g>
                            </g>
                        </svg></div>
                    <div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


{{-- Withdraw now modal --}}
<div class="modal fade" id="withdrawModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form action="{{route('user-withdraw-request')}}" method="post">
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Withdraw Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="user_id" value="{{isset($wallet->user_id)?$wallet->user_id:''}}">
                    <input type="hidden" name="wallet_id" value="{{isset($wallet->id)?$wallet->id:''}}">
                    <input type="email" name="email" id="" class="form-control" placeholder="Enter Stripe Email" required>
                    <input type="number" name="price" id="" class="form-control" placeholder="Enter Amount" required>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Modal -->

<div class="modal fade" id="paypal_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deposit By Paypal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('make.payment')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="amount">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" name="Amount">
                    </div>

            </div>
            <div class="modal-footer d-flex justify-content-between">
                <div><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="64" height="64" viewBox="0 0 172 172" style=" fill:#000000;">
                        <g transform="translate(1.72,1.72) scale(0.98,0.98)">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none" stroke="none"></path>
                                <g stroke="none">
                                    <g>
                                        <rect x="1" y="1" transform="scale(2.6875,2.6875)" width="62" height="62" rx="6" ry="0" fill="#005699"></rect>
                                        <path d="M153.1875,2.6875h-134.375c-8.90559,0 -16.125,7.21941 -16.125,16.125v26.875c0,32.65384 26.47116,59.125 59.125,59.125h48.375c32.65384,0 59.125,-26.47116 59.125,-59.125v-26.875c0,-8.90559 -7.21941,-16.125 -16.125,-16.125z" fill="#0178bc"></path>
                                        <path d="M153.1875,2.6875h-134.375c-8.90559,0 -16.125,7.21941 -16.125,16.125v10.75c0,-8.90559 7.21941,-16.125 16.125,-16.125h134.375c8.90559,0 16.125,7.21941 16.125,16.125v-10.75c0,-8.90559 -7.21941,-16.125 -16.125,-16.125z" fill="#0291d5"></path>
                                        <path d="M153.1875,158.5625h-134.375c-8.90559,0 -16.125,-7.21941 -16.125,-16.125v10.75c0,8.90559 7.21941,16.125 16.125,16.125h134.375c8.90559,0 16.125,-7.21941 16.125,-16.125v-10.75c0,8.90559 -7.21941,16.125 -16.125,16.125z" fill="#00457a"></path>
                                        <path d="M61.30188,118.25l8.4925,-37.65187l0.08062,0.02687h18.8125c13.35839,0 24.1875,-10.82911 24.1875,-24.1875c13.35839,0 24.1875,10.82911 24.1875,24.1875c0,13.35839 -10.82911,24.1875 -24.1875,24.1875h-21.5l-10.75,34.9375h-24.1875z" fill="#add1e9"></path>
                                        <path d="M83.85,56.4375h29.025c0,13.35839 -10.82911,24.1875 -24.1875,24.1875h-18.8125l-0.08062,-0.02688l3.57437,-15.77563c1.10524,-4.90075 5.45741,-8.38249 10.48125,-8.385z" fill="#e6eff6"></path>
                                        <path d="M112.875,56.4375h-29.025c-5.02384,0.00251 -9.37601,3.48425 -10.48125,8.385l-3.57438,15.77563l-8.4925,37.65187h-26.36437l17.89875,-81.78062c0.53353,-2.46617 2.71741,-4.22447 5.24063,-4.21937h30.61063c13.3498,0.02072 24.16678,10.8377 24.1875,24.1875z" fill="#fdfef9"></path>
                                        <path d="M36.70319,118.25l-1.76569,8.0625h24.53956l1.82481,-8.0625z" fill="#00457a"></path>
                                        <path d="M112.875,104.8125h-21.5l-10.75,34.9375h-22.36269l-1.82481,8.0625h24.1875l10.75,-34.9375h21.5c7.13185,0.04101 13.91408,-3.08539 18.51498,-8.53486c4.60091,-5.44947 6.5459,-12.65987 5.30971,-19.68389c-1.96558,11.62856 -12.03118,20.1443 -23.82469,20.15625z" fill="#00457a"></path>
                                    </g>
                                </g>
                                <path d="" fill="none" stroke="none"></path>
                                <path d="" fill="none" stroke="none"></path>
                            </g>
                        </g>
                    </svg></div>
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">PAY</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    function paymentModal() {
        $('#paypal_modal').modal('show');
    }
    $(function() {
        var $form = $(".validation");
        $('form.validation').bind('submit', function(e) {
            var $form = $(".validation"),
                inputVal = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'input[type=number]', 'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputVal),
                $errorStatus = $form.find('div.error'),
                valid = true;
            $errorStatus.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorStatus.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-num').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val(),
                }, stripeHandleResponse);
            }

        });

        function stripeHandleResponse(status, response) {
            console.log(response);
            if (response.error) {
                toastr.error(response.error.message);

                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                var token = response['id'];
                var price = $(".deposit-amount").val();
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.append("<input type='hidden' name='price' value='" + price + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>

@endsection