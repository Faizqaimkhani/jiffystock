@extends('new-layouts.app',['title' => 'Jiffystock - Homepage ','top_bar' => 'show'])

@section('content')
<!-- Home Slider -->
<div class="slider-section">
    <!-- <div class="container"> -->
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="home-slider owl-carousel">
                @foreach ($sliders as $slider)
                <div class="slider-item">
                    <a href="javascript:void(0)" class="position-relative">
                      <img src="{{ asset('storage/uploads/Sliders-Images/'.$slider->image) }}" alt="" />
                      <p class="slider_text">{{ $slider->text }}</p>
                    </a>
                </div>
                @endforeach
                <!-- <div class="slider-item">
            <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/06082021062313-slider-2.jpg')}}" alt="" /></a>
          </div>
          <div class="slider-item">
            <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/06082021062253-slider-3.jpg')}}" alt="" /></a>
          </div>
          <div class="slider-item">
            <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/06082021062229-slider-4.jpg')}}" alt="" /></a>
          </div> -->
            </div>
        </div>
        <div class="col-lg-3">
            <div class="row">
                <div class="col-lg-12">
                    <a href="javascript:void(0)" class="position-relative header-service"><img src="{{ asset('new-frontend/media/shipping.jfif')}}" alt="" width="400px" />
                        <div class="side-service">
                            Logistics Services
                        </div>
                    </a>
                </div>
                <div class="col-lg-12">
                    <a href="javascript:void(0)" class="position-relative header-service"><img src="{{ asset('new-frontend/media/special.jfif')}}" alt="" width="100%" />
                        <div class="side-service">
                            Auction Products
                        </div>
                    </a>
                </div>
                <div class="col-lg-12">
                    <a href="javascript:void(0)" class="position-relative header-service"><img src="{{ asset('new-frontend/media/coupon.jpg')}}" alt="" width="400px" style="height: 124px;object-fit: cover;" />
                        <div class="side-service">
                            Coupon Discounts
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
</div>
<!-- /Home Slider/ -->
<!-- Banner Item -->
<div class="block block-features block-features--layout--classic mt-5">
    <div class="container">
        <div class="block-features__list row">
            <div class="block-features__item col-lg-3">
                <div class="block-features__icon">
                    <img src="{{ asset('images/banner-icons/discount.svg') }}" alt="discount" height="55px" width="55px">
                </div>
                <div class="block-features__content">
                    <div class="block-features__title">Cheapest Products</div>
                    <div class="block-features__subtitle">with big discounts</div>
                </div>
            </div>
            <!-- <div class="block-features__divider"></div> -->
            <div class="block-features__item col-lg-3">
                <div class="block-features__icon">
                    <img src="{{ asset('images/banner-icons/registration.svg') }}" alt="registration" height="55px" width="55px">
                </div>
                <div class="block-features__content">
                    <div class="block-features__title">Free Registration</div>
                    <div class="block-features__subtitle">no hidden costs inside</div>
                </div>
            </div>
            <!-- <div class="block-features__divider"></div> -->
            <div class="block-features__item col-lg-3">
                <div class="block-features__icon">
                    <img src="{{ asset('images/banner-icons/contact.svg') }}" alt="contact" height="55px" width="55px">
                </div>
                <div class="block-features__content">
                    <div class="block-features__title">Direct contact to</div>
                    <div class="block-features__subtitle">resellers and wholesalers</div>
                </div>
            </div>
            <!-- <div class="block-features__divider"></div> -->
            <div class="block-features__item col-lg-3">
                <div class="block-features__icon">
                    <img src="{{ asset('images/banner-icons/supplier.svg') }}" alt="supplier" height="55px" width="55px">
                </div>
                <div class="block-features__content">
                    <div class="block-features__title">Worldwide</div>
                    <div class="block-features__subtitle">Suppliers</div>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div class="block-features__list row">
            <div class="block-features__item col-lg-3">
                <div class="block-features__icon">
                    <img src="{{ asset('images/banner-icons/fast_deals.svg') }}" alt="fast_deals" height="55px" width="55px">
                </div>
                <div class="block-features__content">
                    <div class="block-features__title">Very fast deals</div>
                    <div class="block-features__subtitle">within 24 hours</div>
                </div>
            </div>

            <div class="block-features__item col-lg-3">
                <div class="block-features__icon">
                    <img src="{{ asset('images/banner-icons/support.svg') }}" alt="support" height="55px" width="55px">
                </div>
                <div class="block-features__content">
                    <div class="block-features__title">Support 24/7</div>
                    <div class="block-features__subtitle">Call us anytime</div>
                </div>
            </div>

            <div class="block-features__item col-lg-3">
                <div class="block-features__icon">
                    <img src="{{ asset('images/banner-icons/shipment.svg') }}" alt="shipment" height="55px" width="55px">
                </div>
                <div class="block-features__content">
                    <div class="block-features__title">Best Shipment Companies</div>
                    <div class="block-features__subtitle">Fast Shipment</div>
                </div>
            </div>

            <div class="block-features__item col-lg-3">
                <div class="block-features__icon">
                    <img src="{{ asset('images/banner-icons/shipment.svg') }}" alt="shipment" height="55px" width="55px">
                </div>
                <div class="block-features__content">
                    <div class="block-features__title">Global Shipment</div>
                    <div class="block-features__subtitle">Shipment All around the world</div>
                </div>
            </div>
        </div>
    </div>
</div><!-- .block-features / end -->
<section class="offer-section">
    <div class="content text-center">
        <img src="{{ asset('new-frontend/media/offer.png') }}" class="img-fluid" alt="">
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 hot_categories">
                <div class="content bg-white p-3 position-relative">
                  <div class="custom-shape-divider-top-1641233387">
                      <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                          <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                          <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                          <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
                      </svg>
                  </div>
                    <h5 class="position-absolute">Hot Categories</h5>

                    <div class="categories ">
                        <div class="row">
                            <div class="box col-md-12">
                                <div class="row">
                                    <p class="font-weight-bold mt-2 cat-text">Consumer Electronics</p>
                                    <div class="col-md-3 col-sm-12  text-center">
                                        <img src="{{ asset('new-frontend/media/13082021020019-300x200-chopard.png')}}" />
                                    </div>
                                    <div class="col-md-3 col-sm-12  text-center">
                                        <img src="{{ asset('new-frontend/media/06082021083010-category-1.jpg')}}" />
                                    </div>
                                    <div class="col-md-3 col-sm-12  text-center">
                                        <img src="{{ asset('new-frontend/media/06082021083106-category-2.jpg')}}" />
                                    </div>
                                    <div class="col-md-3 col-sm-12 text-center">
                                        <img src="{{ asset('new-frontend/media/06082021083154-bag.jpg')}}" />
                                    </div>
                                </div>
                            </div>

                            <div class="box col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <p class="font-weight-bold mt-2 cat-text">Toys, Hobbies and Robots</p>
                                            <div class="col-md-6 text-center">
                                                <img src="{{ asset('new-frontend/media/06082021083231-category-4.jpg')}}" />
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <img src="{{ asset('new-frontend/media/13082021015951-300x200-canon.png')}}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <p class="font-weight-bold mt-2 cat-text">Computer and Electronics</p>
                                            <div class="col-md-6 text-center">
                                                <img src="{{ asset('new-frontend/media/13082021015728-300x200-honda.png')}}" />
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <img src="{{ asset('new-frontend/media/13082021015705-300x200-sujuki.png')}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <p class="font-weight-bold mt-2 cat-text">Phones and Telecommunicationss</p>
                                            <div class="col-md-6 text-center">
                                                <img src="{{ asset('new-frontend/media/13082021015524-300x200-HP.png')}}" />
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <img src="{{ asset('new-frontend/media/13082021015645-300x200-yamaha.png')}}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <p class="font-weight-bold mt-2 cat-text">Shoes</p>
                                            <div class="col-md-6 text-center">
                                                <img src="{{ asset('new-frontend/media/13082021015623-300x200-acer.png')}}" />
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <img src="{{ asset('new-frontend/media/13082021015550-300x200-dell.png')}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 new-ui">
                <div class="content services_section">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-lg-6 services">
                            <div class="content bg-white p-3 first_half_services">
                                <div class="logo">
                                    <img src="{{ asset('new-frontend/logo_web.png') }}" width="50%" alt="">
                                </div>
                                <div class="text  p-3">
                                    <h6 class="text-primary  my-2">
                                        <span>
                                            <i class="bi bi-exclamation-circle-fill text-primary"></i>
                                            Get information from us
                                        </span>
                                    </h6>
                                    <p class="text-primary">
                                        get all info regarding Jiffystock,<br> jiffy auction and<br> about our programs and services
                                    </p>
                                    <div class="btn  my-2">
                                        <a href="{{ url('contact-us') }}" class="text-primary btn-support"><i class="bi bi-headphones text-primary"></i> Contact our support</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="row second_half_services bg-primary">
                                <div class="service_box">
                                  <div class="service_box_ui">
                                    <div class="">
                                      <p class="title text-white font-weight-bold font-size-service"> > Suppliers </p>
                                      <p class="text-white" style="font-size: 11px;">JiffyStock Supplier List</p>
                                    </div>
                                    <div class="">
                                      <i class="bi bi-arrow-right-short text-primary services_icon"></i>
                                    </div>
                                  </div>
                                </div>
                                <div class="service_box">
                                    <div class="service_box_ui">
                                      <div class="">
                                          <p class="title text-white font-weight-bold font-size-service"> > Shipment Companies </p>
                                          <p class="text-white" style="font-size: 11px;">JiffyStock Shipment Companies List</p>
                                      </div>
                                      <div class="">
                                        <i class="bi bi-arrow-right-short text-primary services_icon"></i>
                                      </div>
                                    </div>
                                  </div>
                                <div class="service_box">
                                  <div class="service_box_ui">
                                    <div class="">
                                    <p class="title text-white font-weight-bold font-size-service"> > Custom Clearance Agencies </p>
                                    <p class="text-white" style="font-size: 11px;">JiffyStock Custom Clearance Agencies List</p>
                                  </div>
                                  <div class="">
                                    <i class="bi bi-arrow-right-short text-primary services_icon"></i>
                                  </div>
                                </div>
                              </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section">
    <div class="container">
        <ul class="nav nav-tabs row" id="myTab" role="tablist">
            <li class="nav-item col-md-2" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
            </li>
            <li class="nav-item col-md-2" role="presentation">
                <button class="nav-link" id="featured-tab" data-bs-toggle="tab" data-bs-target="#featured" type="button" role="tab" aria-controls="featured-tab" aria-selected="false">Featured</button>
            </li>
            <li class="nav-item col-md-2" role="presentation">
                <button class="nav-link" id="fast-deals-tab" data-bs-toggle="tab" data-bs-target="#fast_deals" type="button" role="tab" aria-controls="fast-deals-tab" aria-selected="false">Fast Deals</button>
            </li>
            <li class="nav-item col-md-2" role="presentation">
                <button class="nav-link" id="hurry-deals-tab" data-bs-toggle="tab" data-bs-target="#hurry_deals" type="button" role="tab" aria-controls="hurry-deals-tab" aria-selected="false">Hurry Deals</button>
            </li>
            <li class="nav-item col-md-2" role="presentation">
                <button class="nav-link" id="special-deals-tab" data-bs-toggle="tab" data-bs-target="#special_deals" type="button" role="tab" aria-controls="special-deals-tab" aria-selected="false">Special Deals</button>
            </li>
            <li class="nav-item col-md-2" role="presentation">
                <button class="nav-link" id="limited-time-products-tab" data-bs-toggle="tab" data-bs-target="#limited_time_products" type="button" role="tab" aria-controls="limited-time-products-tab" aria-selected="false">Limited Time
                    Products</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div id="all" class="section tab-pane fade show active" role="tabpanel" aria-labelledby="all">
                <div class="container">
                    <div class="row">
                        <div class="section-heading">
                            <h3 class="title">Explore <span class=""> Products <i class="bi bi-caret-right-fill"></i></span></h3>
                            <div class="horizontal_line"></div>
                            <a class="btn theme-btn seeall-btn" href="{{ url('search') }}">See all</a>
                        </div>
                    </div>

                    <div class="row owl-carousel caro-common category-carousel">
                        @foreach($products as $item)
                        @if($item->user)
                        <div class="col-lg-12">
                            <div class="item-card mb30">
                                <div class="item-image">
                                    <ul class="labels-list">
                                        <!-- <li><span class="tplabel">NEW</span></li> -->
                                    </ul>
                                    <ul class="product-action">
                                        <!-- <li><a href="/product-details/{{$item->id}}"><i class="bi bi-cart"></i></a></li> -->
                                        <li><a href="/product-details/{{$item->id}}"><i class="bi bi-zoom-in"></i></a></li>
                                        <li><a class="addtowishlist" data-id="47" href="javascript:void(0);"><i class="bi bi-heart"></i></a></li>
                                        <li><a href="javascript:void(0)" class="report_product_menu dropstart"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 17px;color: #534c4c;"><i
                                                  class="bi bi-three-dots-vertical"></i>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="modalOpen({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#reportModal">Report This Product</a></li>
                                        </ul>
                                      </a></li>
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
                                        <button type="submit" class="product-brand-btn btn btn-outline-primary rounded-pill text-center w-100 text-brand" data-id="39" data-stockqty="600"><i class="bi bi-envelope"></i>&nbsp; chat with Supplier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="featured" class="section tab-pane fade" role="tabpanel" aria-labelledby="featured-tab">
                <div class="container">
                    <div class="row">
                        <div class="section-heading">
                            <h3 class="title">Featured <span class="">Products <i class="bi bi-caret-right-fill"></i></span></h3>
                            <div class="horizontal_line"></div>
                            <a class="btn theme-btn seeall-btn" href="{{ url('search?type=featured') }}">See all</a>
                        </div>
                    </div>

                    <div class="row owl-carousel caro-common category-carousel">
                        @foreach($features as $item)
                        @if($item->user)
                        <div class="col-lg-12">
                            <div class="item-card mb30">
                                <div class="item-image">
                                    <ul class="labels-list">
                                        <!-- <li><span class="tplabel">NEW</span></li> -->
                                    </ul>
                                    <ul class="product-action">
                                        <!-- <li><a href="/product-details/{{$item->id}}"><i class="bi bi-cart"></i></a></li> -->
                                        <li><a href="/product-details/{{$item->id}}"><i class="bi bi-zoom-in"></i></a></li>
                                        <li><a class="addtowishlist" data-id="47" href="javascript:void(0);"><i class="bi bi-heart"></i></a></li>
                                        <li><a href="javascript:void(0)" class="report_product_menu dropstart"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 17px;color: #534c4c;"><i
                                                  class="bi bi-three-dots-vertical"></i>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="modalOpen({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#reportModal">Report This Product</a></li>
                                        </ul>
                                      </a></li>
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
                                        <button type="submit" class="product-brand-btn btn btn-outline-primary rounded-pill text-center w-100 text-brand" data-id="39" data-stockqty="600"><i class="bi bi-envelope"></i>&nbsp; chat with Supplier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="fast_deals" class="section tab-pane fade" role="tabpanel" aria-labelledby="fast-deals-tab">
                <div class="container">
                    <div class="row">
                        <div class="section-heading">
                            <h3 class="title">Fast Deals <span class="">Products<i class="bi bi-caret-right-fill"></i></span></h3>
                            <div class="horizontal_line"></div>
                            <a class="btn theme-btn seeall-btn" href="{{ url('search?type=fast_deals') }}">See all</a>
                        </div>
                    </div>

                    <div class="row owl-carousel caro-common category-carousel">
                        @foreach($fast_deals as $item)
                        <div class="col-lg-12">
                            <div class="item-card mb30">
                                <div class="item-image">
                                    <ul class="labels-list">
                                        <!-- <li><span class="tplabel">NEW</span></li> -->
                                    </ul>
                                    <ul class="product-action">
                                        <!-- <li><a href="/product-details/{{$item->id}}"><i class="bi bi-cart"></i></a></li> -->
                                        <li><a href="/product-details/{{$item->id}}"><i class="bi bi-zoom-in"></i></a></li>
                                        <li><a class="addtowishlist" data-id="47" href="javascript:void(0);"><i class="bi bi-heart"></i></a></li>
                                        <li><a href="javascript:void(0)" class="report_product_menu dropstart"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 17px;color: #534c4c;"><i
                                                  class="bi bi-three-dots-vertical"></i>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="modalOpen({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#reportModal">Report This Product</a></li>
                                        </ul>
                                      </a></li>
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
                                        <button type="submit" class="product-brand-btn btn btn-outline-primary rounded-pill text-center w-100 text-brand" data-id="39" data-stockqty="600"><i class="bi bi-envelope"></i>&nbsp; chat with Supplier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="special_deals" class="section tab-pane fade" role="tabpanel" aria-labelledby="special-deals-tab">
                <div class="container">
                    <div class="row">
                        <div class="section-heading">
                            <h3 class="title">Special Deals <span class="">Products<i class="bi bi-caret-right-fill"></i></span> </h3>
                            <div class="horizontal_line"></div>
                            <a class="btn theme-btn seeall-btn" href="{{ url('search?type=special_deals') }}">See all</a>
                        </div>
                    </div>
                    <div class="row owl-carousel caro-common category-carousel">
                        @foreach($special_deals as $item)
                        @if($item->user)
                        <div class="col-lg-12">
                            <div class="item-card mb30">
                                <div class="item-image">
                                    <ul class="labels-list">
                                        <!-- <li><span class="tplabel">NEW</span></li> -->
                                    </ul>
                                    <ul class="product-action">
                                        <!-- <li><a href="/product-details/{{$item->id}}"><i class="bi bi-cart"></i></a></li> -->
                                        <li><a href="/product-details/{{$item->id}}"><i class="bi bi-zoom-in"></i></a></li>
                                        <li><a class="addtowishlist" data-id="47" href="javascript:void(0);"><i class="bi bi-heart"></i></a></li>
                                        <li><a href="javascript:void(0)" class="report_product_menu dropstart"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 17px;color: #534c4c;"><i
                                                  class="bi bi-three-dots-vertical"></i>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="modalOpen({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#reportModal">Report This Product</a></li>
                                        </ul>
                                      </a></li>
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
                                        <button type="submit" class="product-brand-btn btn btn-outline-primary rounded-pill text-center w-100 text-brand" data-id="39" data-stockqty="600"><i class="bi bi-envelope"></i>&nbsp; chat with Supplier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="hurry_deals" class="section tab-pane fade" role="tabpanel" aria-labelledby="hurry-deals-tab">
                <div class="container">
                    <div class="row">
                        <div class="section-heading">
                            <h3 class="title">Hurry Deals <span class="">Products<i class="bi bi-caret-right-fill"></i></span> </h3>
                            <div class="horizontal_line"></div>
                            <a class="btn theme-btn seeall-btn" href="{{ url('search?type=hurry_deals') }}">See all</a>
                        </div>
                    </div>

                    <div class="row owl-carousel caro-common category-carousel">
                        @foreach($special_deals as $item)
                        @if($item->user)
                        <div class="col-lg-12">
                            <div class="item-card mb30">
                                <div class="item-image">
                                    <ul class="labels-list">
                                        <!-- <li><span class="tplabel">NEW</span></li> -->
                                    </ul>
                                    <ul class="product-action">
                                        <!-- <li><a href="/product-details/{{$item->id}}"><i class="bi bi-cart"></i></a></li> -->
                                        <li><a href="/product-details/{{$item->id}}"><i class="bi bi-zoom-in"></i></a></li>
                                        <li><a class="addtowishlist" data-id="47" href="javascript:void(0);"><i class="bi bi-heart"></i></a></li>
                                        <li><a href="javascript:void(0)" class="report_product_menu dropstart"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 17px;color: #534c4c;"><i
                                                  class="bi bi-three-dots-vertical"></i>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="modalOpen({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#reportModal">Report This Product</a></li>
                                        </ul>
                                      </a></li>
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
                                        <button type="submit" class="product-brand-btn btn btn-outline-primary rounded-pill text-center w-100 text-brand" data-id="39" data-stockqty="600"><i class="bi bi-envelope"></i>&nbsp; chat with Supplier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="limited_time_products" class="section tab-pane fade" role="tabpanel" aria-labelledby="limited-time-products-tab">
                <div class="container">
                    <div class="row">
                        <div class="section-heading">
                            <h3 class="title">Limited Time <span class="">Products<i class="bi bi-caret-right-fill"></i></span> </h3>
                            <div class="horizontal_line"></div>
                            <a class="btn theme-btn seeall-btn" href="{{ url('search?type=limited_time_products') }}">See all</a>
                        </div>
                    </div>

                    <div class="row owl-carousel caro-common category-carousel">
                        @if(count($limited_time_products) < 1) <h5>No Products Found</h5>
                            @endif
                            @foreach($limited_time_products as $item)
                            @if($item->user)
                            <div class="col-lg-12">
                                <div class="item-card mb30">
                                    <div class="item-image">
                                        <ul class="labels-list">
                                            <!-- <li><span class="tplabel">NEW</span></li> -->
                                        </ul>
                                        <ul class="product-action">
                                            <!-- <li><a href="/product-details/{{$item->id}}"><i class="bi bi-cart"></i></a></li> -->
                                            <li><a href="/product-details/{{$item->id}}"><i class="bi bi-zoom-in"></i></a></li>
                                            <li><a class="addtowishlist" data-id="47" href="javascript:void(0);"><i class="bi bi-heart"></i></a></li>
                                            <li><a href="javascript:void(0)" class="report_product_menu dropstart"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 17px;color: #534c4c;"><i
                                                      class="bi bi-three-dots-vertical"></i>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="modalOpen({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#reportModal">Report This Product</a></li>
                                            </ul>
                                          </a></li>
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
                                            <button type="submit" class="product-brand-btn btn btn-outline-primary rounded-pill text-center w-100 text-brand" data-id="39" data-stockqty="600"><i class="bi bi-envelope"></i>&nbsp; chat with Supplier</button>
                                        </form>
                                    </div>
                                    <div class="countdown text-brand text-center" data-countdown="{{ $item->limited_time->format('Y/m/d h:i:s') }}">
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Available Offer Section -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="section-heading">
                <h3 class="title">Auction <span class="">Products<i class="bi bi-caret-right-fill"></i></span> </h3>
                <div class="horizontal_line"></div>
                <a class="btn theme-btn seeall-btn" href="javascript:void(0)">See all</a>
            </div>
        </div>

        <div class="row owl-carousel caro-common category-carousel">
            @foreach($auctions as $item)
            @if($item->product && $item->product->user)
            <div class="col-lg-12">
                <div class="item-card mb30">
                    <div class="item-image">
                        <ul class="product-action">
                            <!-- <li><a href="/product-details/{{$item->id}}"><i class="bi bi-cart"></i></a></li> -->
                            <li><a href="/auction-product/{{$item->id}}"><i class="bi bi-zoom-in"></i></a></li>
                            <li><a class="addtowishlist" data-id="47" href="javascript:void(0);"><i class="bi bi-heart"></i></a></li>
                            <li><a href="javascript:void(0)" class="report_product_menu dropstart"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 17px;color: #534c4c;"><i
                                      class="bi bi-three-dots-vertical"></i>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="modalOpen({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#reportModal">Report This Product</a></li>
                            </ul>
                          </a></li>
                        </ul>
                        <ul class="color-list">
                            <li style="background:#e7a202;"></li>
                        </ul>
                        <a href="/auction-product/{{$item->id}}">
                            <div class="days-left text-brand" data-date="{{ $item->expire_at->format('Y/m/d h:i:s') }}"> </div>
							 <img class="product-image" src="{{ asset('storage/uploads/Products-Images/' . $item->image1) }}" alt="" />
                        </a>
                    </div>
                    <h4 class="item-title"><a href="/auction-product/{{$item->id}}">{{ucwords($item->product->name)}}</a></h4>
                    <div class="brand">
                        <a href="/auction-product/{{$item->id}}">
                            <span class="product-country-flag">
                                {{ flag(getCountryCode($item->product->user->countries->name)) }}
                            </span>
                            <span class="text-dark">
                                {{$item->product->user->countries->name}}
                            </span>
                        </a>
                        <p class="text-brand pr-2">Stock : {{$item->product->stock_quantity}}</p>
                    </div>
                    <p class="text-secondary font-weight-bold">Quantity : {{ $item->quantity }}</p>
                    <div class="item-price-card">
                        <div class="item-price"><span class="text-brand product-price">{{currentCurrency($item->min_bid)}} </div>
                    </div>
                    <div class="product-btn">
						@if(!empty($approved_bids))
						
							@if(!in_array($item->id, $approved_bids->pluck('auction_id')))
                        	<a href="/auction-product/{{$item->id}}" class="product-auction-brand-btn btn btn-primary rounded-pill text-center w-100">
                            	Bid Now
                        	</a>
							@endif
						@endif
                    </div>
                    <div class="time-left">
                        <div class="time" data-format="H Hrs" data-time="{{ $item->expire_at->format('Y/m/d h:i:s') }}"></div>
                        <div class="time" data-format="M Mins" data-time="{{ $item->expire_at->format('Y/m/d h:i:s') }}"></div>
                        <div class="time" data-format="S Secs" data-time="{{ $item->expire_at->format('Y/m/d h:i:s') }}"></div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
<!-- /Available Offer Section/ -->


<div class="section">
    <div class="container">
        <h3>For You</h3>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="banner-item mb25">
                    <div class="banner-item-img">
                        <img src="{{ asset('new-frontend/media/06082021083010-category-1.jpg')}}" />
                    </div>
                    <div class="banner-item-info">
                        <h2>New</h2>
                        <h4>Collection</h4>
                        <a class="btn theme-btn" href="javascript:void(0)">Shop Now</a>
                    </div>
                </div>
                <div class="banner-item mb25">
                    <div class="banner-item-img">
                        <img src="{{ asset('new-frontend/media/06082021083106-category-2.jpg')}}" />
                    </div>
                    <div class="banner-item-info">
                        <h2>Hot</h2>
                        <h4>Collection</h4>
                        <a class="btn theme-btn" href="javascript:void(0)">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="banner-item mb25">
                    <div class="banner-item-img">
                        <img src="{{ asset('new-frontend/media/06082021083154-bag.jpg')}}" />
                    </div>
                    <div class="banner-item-info">
                        <h2>Products Auctions</h2>
                        <h4>Hot deals</h4>
                        <a class="btn theme-btn" href="{{ url('auction-products') }}">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="banner-item mb25">
                    <div class="banner-item-img">
                        <img src="{{ asset('new-frontend/media/06082021083231-category-4.jpg')}}" />
                    </div>
                    <div class="banner-item-info">
                        <h2>New</h2>
                        <h4>Arrivals</h4>
                        <a class="btn theme-btn" href="javascript:void(0)">Shop Now</a>
                    </div>
                </div>
                <div class="banner-item mb25">
                    <div class="banner-item-img">
                        <img src="{{ asset('new-frontend/media/06082021083332-category-5.jpg')}}" />
                    </div>
                    <div class="banner-item-info">
                        <h2>Hot</h2>
                        <h4>Offer</h4>
                        <a class="btn theme-btn" href="javascript:void(0)">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Banner Item/ -->
<!--Brand Slider-->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="section-heading">
                <h3 class="title">Our Official Partners</h3>
            </div>
        </div>
        <div class="row owl-carousel caro-common brands-carousel">
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/13082021020019-300x200-chopard.png')}}" alt="Chopard" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/13082021015951-300x200-canon.png')}}" alt="Canon" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/13082021015927-300x200-BRB.png')}}" alt="BRB" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/13082021015904-300x200-bata.png')}}" alt="Bata" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/13082021015820-300x200-adidas.png')}}" alt="Adidas" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/13082021015757-300x200-nike.png')}}" alt="Nike" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/13082021015728-300x200-honda.png')}}" alt="Honda" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/13082021015705-300x200-sujuki.png')}}" alt="Sujuki" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/13082021015645-300x200-yamaha.png')}}" alt="Yamaha" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/13082021015623-300x200-acer.png')}}" alt="Acer" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/13082021015550-300x200-dell.png')}}" alt="Dell" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/13082021015524-300x200-HP.png')}}" alt="HP" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/13082021015436-300x200-lenovo.png')}}" alt="Lenovo" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/13082021015412-300x200-walton.png')}}" alt="Walton" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/13082021015348-300x200-oppo.png')}}" alt="Oppo" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/13082021015313-300x200-samsung.png')}}" alt="Samsung" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/07082021143903-300x200-8.png')}}" alt="Fila" /></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-card">
                    <a href="javascript:void(0)"><img src="{{ asset('new-frontend/media/07082021143236-300x200-1.png')}}" alt="Xiaomi" /></a>
                </div>
            </div>
        </div>
    </div>
</div>

<style media="screen">
  .error{
    color:red;
  }
</style>

<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if($current_user['user_id'] !== null)
        @if($errors->has('product_id'))
            <div class="error">Something Went Wrong Try Again</div>
        @endif
        <form class="" action="{{ route('report') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group my-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Report Title" required value="{{ old('title') }}">
            @if($errors->has('title'))
                <div class="error">{{ $errors->first('title') }}</div>
            @endif
          </div>
          <div class="form-group my-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="8" cols="80" required placeholder="Report Description">{{ old('description') }}</textarea>
            @if($errors->has('description'))
                <div class="error">{{ $errors->first('description') }}</div>
            @endif
          </div>
          <div class="form-group my-3">
            <label for="description">Screenshots Proof (required)</label>
            <input type="file" name="screenshots[]" multiple="multiple" required>
            @if($errors->has('screenshots'))
                <div class="error">{{ $errors->first('screenshots') }}</div>
            @endif
          </div>
          <input type="hidden" name="type" id="reportType" value="product">
          <input type="hidden" name="product_id" value="">
          <div class="form-group my-3">
            <input type="submit" value="Report" class="btn brand-outline-btn">
          </div>
        </form>
        @else
        <div class="text-center">
          <a href="{{ url('/login') }}" class="btn btn-primary">Login To Report</a>
        </div>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@push('support')
  @if(auth('customer')->check())
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <input type="hidden" id="current_user" value="{{ Auth('customer')->user()->id }}" />

    <input type="hidden" id="pusher_app_key" value="678afaa42e4cd7f96249" />
    <input type="hidden" id="pusher_cluster" value="ap2" />
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script src="{{ asset('js/support.js') }}">
    </script>
    @php
      $support = supportid();
    @endphp
    @include('support-box')


    <div class="support d-flex">
      <a class="support-btn" href="javascript:void(0);" class="chat-toggle" onclick="supportpopup('{{ $support->id }}','Support')" data-id="{{ $support->id }}" data-user="{{ $support->name }}"> <i class="fas fa-comments text-brand"></i>
      </a>
    </div>
  @endif
  @if(auth('web')->check() )
    @if( auth('web')->user()->usertype != "admin" )
      <input type="hidden" id="current_user" value="{{ Auth('web')->id() }}" />

      <input type="hidden" id="pusher_app_key" value="678afaa42e4cd7f96249" />
      <input type="hidden" id="pusher_cluster" value="ap2" />
      <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
      <script src="{{ asset('js/supportuser.js') }}" defer>
      </script>
      @php
        $support = supportid();
      @endphp
      @include('support-box')

      <div class="support d-flex">
        <a class="support-btn text-brand" href="javascript:void(0);" class="chat-toggle" onclick="supportpopup('{{ $support->id }}','Support')" data-id="{{ $support->id }}" data-user="{{ $support->name }}"> <i class="fas fa-comments text-brand"></i>
        </a>
      </div>
    @endif
  @endif
@endpush
@push('js')
  <script type="text/javascript">
    $(document).ready(function(){
      let modalShow = '{{ $errors->any() }}';
      if(modalShow == '1') {
        console.log('thsi isi workisdns')
        $('#reportModal').modal('show')
      }
    })
    function modalOpen(product_id) {
      $("input[name='product_id']").val(product_id);
    }
  </script>
@endpush

@endsection


@push('js')
<script type="text/javascript" src="{{ asset('js/countdown.js') }}">

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('[data-countdown]').each(function() {
            var jQuery = $(this)
            var finalDate = $(this).data('countdown');
            jQuery.countdown(finalDate, function(event) {
                jQuery.html(event.strftime('%D days %H:%M:%S'));
            });
        });
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
                jQuery.html(event.strftime('%' + format));
            });
        });
    });
</script>
@endpush
