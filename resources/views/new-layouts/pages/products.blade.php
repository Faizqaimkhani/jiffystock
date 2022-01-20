@extends('new-layouts.app',['title' => 'Jiffystock - Search Products ','top_bar' => 'hide'])

@section('content')
<!-- Page Breadcrumb -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="page-title">
                    <h1>{{ request('s') ? 'Search Records For '.request('s') : 'Search Records'   }}</h1>
                </div>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ request('s') ? 'Search Records For '.request('s') : 'Search Records'   }}</li>
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
                  <form action="{{ url('search') }}" method="get">
                    <div class="widget mt40">
                        <h5 class="widget-title">Filter by Category</h5>
                        <div class="checkboxlist">
                            <ul class="checkbox-list">
                                @foreach($nav as $cat)
                                <li>
                                    <label class="checkbox-title">
                                        <input type="checkbox" class="filter_by_category" name="category" id="filter_by_category_14" value="{{ $cat->name }}"> {{ $cat->name }}
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="widget mb40">
                      <h5 class="widget-title">Min Price</h5>
                      <input type="number" placeholder="Min Price" name="min_price" class="form-control" value="{{ request('min_price') }}">
                    </div>
                    <div class="widget mb40">
                      <h5 class="widget-title">Max Price</h5>
                      <input type="number" placeholder="Max Price" name="max_price" class="form-control" value="{{ request('max_price') }}">
                    </div>
                    <!-- <div class="widget mb40">
                      <h5 class="widget-title">Sort By Supplier</h5>
                      <select class="form-select form-select-sm"  name="supplier" id="supplier" value="{{ request('supplier') }}">
                          <option value="" selected="">Select by Suppliers</option>
                          <option value="0">Top Suppliers</option>
                          <option value="1">New Suppliers</option>
                      </select>
                    </div> -->

                    <div class="widget mb40">
                      <h5 class="widget-title">Sort By Countries</h5>
                      <select name="country" id="country" value="{{ request('country') }}" class="form-select form-select-sm">
                          <option value="" disabled hidden selected="">Search by Country</option>
                          @foreach($countries as $country)
                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="widget mb40">
                        <button type="submit" class="btn bg-brand"><i class="bi bi-search"></i></button>
                    </div>
                  </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div id="tp_datalist">
                    <div class="row">
                            @if(count($products) < 1)
                             <h5>No Products Found</h5>
                            @endif
                            @foreach ($products as $item)
                            @if($item->user)
                            <div class="col-lg-4">
                                <div class="item-card mb30">
                                    <div class="item-image">
                                        <ul class="labels-list">
                                            <!-- <li><span class="tplabel">NEW</span></li> -->
                                        </ul>
                                        <ul class="product-action">
                                            <!-- <li><a href="/product-details/{{$item->id}}"><i class="bi bi-cart"></i></a></li> -->
                                            <li><a href="/product-details/{{$item->id}}"><i class="bi bi-zoom-in"></i></a></li>
                                            <li><a class="addtowishlist" data-id="47" href="javascript:void(0);"><i class="bi bi-heart"></i></a></li>
                                        </ul>
                                        <ul class="color-list">
                                            <li style="background:#e7a202;"></li>
                                        </ul>
                                        <a href="/product-details/{{$item->id}}"><img class="product-image" src="{{ asset('storage/uploads/Products-Images/' . $item->image1) }}" alt="" /></a>
                                    </div>
                                    <h4 class="item-title"><a href="/product-details/{{$item->id}}">{{ucwords($item->name)}}</a></h4>
                                    <div class="brand">
                                        <a href="/product-details/{{$item->id}}">
                                            <span class="product-country-flag">
                                                {{ flag(getCountryCode($item->user->countries->name)) }}
                                            </span>
                                            <span class="text-dark">
                                                {{$item->user->countries->name}}
                                            </span>
                                        </a>
                                        <p class="text-brand pr-2">Stock : {{$item->stock_quantity}}</p>
                                    </div>
                                    <p class="text-secondary font-weight-bold">Stock Location : {{ $item->stock_location }}</p>
                                    <div class="item-price-card">
                                        <div class="item-price"><span class="text-brand product-price">{{currentCurrency($item->price)}} / </span><span class="text-secondary">{{$item->unit}}</span></div>
                                    </div>
                                    <div class="product-btn">
                                      <form action="{{ route('chat.supplier') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <button type="submit" class="product-brand-btn btn btn-outline-primary rounded-pill text-center w-100 text-brand" data-id="39" data-stockqty="600">Chat With Supplier</button>
                                      </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            {{ $products->links() }}
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
