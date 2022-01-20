@extends('new-layouts.app',['title' => 'Jiffystock - Clearance Agencies ','top_bar' => 'hide'])

@section('content')
<!-- Page Breadcrumb -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="page-title">
                    <h1>Clearance Agencies</h1>
                </div>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Clearance Agencies</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- /Page Breadcrumb/ -->

<!-- Category Page -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar mb20">
                  <form action="{{ url('clearance-agencies') }}" method="get">

                    <div class="widget mb40">
                      <h5 class="widget-title">Search</h5>
                      <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search">
                    </div>
                    <div class="widget mb40">
                      <h5 class="widget-title">Sort By Clearance</h5>
                      <select class="form-select form-select-sm"  name="clearance" id="clearance" value="{{ request('clearance') }}">
                          <option value="" selected="">Select by Clearance Companies</option>
                          <option value="most">Most Services</option>
                          <option value="new">New Clearances</option>
                      </select>
                    </div>
                    <div class="widget mb40">
                      <h5 class="widget-title">Sort By Country</h5>
                      <select class="form-select form-select-sm"  name="country" id="country" value="{{ request('country') }}">
                          <option value="" selected="">Sort by Country</option>
                          @foreach($countries as $country)
                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="widget">
                        <button type="submit" class="btn bg-brand"><i class="bi bi-search"></i></button>
                    </div>
                  </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div id="tp_datalist">
                    <div class="row">
                      @if(count($premium_clearance_agencies) > 0)
                      <h5 class="widget-title">Advertised Clearance Agencies</h5>
                          @foreach($premium_clearance_agencies as $clearance)
                            <div class="col-lg-4">
                            <div class="item-card mb30">
                                <div class="item-image">
                                    <ul class="labels-list">
                                        <li><span class="tplabel">NEW</span></li>
                                    </ul>

                                    <ul class="color-list">
                                        <li style="background:#e7a202;"></li>
                                    </ul>
                                    <a href="{{ route('clearance_services',$clearance->id) }}">
                                      <img class="product-image" src="{{ asset('images/clearance-default.png') }}" alt="" />
                                    </a>
                                </div>
                                <h4 class="item-title"><a href="{{ route('clearance_services',$clearance->id) }}">{{ucwords($clearance->name)}}</a></h4>
                                <div class="brand">
                                    <a href="{{ route('clearance_services',$clearance->id) }}">
                                        <span class="product-country-flag">
                                            {{ flag(getCountryCode($clearance->countries->name)) }}
                                        </span>
                                        <span class="text-dark">
                                            {{$clearance->countries->name}}
                                        </span>
                                    </a>
                                </div>

                            </div>
                        </div>
                          @endforeach
                        @endif


                    </div>
                    <div class="row">
                      <h5 class="widget-title">Clearance Agencies</h5>
                        @if(count($clearance_agencies) > 0)
                          @foreach($clearance_agencies as $clearance)
                            <div class="col-lg-4">
                            <div class="item-card mb30">
                                <div class="item-image">
                                    <ul class="labels-list">
                                        <li>
                                          <span class="tplabel">NEW</span>
                                        </li>
                                    </ul>
                                    <ul class="color-list">
                                        <li style="background:#e7a202;"></li>
                                    </ul>
                                    <a href="{{ route('clearance_services',$clearance->id) }}"><img class="product-image" src="{{ asset('images/clearance-default.png') }}" alt="" /></a>
                                </div>
                                <h4 class="item-title"><a href="{{ route('clearance_services',$clearance->id) }}">{{ucwords($clearance->name)}}</a></h4>
                                <div class="brand">
                                    <a href="{{ route('clearance_services',$clearance->id) }}">
                                        <span class="product-country-flag">
                                            {{ flag(getCountryCode($clearance->countries->name)) }}
                                        </span>
                                        <span class="text-dark">
                                            {{$clearance->countries->name}}
                                        </span>
                                    </a>
                                </div>
                                <!-- <div class="product-btn">
                                    <a href="javascript:;" class="product-brand-btn btn btn-outline-primary rounded-pill text-center w-100">
                                        <span class="text-brand"><i class="bi bi-envelope-fill"></i>Chat with Supplier</span>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                          @endforeach
                        @endif

                        {{ $clearance_agencies->links() }}
                    </div>
                    <div class="row mt-15">
                        <div class="col-lg-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Category Page/ -->
@endsection
