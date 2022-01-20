@extends('new-layouts.app',['title' => 'Jiffystock - Homepage ','top_bar' => 'hide'])

@section('content')
<!-- Page Breadcrumb -->
@if(isset($product->sub_category)==true)
  <!-- <div class="breadcrumb-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <div class="page-title">
            <h1>{{$product->product->name}}</h1>
          </div>
        </div>
        <div class="col-lg-7">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item" aria-current="page"><a href="/category/products/{{$product->sub_category->id}}">{{$product->sub_category->name}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$product->product->name}}</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div> -->
@endif
<!-- /Page Breadcrumb/ -->
<!-- Product Details -->
<div class="inner-section">
  <div class="mx-5">
    <!-- Single Product -->
    <div class="row">
      @if(session()->has('message'))
      <div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> {{ session()->get('message') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
      @endif
      @if(session()->has('danger'))
      <div class="container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Failed!</strong> {{ session()->get('danger') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
      @endif
      <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb25">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7">
            <div id="product_big" class="single-product-slider owl-carousel caro-single-product">
              @if($product->image1)
                <div class="item">
                  <img src="{{ asset('storage/uploads/Products-Images/' . $product->product->image1) }}" />
                </div>
              @endif
              @if($product->image2)
                <div class="item">
                  <img src="{{ asset('storage/uploads/Products-Images/' . $product->product->image2) }}" />
                </div>
              @endif
              @if($product->image3)
                <div class="item">
                  <img src="{{ asset('storage/uploads/Products-Images/' . $product->product->image3) }}" />
                </div>
              @endif
              @if($product->image4)
                <div class="item">
                  <img src="{{ asset('storage/uploads/Products-Images/' . $product->product->image4) }}" />
                </div>
                @endif
              @if($product->image5)
                <div class="item">
                  <img src="{{ asset('storage/uploads/Products-Images/' . $product->product->image5) }}" />
                </div>
              @endif
            </div>
            <div id="product_thumbs" class="thumbnail-card owl-carousel">
              @if($product->image1)
                <div class="item">
                  <img src="{{ asset('storage/uploads/Products-Images/' . $product->product->image1) }}" />
                </div>
              @endif
              @if($product->image2)
                <div class="item">
                  <img src="{{ asset('storage/uploads/Products-Images/' . $product->product->image2) }}" />
                </div>
              @endif
              @if($product->image3)
                <div class="item">
                  <img src="{{ asset('storage/uploads/Products-Images/' . $product->product->image3) }}" />
                </div>
              @endif
              @if($product->image4)
                <div class="item">
                  <img src="{{ asset('storage/uploads/Products-Images/' . $product->product->image4) }}" />
                </div>
                @endif
              @if($product->image5)
                <div class="item">
                  <img src="{{ asset('storage/uploads/Products-Images/' . $product->product->image5) }}" />
                </div>
              @endif
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-xxl-5">
            <div class="pr_details">
              <div class="pr_basic_details">
                <h2>{{  $product->product->name }}</h2>
                <!-- <div class="pr_rating_wrap">
                  <div class="rating-wrap">
                    <div class="stars-outer">
                      <div class="stars-inner" style="width:0%;"></div>
                    </div>
                    <span class="rating-count">(0 Review)</span>
                  </div>
                </div> -->
                <div class="report">

                  <h4 class="dropstart">
                    <i class="bi bi-three-dots-vertical" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 17px;color: #534c4c;"></i>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="javascript:void(0)" onclick="modalOpen('product')" data-bs-toggle="modal" data-bs-target="#reportModal">Report This Product</a></li>
                    </ul>
                </h4>
                </div>
              </div>
              <div class="pr_extra"><strong>Brand:</strong><a href="product-details/{{ $product->id }}"> {{  $product->product->brand }}</a></div>

              <!-- <div class="pr_extra"><strong>SKU:</strong> TP-65874</div> -->

              <div class="row">
                <div class="col-md-12">
                  <div class="row">

                    <div class="col-md-6 font-weight-bold auction_min_bid text-brand">Minimum Bid :  </div>
                    <div class="col-md-4 text-secondary auction_min_bid">{{  currentCurrency($product->min_bid) }}</div>

                    <div class="col-md-12 font-weight-bold auction_time_left">Time Left For Auction : </div>
                    <div class="col-md-12 auction_time_left_countdown" data-countdown="{{ $product->expire_at->format('Y/m/d h:i:s') }}"></div>
                    <div class="basic_divider"></div>
                    <div class="col-md-6 font-weight-bold details">Country :  </div>
                    <div class="col-md-4 text-secondary text-sm flag">{{ flag(getCountryCode($product->user->countries->name)) }} &nbsp; {{ $product->user->countries->name }}</div>

                    <div class="col-md-6 font-weight-bold details">Stock Location : </div>
                    <div class="col-md-4 text-secondary">{{ $product->product->stock_location  }}</div>

                  </div>
                </div>
              </div>
              <br>
              <!-- <div class="pr_widget">
                <label class="widget-title">Color<span class="red">*</span></label>
                <ul class="widget-color">
                  <li id="color_Red" class="tp_color">
                    <a data-id="Red" class="selectcolor" href="javascript:void(0);" title="Red"><span style="background:black;"></span></a>
                  </li>
                </ul>
              </div> -->


              <div class="font-weight-bold details ">Availability : <span class="text-brand">{{ $product->stock_quantity }} In Stock</span></div>
              <div class="font-weight-bold details ">Category : <span class="text-brand">{{ ucwords($product->product->name) }}</span></div>

              <!-- <div class="pr_quantity my-3">
                <label for="quantity">Quantity<span class="red">*</span></label>
                <input name="quantity" id="quantity" type="number" min="1" max="600" value="1">
              </div> -->
              <div class="bg-secondary p-3 my-2 pr_note">
                <strong><i class="bi bi-exclamation-circle-fill"></i>&nbsp; Note :</strong>
                <span class="text">For Shiment and Custom Clearance, Please Contact to Logistic Services</span>
              </div>
              <div class="pr_benefits">
                  <div>
                    <span>
                      <i class="bi bi-check2-circle text-brand"></i>
                      <span class="text">Refund Policy</span>
                    </span>
                  </div>
                  <div>
                    <span>
                      <i class="bi bi-check2-circle text-brand"></i>
                      <span class="text">Quick Delivery (via Logistics)</span>
                    </span>
                  </div>
              </div>
              <div class="pr_buy_cart">
                <a class="btn theme-btn" id="bidnow" href="javascript:void(0);">Bid Now</a>
                <a class="btn theme-btn cart wishlist addtowishlist heart" data-id="39" href="javascript:void(0);"><i class="bi bi-heart-fill"></i></a>
              </div>
              <div id="variation_required">
                <p class="red">Please select required field.</p>
              </div>
              <div id="quantity_required">
                <p class="red">Please enter quantity.</p>
              </div>
              <div id="stockqty_required">
                <p class="red">The value must be less than or equal to 600</p>
              </div>
              <div id="stockout_required">
                <p class="red">This product out of stock.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="supplier_details" class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 mb25">
        <div class="row">
          <div class="bg-secondary p-5">
            <div class="basic_details">
                <h4 class="sidebar-heading">Supplier's Information</h4>
                <h4 class="dropstart">
                  <a href="{{ url('seller/profile/'.$product->user->id) }}"  class="text-decoration-underline">{{ $product->user->name }}</a>
                  &nbsp;<i class="bi bi-exclamation-circle-fill" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 17px;color: #534c4c;"></i>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="modalOpen('supplier')" data-bs-toggle="modal" data-bs-target="#reportModal">Report This Supplier</a></li>
                  </ul>
              </h4>
              @if($product->user->badge_verification_status == 2)
              <p><i class="bi bi-patch-check-fill" style="color:#00a1ff;font-size:16px"></i>&nbsp;Verified Seller</p>
                @else
                <p>Not Verified Seller</p>
              @endif
            </div>
            <br>
            <div class="business_details">
              <div class="row">
                <div class="col-md-12">
                  <div class="row">

                    <div class="col-md-6 font-weight-bold text-secondary seller-details">Business Type:  </div>
                    <div class="col-md-4 text-primary">Clothing</div>
                    <div class="my-2"></div>
                    <div class="col-md-6 font-weight-bold text-secondary seller-details">Joined Duration: </div>
                    <div class="col-md-4 text-primary">{{  $product->user->created_at->diffForHumans() }}</div>
                    <div class="my-2"></div>
                    <div class="col-md-6 font-weight-bold text-secondary seller-details">Country/Region:  </div>
                    <div class="col-md-4 text-primary text-sm flag">{{ flag(getCountryCode($product->user->countries->name)) }} &nbsp; {{ $product->user->countries->name }}</div>
                    <div class="my-2"></div>
                    <div class="col-md-6 font-weight-bold text-secondary seller-details">Products: </div>
                    <div class="col-md-4 text-primary">
                      @if($other_products->count() > 0)
                        @foreach($other_products as $p)
                        {{ $p->name }} ,
                        @endforeach
                      @else
                      No Other products
                      @endif
                    </div>

                    <div class="my-2"></div>
                    <div class="col-md-6 font-weight-bold text-secondary seller-details">Total Employees: </div>
                    <div class="col-md-4 text-primary">1-10</div>
                    <div class="my-2"></div>
                    <div class="col-md-6 font-weight-bold text-secondary seller-details">Target Market Suppliers: </div>
                    <div class="col-md-4 text-primary">Pakistan, Austrailia, West Indies</div>

                  </div>
                </div>
              </div>
            </div>
            <div class="cta mt-3">
              <a href="{{ route('seller.profile',$product->user->id) }}" class="btn bg-white w-100 text-dark rounded-pill">View Profile</a>
              <div class="my-2"></div>
              @if($current_user['user_id'] !== $product->user->id)
                @if($has_followed)
                <form action="{{route('seller.unfollow')}}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{ $product->user->id }}">
                  <button type="submit" class="btn brand-outline-btn">Unfollow</button>
                </form>
                @else
                <form action="{{route('seller.follow')}}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{ $product->user->id }}">
                  <button type="submit" class="btn brand-outline-btn">Follow</button>
                </form>
                @endif
              @endif
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- /Single Product/ -->

    <!-- Product Description Review -->
    <div class="row">
      <div class="col-lg-12">


      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="pr-description-review">
          <div class="desc-review-nav nav">
            <a class="active" href="#des_description" data-bs-toggle="tab">Description</a>
            <a href="#des_reviews" data-bs-toggle="tab">Reviews ({{ $total_rating }})</a>
          </div>
          <div class="tab-content">
            <div id="des_description" class="tab-pane active">
              <div class="entry">
              {{ $product->product->description }}
              </div>
            </div>
            <div id="des_reviews" class="tab-pane">
              <div class="review-content">
                <!-- Review Form-->
                <div class="row">
                  <div class="col-lg-6">
                    <h4>Submit your review</h4>
                    <p class="theme-color">Please <a href="../../user/login">login</a> to write review!</p>
                    <div class="form-product-review">
                      <form class="form" method="POST" action="javascript:void(0)">
                        <input type="hidden" name="_token" value="hRn3DM9gARTH5yfo6pfGy0sbfKmpgRGEbfIz9Nbn">
                        <div class="mb-3">
                          <textarea name="comments" placeholder="Write comment" class="form-control" rows="3" disabled></textarea>
                        </div>
                        <a class="btn theme-btn" href="../../user/login"><i class="bi bi-box-arrow-in-right"></i> Please Login</a>
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-6"></div>
                </div>
                <!-- /Review Form/-->

                <!-- Product Review -->
                <!-- /Product Review/ -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Product Description Review/ -->
  </div>
</div>
<!-- /Product Details/ -->

<!-- Related Products -->
<div class="section">
  <div class="container">
    <div class="row">
      <div class="section-heading">
        <h3 class="title">Related Products</h3>
        <a class="btn theme-btn seeall-btn" href="../../product-category/4/laptop.html">See all</a>
      </div>
    </div>
    <div class="row owl-carousel caro-common category-carousel">
      <div class="col-lg-12">
        <div class="item-card mb30">
          <div class="item-image">
            <ul class="labels-list">
              <li><span class="tplabel" style="background:#222222;">NEW</span></li>
            </ul>
            <ul class="product-action">
              <li><a href="../37/lenovo-ideapad-slim-3i-core-i3-10th-gen-156-hd-laptop.html"><i class="bi bi-cart"></i></a></li>
              <li><a href="../37/lenovo-ideapad-slim-3i-core-i3-10th-gen-156-hd-laptop.html"><i class="bi bi-zoom-in"></i></a></li>
              <li><a class="addtowishlist" data-id="37" href="javascript:void(0);"><i class="bi bi-heart"></i></a></li>
            </ul>
            <ul class="color-list">
              <li style="background:#dd0e14;"></li>
              <li style="background:#7a6fec;"></li>
            </ul>
            <a href="../37/lenovo-ideapad-slim-3i-core-i3-10th-gen-156-hd-laptop.html"><img src="{{ asset('new-frontend/media/17112021160955-600x600-1-laptop.jpg') }}" alt="" /></a>
          </div>
          <h4 class="item-title"><a href="../37/lenovo-ideapad-slim-3i-core-i3-10th-gen-156-hd-laptop.html">Lenovo IdeaPad Slim 3i Core i3...</a></h4>
          <div class="brand"><a href="../../brand/32/lenovo.html">Lenovo</a></div>
          <div class="item-price-card">
            <div class="item-price">$950</div>
          </div>
          <div class="rating-wrap">
            <div class="stars-outer">
              <div class="stars-inner" style="width:0%;"></div>
            </div>
            <span class="rating-count">(0)</span>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="item-card mb30">
          <div class="item-image">
            <ul class="labels-list">
              <li><span class="tplabel" style="background:#222222;">NEW</span></li>
            </ul>
            <ul class="product-action">
              <li><a href="../38/hp-15s-du1115tu-celeron-n4020-156-hd-laptop.html"><i class="bi bi-cart"></i></a></li>
              <li><a href="../38/hp-15s-du1115tu-celeron-n4020-156-hd-laptop.html"><i class="bi bi-zoom-in"></i></a></li>
              <li><a class="addtowishlist" data-id="38" href="javascript:void(0);"><i class="bi bi-heart"></i></a></li>
            </ul>
            <ul class="color-list">
              <li style="background:#dd0e14;"></li>
              <li style="background:#7a6fec;"></li>
            </ul>
            <a href="../38/hp-15s-du1115tu-celeron-n4020-156-hd-laptop.html"><img src="{{ asset('new-frontend/media/17112021161120-600x600-2-laptop.jpg') }}" alt="" /></a>
          </div>
          <h4 class="item-title"><a href="../38/hp-15s-du1115tu-celeron-n4020-156-hd-laptop.html">HP 15s-du1115TU Celeron N4020...</a></h4>
          <div class="brand"><a href="../../brand/33/hp.html">HP</a></div>
          <div class="item-price-card">
            <div class="item-price">$970</div>
          </div>
          <div class="rating-wrap">
            <div class="stars-outer">
              <div class="stars-inner" style="width:0%;"></div>
            </div>
            <span class="rating-count">(0)</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Related Products/ -->

<!-- Bid Now Modal -->
  <div class="modal fade" id="bidModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
      <form action="{{route('submit-bid')}}" method="post">
      @csrf
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Bid Now (Minimum {{  currentCurrency($product->min_bid)}})</h5>
                  <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
              </div>
              <div class="modal-body">

                  <input type="hidden" name="user_id" value="{{$product->product->user->id}}">
                    <input type="hidden" name="auction_id" value="{{$product->id}}">
                  <input type="hidden" name="product_id" value="{{$product->product_id}}">
                  <input type="hidden" name="min_bid" value="{{$product->min_bid}}">
                  <input type="number" name="bid_price" id="" min="{{$product->min_bid}}" max="100000" class="form-control"
                      placeholder="Enter your bidding amount" required>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn theme-btn">Submit</button>
              </div>
          </div>
      </div>
      </form>
  </div>
@endsection





@push('js')
<script type="text/javascript" src="{{ asset('js/countdown.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $(document).on('click','#bidnow',function(){
      $("#bidModal").modal("show");
    });

    $('[data-countdown]').each(function() {
      var jQuery = $(this)
      var finalDate = $(this).data('countdown');
      jQuery.countdown(finalDate, function(event) {
        jQuery.html(event.strftime('%D Days and %H:%M:%S Hours Left'));
      });
    });

  });
</script>
@endpush
