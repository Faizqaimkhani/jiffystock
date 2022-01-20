@extends('new-layouts.app',['title' => 'Jiffystock - Suppliers ','top_bar' => 'hide'])

@section('content')
<style media="screen">
  .seller_basic_details{
    position:relative;
  }
  .seller_basic_details .profile_pic {
    display: flex;
    justify-content: center;
  }
  .seller_products, .other_sellers, .seller_basic_details{
    border-radius: 10px;
  }
  .other_sellers{

  }
  .products_heading{
    color: #736a6a;
  }
  .divider{
    margin-top: 5rem;
  }
  .seller_product_image{
    object-fit: contain;
    height: 100%;
    width: 100%;
  }
  .other_seller_image {
    border-top: 1px solid whitesmoke;
    border-left: 1px solid whitesmoke;
    border-bottom: 1px solid whitesmoke;
    object-fit: contain;
    height: 100%;
    width: 100%;
  }
</style>
<div class="divider"></div>
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
<div class="content mb-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="seller_basic_details bg-white ">
          <div class="profile_pic">
            <img src="{{ asset('images/seller-avatar.png') }}" class="img-fluid w-50 rounded-circle" alt="">
          </div>
          <div class="profile_name p-4">
            <h3 class="font-weight-bold text-center">
              {{ $seller->name }}
            </h3>
          </div>
          <div class="follow_seller ">
            <div class="text-center">
              @if($current_user['user_id'] !== $seller->id)
                @if($has_followed)
                <form action="{{ route('seller.unfollow') }}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{ $seller->id }}">
                  <button type="submit" class="btn brand-outline-btn w-50">Unfollow</button>
                </form>
                @else
                <form action="{{ route('seller.follow')}} " method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{ $seller->id }}">
                  <button type="submit" class="btn brand-outline-btn w-50">Follow</button>
                </form>
                @endif
              @endif
            </div>
          </div>
          <div class="profile_details p-4">

            <div class="row">
              <div class="col-md-12">
                <div class="row ">
                  <div class="col-md-6 font-weight-bold text-secondary seller-details">Followers :  </div>
                  <div class="col-md-4 text-primary">{{ $followers }}</div>
                  <div class="col-md-6 font-weight-bold text-secondary seller-details">Business Type:  </div>
                  <div class="col-md-4 text-primary">Clothing</div>
                  <div class="my-2"></div>
                  <div class="col-md-6 font-weight-bold text-secondary seller-details">Joined Duration: </div>
                  <div class="col-md-4 text-primary">{{  $seller->created_at->diffForHumans() }}</div>
                  <div class="my-2"></div>
                  <div class="col-md-6 font-weight-bold text-secondary seller-details">Country/Region:  </div>
                  <div class="col-md-4 text-primary text-sm flag">{{ flag(getCountryCode($seller->countries->name)) }} &nbsp; {{ $seller->countries->name }}</div>
                  <div class="my-2"></div>
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
        </div>
      </div>
      <div class="col-lg-6">
        <div class="seller_products bg-white p-5">
          <div class="products_heading">
            <h2>{{ $seller->brand ?? $seller->name }}'s Products</h2>
          </div>
          <div class="my-4"></div>
          <div class="products">
            @if(count($products) < 1)
              <h5 style="font-weight: 500;" class="text-brand">Seller do not have any products.</h5>
            @endif
            @foreach($products as $product)
            <a href="{{ route('product-details', $product->id) }}">
              <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="{{ asset('storage/uploads/Products-Images/' . $product->image1) }}" class="img-fluid rounded-start seller_product_image" alt="">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ substr($product->description,0,60) }} ...</p>
                    <p class="card-text"><small class="text-muted">Uploded {{ $product->created_at->diffForHumans() }}</small></p>
                  </div>
                </div>
              </div>
            </div>
          </a>
            @endforeach

            <div class="pagination m-2">
              {{ $products->links() }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="other_sellers bg-white p-4">
          <div class="other_sellers_heading">
            <h4>Other Sellers</h4>
          </div>
          <div class="other_sellers_profiles">
            @foreach($other_sellers as $other_seller)
              <div class="row g-0 my-3 bg-secondary">
                <div class="col-md-4">
                  <img src="{{ asset('images/seller-avatar.png') }}" class="img-fluid rounded-start other_seller_image" alt="">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">
                      <a href="{{ url('seller/profile/'.$other_seller->id ) }}">{{ $other_seller->name }}</a>
                    </h5>
                    <p class="card-text"><small class="text-muted flag">{{ flag(getCountryCode($seller->countries->name)) }} &nbsp; {{ $seller->countries->name }}</small></p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
