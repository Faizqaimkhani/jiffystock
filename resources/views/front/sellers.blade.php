@extends('new-layouts.app',['title' => 'Jiffystock - Suppliers ','top_bar' => 'hide'])

@section('content')
<!-- Page Breadcrumb -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="page-title">
                    <h1>Sellers</h1>
                </div>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sellers</li>
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
                  <form action="{{ url('sellers') }}" method="get">

                    <div class="widget mb40">
                      <h5 class="widget-title">Search</h5>
                      <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search">
                    </div>
                    <div class="widget">
                      <h5 class="widget-title">Sort By Supplier</h5>
                      <select class="form-select form-select-sm"  name="supplier" id="supplier" value="{{ request('supplier') }}">
                          <option value="" selected="">Select by Suppliers</option>
                          <option value="top">Top Suppliers</option>
                          <option value="new">New Suppliers</option>
                      </select>
                    </div>
                    <div class="my-3"></div>

                    <div class="widget">
                        <button type="submit" class="btn bg-brand"><i class="bi bi-search"></i></button>
                    </div>
                  </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div id="tp_datalist">
                    <div class="row">
                      @if(count($premium_sellers) > 0)
                      <h5 class="widget-title">Advertised Sellers</h5>
                          @foreach($premium_sellers as $seller)
                            <div class="col-lg-4">
                            <div class="item-card mb30">
                                <div class="item-image">
                                    <ul class="labels-list">
                                        <!-- <li><span class="tplabel">NEW</span></li> -->
                                    </ul>

                                    <ul class="color-list">
                                        <li style="background:#e7a202;"></li>
                                    </ul>
                                    <a href="{{ url('seller/profile/'.$seller->id) }}"><img class="product-image" src="{{ asset('images/default-avatar.png') }}" alt="" /></a>
                                </div>
                                <h4 class="item-title"><a href="{{ url('seller/profile/'.$seller->id) }}">{{ucwords($seller->name)}}</a></h4>
                                <div class="brand">
                                    <a href="{{ url('seller/profile/'.$seller->id) }}">
                                        <span class="product-country-flag">
                                            {{ flag(getCountryCode($seller->countries->name)) }}
                                        </span>
                                        <span class="text-dark">
                                            {{$seller->countries->name}}
                                        </span>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                          @endforeach
                        @endif


                    </div>
                    <div class="row">
                      <h5 class="widget-title">Sellers</h5>
                        @if(count($sellers) > 0)
                          @foreach($sellers as $seller)
                            <div class="col-lg-4">
                            <div class="item-card mb30">
                                <div class="item-image">
                                    <ul class="labels-list">
                                        <!-- <li><span class="tplabel">NEW</span></li> -->
                                    </ul>

                                    <ul class="color-list">
                                        <li style="background:#e7a202;"></li>
                                    </ul>
                                    <a href="{{ url('seller/profile/'.$seller->id) }}"><img class="product-image" src="{{ asset('images/default-avatar.png') }}" alt="" /></a>
                                </div>
                                <h4 class="item-title"><a href="{{ url('seller/profile/'.$seller->id) }}">{{ucwords($seller->name)}}</a></h4>
                                <div class="brand">
                                    <a href="{{ url('seller/profile/'.$seller->id) }}">
                                        <span class="product-country-flag">
                                            {{ flag(getCountryCode($seller->countries->name)) }}
                                        </span>
                                        <span class="text-dark">
                                            {{$seller->countries->name}}
                                        </span>
                                    </a>
                                </div>

                            </div>
                        </div>
                          @endforeach
                        @endif

                        {{ $sellers->links() }}
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
