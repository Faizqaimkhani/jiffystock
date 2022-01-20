@extends('new-layouts.app',['title' => 'Jiffystock - Shipment Companies ','top_bar' => 'hide'])

@section('content')
<!-- Page Breadcrumb -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="page-title">
                    <h1>Shipment Companies</h1>
                </div>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shipment Companies</li>
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
                  <form action="{{ url('shipment-services') }}" method="get">

                    <div class="widget mb40">
                      <h5 class="widget-title">Search</h5>
                      <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search">
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
                      <h5 class="widget-title">Shipment Servicess</h5>
                        @if(count($shipment_services) > 0)
                          @foreach($shipment_services as $shipment)
                            <div class="col-lg-4">
                            <div class="item-card mb30">
                                <div class="item-image">
                                    <ul class="labels-list">
                                        <li><span class="tplabel">NEW</span></li>
                                    </ul>
                                    <ul class="color-list">
                                        <li style="background:#e7a202;"></li>
                                    </ul>
                                    <a href="{{ route('shipment_services.show',['company' => request('company'), 'id' => $shipment->id]) }}"><img class="product-image" src="{{ asset('images/shipment-default.png') }}" alt="" /></a>
                                </div>
                                <h4 class="item-title"><a href="{{ route('shipment_services.show',['company' => request('company'), 'id' => $shipment->id]) }}">{{ucwords($shipment->name)}}</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                <!-- <div class="product-btn">
                                    <a href="javascript:;" class="product-brand-btn btn btn-outline-primary rounded-pill text-center w-100">
                                        <span class="text-brand"><i class="bi bi-envelope-fill"></i>Chat with Supplier</span>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                          @endforeach
                          @else
                          <p class="text-brand">This Shipment Company have no services yet</p>
                        @endif

                        {{ $shipment_services->links() }}
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
