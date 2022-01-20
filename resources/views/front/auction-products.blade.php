@extends('new-layouts.app',['title' => 'Jiffystock - Auction Products ','top_bar' => 'hide'])

@section('content')

<div class="breadcrumb-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="page-title">
                    <h1>Auction Products</h1>
                </div>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Auction Products</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar mb20">
                  <form action="{{ url('auction-products') }}" method="get">

                    <div class="widget mb40">
                      <h5 class="widget-title">Search</h5>
                      <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search">
                    </div>
                    <div class="widget">
                      <h5 class="widget-title">Sort By Products</h5>
                      <select class="form-select form-select-sm"  name="product" id="product" value="{{ request('product') }}">
                          <option value="" selected="">Select by Products</option>
                          <option value="less_time">Has Less Time</option>
                          <option value="new">New Products</option>
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
                      <h5 class="widget-title">Auction Products</h5>
                      @foreach($products as $item)

                      <div class="col-lg-4">
                        <div class="item-card mb30">
                          <div class="item-image">
                            <ul class="product-action">
                              <li><a href="/auction-product/{{$item->id}}"><i class="bi bi-zoom-in"></i></a></li>
                              <li><a class="addtowishlist" data-id="47" href="javascript:void(0);"><i class="bi bi-heart"></i></a></li>
                            </ul>
                            <ul class="color-list">
                              <li style="background:#e7a202;"></li>
                            </ul>
                            <a href="/auction-product/{{$item->id}}">
                              <div class="days-left text-brand" data-date="{{ $item->expire_at->format('Y/m/d h:i:s') }}"> </div>
                              <img class="product-image" src="{{ asset('storage/uploads/Products-Images/' . $item->product->image1) }}" alt="" />
                            </a>
                          </div>
                          <h4 class="item-title"><a href="/auction-product/{{$item->id}}">{{ucwords($item->product->name)}}</a></h4>
                          <div class="brand">
                            <a href="/auction-product/{{$item->id}}">
                              <span class="product-country-flag">
                                  {{ flag(getCountryCode($item->user->countries->name)) }}
                              </span>
                              <span class="text-dark">
                                 {{$item->user->countries->name}}
                              </span>
                            </a>
                            <p class="text-brand pr-2">Stock : {{$item->product->stock_quantity}}</p>
                          </div>

                          <p class="text-secondary font-weight-bold">Quantity Location : {{ $item->quantity }}</p>
                          <div class="item-price-card">
                            <div class="item-price"><span class="text-brand product-price">{{currentCurrency($item->min_bid)}} </div>
                          </div>
                          <div class="product-btn">
                            <a href="/auction-product/{{$item->id}}" class="product-auction-brand-btn btn btn-primary rounded-pill text-center w-100">
                              Bid Now
                            </a>
                          </div>
                          <div class="time-left">
                            <div class="time" data-format="H Hrs" data-time="{{ $item->expire_at->format('Y/m/d h:i:s') }}"></div>
                            <div class="time" data-format="M Mins" data-time="{{ $item->expire_at->format('Y/m/d h:i:s') }}"></div>
                            <div class="time" data-format="S Secs" data-time="{{ $item->expire_at->format('Y/m/d h:i:s') }}"></div>
                          </div>
                        </div>
                      </div>
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
@endsection



@push('js')
<script type="text/javascript" src="{{ asset('js/countdown.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('[data-date]').each(function() {
      var jQuery = $(this)
      var finalDate = $(this).data('date');
      jQuery.countdown(finalDate, function(event) {
        jQuery.html(event.strftime('Ends In %D Days'));
      });
    });
    $('[data-time]').each(function() {
      var jQuery = $(this)
      var finalDate = $(this).data('time');
      var format = $(this).data('format');
      jQuery.countdown(finalDate, function(event) {
        jQuery.html(event.strftime('%'+format));
      });
    });
  });
</script>
@endpush
