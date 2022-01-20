@extends('layouts.app')

@section('js')
  <script src="{{ asset('js/countdown.js') }}"></script>
@endsection

@section('content')

<style media="screen">
.text-brand{
    color: #f18819;
  }
</style>

<!-- site__body -->
<div class="site__body">
    <!-- .block-slideshow -->
    <div class="block-slideshow block-slideshow--layout--with-departments block">
        <!--<div class="container">-->
        <!--    <div class="row">-->
        <!--        <div class="col-12 col-lg-12 ">-->
                    <div class="block-slideshow__body">
                        <div class="owl-carousel">
                            @foreach ($sliders as $slide)
                            <a class="block-slideshow__slide">
                                <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style='background-image: url("{{ asset('storage/uploads/Sliders-Images/' . $slide->image) }}")'></div>
                                <!--<div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style='background-image: url("{{ asset('frontend/images/slides/slide-1-mobile.jpg') }}")'></div>-->
                                <!--<div class="block-slideshow__slide-content">-->
                                <!--    <div class="block-slideshow__slide-title w-75">{{$slide->heading}}-->
                                <!--    </div>-->
                                <!--    <div class="block-slideshow__slide-text w-75">{{$slide->text}}</div>-->

                                <!--</div>-->
                            </a>
                            @endforeach
                            @if(isset($Adds))
                            @foreach ($Adds as $slide)
                            <a class="block-slideshow__slide" href="/Seller/products/{{$slide->user_id}}">
                                <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style='background-image: url("{{ asset('storage/uploads/Advertisement-Images/' . $slide->image) }}")'></div>
                                <!--<div class="block-slideshow__slide-content">-->
                                <!--    <div class="block-slideshow__slide-title w-75">-->
                                <!--    </div>-->
                                <!--    <div class="block-slideshow__slide-text w-75">{{$slide->text}}</div>-->
                                <!--    <div class="block-slideshow__slide-button"><span class="btn btn-primary btn-lg" onclick="window.location='/Seller/products/{{$slide->user_id}}'">Shop-->
                                <!--            Now</span></div>-->
                                <!--</div>-->
                            </a>
                            @endforeach
                            @endif
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </div><!-- .block-slideshow / end -->
    <!-- .block-features -->
    <div class="block block-features block-features--layout--classic">
        <div class="container">
            <div class="block-features__list">
                <div class="block-features__item">
                    <div class="block-features__icon">
                      <img src="{{ asset('images/banner-icons/discount.svg') }}" alt="discount" height="55px" width="55px">
                  </div>
                    <div class="block-features__content">
                        <div class="block-features__title">Cheapest Products</div>
                        <div class="block-features__subtitle">with big discounts</div>
                    </div>
                </div>
                <div class="block-features__divider"></div>
                <div class="block-features__item">
                    <div class="block-features__icon">
                      <img src="{{ asset('images/banner-icons/registration.svg') }}" alt="registration" height="55px" width="55px">
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">Free Registration</div>
                        <div class="block-features__subtitle">no hidden costs inside</div>
                    </div>
                </div>
                <div class="block-features__divider"></div>
                <div class="block-features__item">
                    <div class="block-features__icon">
                      <img src="{{ asset('images/banner-icons/contact.svg') }}" alt="contact" height="55px" width="55px">
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">Direct contact to</div>
                        <div class="block-features__subtitle">resellers and wholesalers</div>
                    </div>
                </div>
                <div class="block-features__divider"></div>
                <div class="block-features__item">
                    <div class="block-features__icon">
                      <img src="{{ asset('images/banner-icons/supplier.svg') }}" alt="supplier" height="55px" width="55px">
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">Worldwide</div>
                        <div class="block-features__subtitle">Suppliers</div>
                    </div>
                </div>

            </div>
            <div class="divider my-4"></div>
            <div class="block-features__list">
              <div class="block-features__item">
                  <div class="block-features__icon">
                    <img src="{{ asset('images/banner-icons/fast_deals.svg') }}" alt="fast_deals" height="55px" width="55px">
                  </div>
                  <div class="block-features__content">
                      <div class="block-features__title">Very fast deals</div>
                      <div class="block-features__subtitle">within 24 hours</div>
                  </div>
              </div>
              <div class="block-features__divider"></div>

              <div class="block-features__item">
                  <div class="block-features__icon">
                    <img src="{{ asset('images/banner-icons/support.svg') }}" alt="support" height="55px" width="55px">
                  </div>
                  <div class="block-features__content">
                      <div class="block-features__title">Support 24/7</div>
                      <div class="block-features__subtitle">Call us anytime</div>
                  </div>
              </div>
              <div class="block-features__divider"></div>

              <div class="block-features__item">
                  <div class="block-features__icon">
                    <img src="{{ asset('images/banner-icons/shipment.svg') }}" alt="shipment" height="55px" width="55px">
                  </div>
                  <div class="block-features__content">
                      <div class="block-features__title">Best Shipment Companies</div>
                      <div class="block-features__subtitle">Fast Shipment</div>
                  </div>
              </div>
              <div class="block-features__divider"></div>

              <div class="block-features__item">
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
    <!-- .block-products-carousel -->
    <div class="block block-products-carousel" data-layout="grid-4">
        <div class="container">
            <div class="block-header text-center">
                <h3 class="block-header__title d-inline mx-auto">Featured <span style="color:#F18819"> Products </span></h3>
            </div>
            <div class="row">
              @if(count($features) < 1)
              <p class="text-center">Products Not Found</p>
              @endif
                @foreach($features as $item)
                  @if($item->user)
                  <div class="col-md-3 my-2">
                  <div class="product-card "><button class="product-card__quickview" onclick="return window.location.href='/product-details/{{$item->id}}'" type="button"><svg width="16px" height="16px">
                              <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                          </svg> <span class="fake-svg-icon"></span></button>
                      <div class="product-card__badges-list">
                          <div class="product-card__badge product-card__badge--new">New</div>
                      </div>
                      <!-- <div class="product-card__image"><a href="/product-details/{{$item->id}}"><img src="{{ asset('images/product.jfif') }}" alt=""></a></div> -->
                      <div class="product-card__image"><a href="/product-details/{{$item->id}}"><img src="{{ asset('storage/uploads/Products-Images/' . $item->image1) }}" alt=""></a></div>
                      <div class="product-card__info">
                          <div class="product-card__name"><a href="/product-details/{{$item->id}}">{{ucwords($item->name)}}</a></div>
                          <div class="d-flex">
                              <div class="flag_custom">
                                  {{ flag(getCountryCode($item->user->countries->name)) }}
                              </div>
                              <h6 class="ml-2 mt-1"> {{$item->user->countries->name}}</h6>
                              <h6 class="ml-4 mt-1">Stock :<span class="ml-2">{{$item->stock_quantity}}</span></h6>
                          </div>

                          <div class="product-card__rating">
                              <div class="rating">

                                  <?php
                                  $review_count = App\Models\Reviews::where('product_id', $item->id)->count();
                                  $total_rating = App\Models\Reviews::where('product_id', $item->id)->sum('rating');
                                  $total_rating = $review_count > 0 ? $total_rating / $review_count : $total_rating;
                                  $total_rating = round($total_rating);
                                  ?>


                                  <div class="rating__body">

                                      <?php for ($i = 0; $i < $total_rating; $i++) { ?>
                                          <svg class="rating__star rating__star--active" width="13px" height="12px">
                                              <g class="rating__fill">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}">
                                                  </use>
                                              </g>
                                              <g class="rating__stroke">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                  </use>
                                              </g>
                                          </svg>
                                          <div class="rating__star rating__star--only-edge rating__star--active">
                                              <div class="rating__fill">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                              <div class="rating__stroke">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                          </div>
                                      <?php } ?>

                                      <?php for ($i = $total_rating; $i < 5; $i++) { ?>
                                          <svg class="rating__star" width="13px" height="12px">
                                              <g class="rating__fill">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}">
                                                  </use>
                                              </g>
                                              <g class="rating__stroke">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                  </use>
                                              </g>
                                          </svg>
                                          <div class="rating__star rating__star--only-edge">
                                              <div class="rating__fill">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                              <div class="rating__stroke">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                          </div>
                                      <?php } ?>

                                  </div>
                              </div>
                              <div class="product-card__rating-legend">{{$review_count}} </div>
                          </div>

                      </div>
                      <div class="product-card__actions">
                          <div class="product-card__availability">Availability: <span class="text-success">In
                                  Stock</span></div>
                          <div class="d-flex">
                          <div class="product-card__prices">{{currentCurrency($item->price)}} / {{$item->unit}}</div>
                          <div class="product-card__buttons ml-4">
                              <!--<button
                                              class="btn btn-primary product-card__addtocart" type="button">Add To
                                              Cart</button> <button
                                              class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                              type="button">Add To Cart</button> -->
                              <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="30px" height="30px" onclick="add_to_wishlist({{$item->id}})">
                                      <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                  </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                              <!-- <button
                                              class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                              type="button"><svg width="16px" height="16px">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                              </svg> <span
                                                  class="fake-svg-icon fake-svg-icon--compare-16"></span></button> -->
                          </div>
                          <!-- <div class="product-card__buttons">
                              @if(isset(Auth('customer')->user()->id) == false)
                              <a class="btn btn-outline-primary col-12" href="{{route('login')}}">Chat with Supplier</a>
                              @else
                              <a class="btn btn-outline-primary col-12" href="javascript:void(0);" class="chat-toggle" onclick="Chatpop('{{ $item->user->id }}','{{ $item->user->name }}')" data-id="{{ $item->user->id }}" data-user="{{ $item->user->name }}">Chat with Supplier</a>


                              <input type="hidden" id="current_user" value="{{ Auth('customer')->user()->id }}" />
                              <input type="hidden" id="pusher_app_key" value="678afaa42e4cd7f96249" />
                              <input type="hidden" id="pusher_cluster" value="ap2" />
                              @endif
                          </div> -->
                          </div>
                      </div>
                  </div>
                  </div>
                  @endif
                @endforeach
            </div>
            <!-- <div class="block-products-carousel__slider">
                <div class="block-products-carousel__preloader"></div>
                <div class="owl-carousel">
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                </div>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-1.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Electric Planer
                                            Brandix KL370090G 300 Watts</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$749.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--hot">Hot</div>
                                </div>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-2.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Undefined Tool IRadix
                                            DPS3000SY 2700 Watts</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">11 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$1,019.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-3.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Drill Screwdriver
                                            Brandix ALX7054 200 Watts</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$850.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--sale">Sale</div>
                                </div>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-4.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Drill Series 3
                                            Brandix KSR4590PQS 1500 Watts</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">7 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices"><span
                                            class="product-card__new-price">$949.00</span> <span
                                            class="product-card__old-price">$1189.00</span></div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-5.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Router Power
                                            Tool 2017ERXPK</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$1,700.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-6.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Drilling
                                            Machine DM2019KW4 4kW</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">7 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$3,199.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-7.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Pliers</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">4 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$24.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-8.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Water Hose 40cm</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>f
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">4 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$15.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-9.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Spanner Wrench</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$19.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-10.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Water Tap</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">11 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$15.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-11.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Hand Tool Kit</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$149.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-12.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Ash's Chainsaw
                                            3.5kW</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">11 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$666.99</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-13.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Angle Grinder
                                            KZX3890PQW</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">4 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$649.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-14.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Air
                                            Compressor DELTAKX500</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">7 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$1,800.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-15.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Electric
                                            Jigsaw JIG7000BQ</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">4 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$290.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-16.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Screwdriver
                                            SCREW1500ACC</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">11 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$1,499.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <div class="block block-products-carousel" data-layout="grid-4">
        <div class="container">
            <div class="block-header text-center">
                <h3 class="block-header__title d-inline mx-auto">Fast Deals <span style="color:#F18819"> Products </span></h3>
            </div>
            <div class="row">
              @if(count($fast_deals) < 1)
              <p class="text-center">Products Not Found</p>
              @endif
                @foreach($fast_deals as $item)
                  @if($item->user)
                  <div class="col-md-3 my-2">
                  <div class="product-card "><button class="product-card__quickview" onclick="return window.location.href='/product-details/{{$item->id}}'" type="button"><svg width="16px" height="16px">
                              <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                          </svg> <span class="fake-svg-icon"></span></button>
                      <div class="product-card__badges-list">
                          <div class="product-card__badge product-card__badge--new">New</div>
                      </div>
                      <div class="product-card__image"><a href="/product-details/{{$item->id}}"><img src="{{ asset('storage/uploads/Products-Images/' . $item->image1) }}" alt=""></a></div>
                      <!-- <div class="product-card__image"><a href="/product-details/{{$item->id}}"><img src="{{ asset('images/product2.jfif') }}" alt=""></a></div> -->
                      <div class="product-card__info">
                          <div class="product-card__name"><a href="/product-details/{{$item->id}}">{{ucwords($item->name)}}</a></div>
                          <div class="d-flex">
                              <div class="flag_custom">
                                  {{ flag(getCountryCode($item->user->countries->name)) }}
                              </div>
                              <h6 class="ml-2 mt-1"> {{$item->user->countries->name}}</h6>
                              <h6 class="ml-4 mt-1">Stock :<span class="ml-2">{{$item->stock_quantity}}</span></h6>
                          </div>
                          <div class="product-card__rating">
                              <div class="rating">

                                  <?php
                                  $review_count = App\Models\Reviews::where('product_id', $item->id)->count();
                                  $total_rating = App\Models\Reviews::where('product_id', $item->id)->sum('rating');
                                  $total_rating = $review_count > 0 ? $total_rating / $review_count : $total_rating;
                                  $total_rating = round($total_rating);
                                  ?>


                                  <div class="rating__body">

                                      <?php for ($i = 0; $i < $total_rating; $i++) { ?>
                                          <svg class="rating__star rating__star--active" width="13px" height="12px">
                                              <g class="rating__fill">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}">
                                                  </use>
                                              </g>
                                              <g class="rating__stroke">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                  </use>
                                              </g>
                                          </svg>
                                          <div class="rating__star rating__star--only-edge rating__star--active">
                                              <div class="rating__fill">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                              <div class="rating__stroke">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                          </div>
                                      <?php } ?>

                                      <?php for ($i = $total_rating; $i < 5; $i++) { ?>
                                          <svg class="rating__star" width="13px" height="12px">
                                              <g class="rating__fill">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}">
                                                  </use>
                                              </g>
                                              <g class="rating__stroke">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                  </use>
                                              </g>
                                          </svg>
                                          <div class="rating__star rating__star--only-edge">
                                              <div class="rating__fill">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                              <div class="rating__stroke">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                          </div>
                                      <?php } ?>

                                  </div>
                              </div>
                              <div class="product-card__rating-legend">{{$review_count}} </div>
                          </div>

                      </div>
                      <div class="product-card__actions">
                          <div class="product-card__availability">Availability: <span class="text-success">In
                                  Stock</span></div>
                          <div class="d-flex">
                          <div class="product-card__prices">{{currentCurrency($item->price)}} / {{$item->unit}}</div>
                          <div class="product-card__buttons ml-4">
                              <!--<button
                                              class="btn btn-primary product-card__addtocart" type="button">Add To
                                              Cart</button> <button
                                              class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                              type="button">Add To Cart</button> -->
                              <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="30px" height="30px" onclick="add_to_wishlist({{$item->id}})">
                                      <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                  </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                              <!-- <button
                                              class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                              type="button"><svg width="16px" height="16px">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                              </svg> <span
                                                  class="fake-svg-icon fake-svg-icon--compare-16"></span></button> -->
                          </div>
                          <!-- <div class="product-card__buttons">
                              @if(isset(Auth('customer')->user()->id) == false)
                              <a class="btn btn-outline-primary col-12" href="{{route('login')}}">Chat with Supplier</a>
                              @else
                              <a class="btn btn-outline-primary col-12" href="javascript:void(0);" class="chat-toggle" onclick="Chatpop('{{ $item->user->id }}','{{ $item->user->name }}')" data-id="{{ $item->user->id }}" data-user="{{ $item->user->name }}">Chat with Supplier</a>


                              <input type="hidden" id="current_user" value="{{ Auth('customer')->user()->id }}" />
                              <input type="hidden" id="pusher_app_key" value="678afaa42e4cd7f96249" />
                              <input type="hidden" id="pusher_cluster" value="ap2" />
                              @endif
                          </div> -->
                          </div>
                      </div>
                  </div>
                  </div>
                  @endif
                @endforeach
            </div>

        </div>
    </div>
    <div class="block block-products-carousel" data-layout="grid-4">
        <div class="container">
            <div class="block-header text-center">
                <h3 class="block-header__title d-inline mx-auto">Special Deals <span style="color:#F18819"> Products </span></h3>
            </div>
            <div class="row">
              @if(count($special_deals) < 1)
              <p class="text-center">Products Not Found</p>
              @endif
                @foreach($special_deals as $item)
                  @if($item->user)
                  <div class="col-md-3 my-2">
                  <div class="product-card "><button class="product-card__quickview" onclick="return window.location.href='/product-details/{{$item->id}}'" type="button"><svg width="16px" height="16px">
                              <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                          </svg> <span class="fake-svg-icon"></span></button>
                      <div class="product-card__badges-list">
                          <div class="product-card__badge product-card__badge--new">New</div>
                      </div>
                      <div class="product-card__image"><a href="/product-details/{{$item->id}}"><img src="{{ asset('storage/uploads/Products-Images/' . $item->image1) }}" alt=""></a></div>
                      <div class="product-card__info">
                          <div class="product-card__name"><a href="/product-details/{{$item->id}}">{{ucwords($item->name)}}</a></div>
                          <div class="d-flex">
                              <div class="flag_custom">
                                  {{ flag(getCountryCode($item->user->countries->name)) }}
                              </div>
                              <h6 class="ml-2 mt-1"> {{$item->user->countries->name}}</h6>
                              <h6 class="ml-4 mt-1">Stock :<span class="ml-2">{{$item->stock_quantity}}</span></h6>
                          </div>
                          <div class="product-card__rating">
                              <div class="rating">

                                  <?php
                                  $review_count = App\Models\Reviews::where('product_id', $item->id)->count();
                                  $total_rating = App\Models\Reviews::where('product_id', $item->id)->sum('rating');
                                  $total_rating = $review_count > 0 ? $total_rating / $review_count : $total_rating;
                                  $total_rating = round($total_rating);
                                  ?>


                                  <div class="rating__body">

                                      <?php for ($i = 0; $i < $total_rating; $i++) { ?>
                                          <svg class="rating__star rating__star--active" width="13px" height="12px">
                                              <g class="rating__fill">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}">
                                                  </use>
                                              </g>
                                              <g class="rating__stroke">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                  </use>
                                              </g>
                                          </svg>
                                          <div class="rating__star rating__star--only-edge rating__star--active">
                                              <div class="rating__fill">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                              <div class="rating__stroke">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                          </div>
                                      <?php } ?>

                                      <?php for ($i = $total_rating; $i < 5; $i++) { ?>
                                          <svg class="rating__star" width="13px" height="12px">
                                              <g class="rating__fill">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}">
                                                  </use>
                                              </g>
                                              <g class="rating__stroke">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                  </use>
                                              </g>
                                          </svg>
                                          <div class="rating__star rating__star--only-edge">
                                              <div class="rating__fill">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                              <div class="rating__stroke">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                          </div>
                                      <?php } ?>

                                  </div>
                              </div>
                              <div class="product-card__rating-legend">{{$review_count}} </div>
                          </div>

                      </div>
                      <div class="product-card__actions">
                          <div class="product-card__availability">Availability: <span class="text-success">In
                                  Stock</span></div>
                          <div class="d-flex">
                          <div class="product-card__prices">{{currentCurrency($item->price)}} / {{$item->unit}}</div>
                          <div class="product-card__buttons ml-4">
                              <!--<button
                                              class="btn btn-primary product-card__addtocart" type="button">Add To
                                              Cart</button> <button
                                              class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                              type="button">Add To Cart</button> -->
                              <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="30px" height="30px" onclick="add_to_wishlist({{$item->id}})">
                                      <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                  </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                              <!-- <button
                                              class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                              type="button"><svg width="16px" height="16px">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                              </svg> <span
                                                  class="fake-svg-icon fake-svg-icon--compare-16"></span></button> -->
                          </div>
                          <!-- <div class="product-card__buttons">
                              @if(isset(Auth('customer')->user()->id) == false)
                              <a class="btn btn-outline-primary col-12" href="{{route('login')}}">Chat with Supplier</a>
                              @else
                              <a class="btn btn-outline-primary col-12" href="javascript:void(0);" class="chat-toggle" onclick="Chatpop('{{ $item->user->id }}','{{ $item->user->name }}')" data-id="{{ $item->user->id }}" data-user="{{ $item->user->name }}">Chat with Supplier</a>


                              <input type="hidden" id="current_user" value="{{ Auth('customer')->user()->id }}" />
                              <input type="hidden" id="pusher_app_key" value="678afaa42e4cd7f96249" />
                              <input type="hidden" id="pusher_cluster" value="ap2" />
                              @endif
                          </div> -->
                          </div>
                      </div>
                  </div>
                  </div>
                  @endif
                @endforeach
            </div>

        </div>
    </div>
    <div class="block block-products-carousel" data-layout="grid-4">
        <div class="container">
            <div class="block-header text-center">
                <h3 class="block-header__title d-inline mx-auto">Limited Time Deal <span style="color:#F18819"> Products </span></h3>
            </div>
            <div class="row">
              @if(count($special_deals) < 1)
              <p class="text-center">Products Not Found</p>
              @endif
                @foreach($limited_time_products as $item)
                  @if($item->user)
                  <div class="col-md-3 my-2">
                  <div class="product-card "><button class="product-card__quickview" onclick="return window.location.href='/product-details/{{$item->id}}'" type="button"><svg width="16px" height="16px">
                              <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                          </svg> <span class="fake-svg-icon"></span></button>
                      <div class="product-card__badges-list">
                          <div class="product-card__badge product-card__badge--new">New</div>
                      </div>
                      <div class="product-card__image"><a href="/product-details/{{$item->id}}"><img src="{{ asset('storage/uploads/Products-Images/' . $item->image1) }}" alt=""></a></div>
                      <div class="product-card__info">
                          <div class="product-card__name"><a href="/product-details/{{$item->id}}">{{ucwords($item->name)}}</a></div>
                          <div class="d-flex">
                              <div class="flag_custom">
                                  {{ flag(getCountryCode($item->user->countries->name)) }}
                              </div>
                              <h6 class="ml-2 mt-1"> {{$item->user->countries->name}}</h6>
                              <h6 class="ml-4 mt-1">Stock :<span class="ml-2">{{$item->stock_quantity}}</span></h6>
                          </div>
                          @if(!is_null($item->limited_time))
                          <div class="countdown text-brand" data-countdown="{{ $item->limited_time->format('Y/m/d h:i:s') }}">
                          </div>
                          @endif
                          <div class="product-card__rating">
                              <div class="rating">

                                  <?php
                                  $review_count = App\Models\Reviews::where('product_id', $item->id)->count();
                                  $total_rating = App\Models\Reviews::where('product_id', $item->id)->sum('rating');
                                  $total_rating = $review_count > 0 ? $total_rating / $review_count : $total_rating;
                                  $total_rating = round($total_rating);
                                  ?>


                                  <div class="rating__body">

                                      <?php for ($i = 0; $i < $total_rating; $i++) { ?>
                                          <svg class="rating__star rating__star--active" width="13px" height="12px">
                                              <g class="rating__fill">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}">
                                                  </use>
                                              </g>
                                              <g class="rating__stroke">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                  </use>
                                              </g>
                                          </svg>
                                          <div class="rating__star rating__star--only-edge rating__star--active">
                                              <div class="rating__fill">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                              <div class="rating__stroke">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                          </div>
                                      <?php } ?>

                                      <?php for ($i = $total_rating; $i < 5; $i++) { ?>
                                          <svg class="rating__star" width="13px" height="12px">
                                              <g class="rating__fill">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}">
                                                  </use>
                                              </g>
                                              <g class="rating__stroke">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                  </use>
                                              </g>
                                          </svg>
                                          <div class="rating__star rating__star--only-edge">
                                              <div class="rating__fill">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                              <div class="rating__stroke">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                          </div>
                                      <?php } ?>

                                  </div>
                              </div>
                              <div class="product-card__rating-legend">{{$review_count}} </div>
                          </div>

                      </div>
                      <div class="product-card__actions">
                          <div class="product-card__availability">Availability: <span class="text-success">In
                                  Stock</span></div>
                          <div class="d-flex">
                          <div class="product-card__prices">{{currentCurrency($item->price)}} / {{$item->unit}}</div>
                          <div class="product-card__buttons ml-4">
                              <!--<button
                                              class="btn btn-primary product-card__addtocart" type="button">Add To
                                              Cart</button> <button
                                              class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                              type="button">Add To Cart</button> -->
                              <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="30px" height="30px" onclick="add_to_wishlist({{$item->id}})">
                                      <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                  </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                              <!-- <button
                                              class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                              type="button"><svg width="16px" height="16px">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                              </svg> <span
                                                  class="fake-svg-icon fake-svg-icon--compare-16"></span></button> -->
                          </div>
                          <!-- <div class="product-card__buttons">
                              @if(isset(Auth('customer')->user()->id) == false)
                              <a class="btn btn-outline-primary col-12" href="{{route('login')}}">Chat with Supplier</a>
                              @else
                              <a class="btn btn-outline-primary col-12" href="javascript:void(0);" class="chat-toggle" onclick="Chatpop('{{ $item->user->id }}','{{ $item->user->name }}')" data-id="{{ $item->user->id }}" data-user="{{ $item->user->name }}">Chat with Supplier</a>


                              <input type="hidden" id="current_user" value="{{ Auth('customer')->user()->id }}" />
                              <input type="hidden" id="pusher_app_key" value="678afaa42e4cd7f96249" />
                              <input type="hidden" id="pusher_cluster" value="ap2" />
                              @endif
                          </div> -->
                          </div>
                      </div>
                  </div>
                  </div>
                  @endif
                @endforeach
            </div>

        </div>
    </div>

    <div class="block block-products-carousel" data-layout="grid-4">
        <div class="container">
            <div class="block-header text-center">
                <h3 class="block-header__title d-inline mx-auto">Hurry Deals <span style="color:#F18819"> Products </span></h3>
            </div>
            <div class="row">
              @if(count($hurry_deals) < 1)
              <p class="text-center">Products Not Found</p>
              @endif
                @foreach($hurry_deals as $item)
                  @if($item->user)
                  <div class="col-md-3 my-2">
                  <div class="product-card "><button class="product-card__quickview" onclick="return window.location.href='/product-details/{{$item->id}}'" type="button"><svg width="16px" height="16px">
                              <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                          </svg> <span class="fake-svg-icon"></span></button>
                      <div class="product-card__badges-list">
                          <div class="product-card__badge product-card__badge--new">New</div>
                      </div>
                      <!-- <div class="product-card__image"><a href="/product-details/{{$item->id}}"><img src="{{ asset('images/product.jfif') }}" alt=""></a></div> -->
                      <div class="product-card__image"><a href="/product-details/{{$item->id}}"><img src="{{ asset('storage/uploads/Products-Images/' . $item->image1) }}" alt=""></a></div>
                      <div class="product-card__info">
                          <div class="product-card__name"><a href="/product-details/{{$item->id}}">{{ucwords($item->name)}}</a></div>
                          <div class="d-flex">
                              <div class="flag_custom">
                                  {{ flag(getCountryCode($item->user->countries->name)) }}
                              </div>
                              <h6 class="ml-2 mt-1"> {{$item->user->countries->name}}</h6>
                              <h6 class="ml-4 mt-1">Stock :<span class="ml-2">{{$item->stock_quantity}}</span></h6>
                          </div>
                          <div class="product-card__rating">
                              <div class="rating">

                                  <?php
                                  $review_count = App\Models\Reviews::where('product_id', $item->id)->count();
                                  $total_rating = App\Models\Reviews::where('product_id', $item->id)->sum('rating');
                                  $total_rating = $review_count > 0 ? $total_rating / $review_count : $total_rating;
                                  $total_rating = round($total_rating);
                                  ?>


                                  <div class="rating__body">

                                      <?php for ($i = 0; $i < $total_rating; $i++) { ?>
                                          <svg class="rating__star rating__star--active" width="13px" height="12px">
                                              <g class="rating__fill">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}">
                                                  </use>
                                              </g>
                                              <g class="rating__stroke">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                  </use>
                                              </g>
                                          </svg>
                                          <div class="rating__star rating__star--only-edge rating__star--active">
                                              <div class="rating__fill">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                              <div class="rating__stroke">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                          </div>
                                      <?php } ?>

                                      <?php for ($i = $total_rating; $i < 5; $i++) { ?>
                                          <svg class="rating__star" width="13px" height="12px">
                                              <g class="rating__fill">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}">
                                                  </use>
                                              </g>
                                              <g class="rating__stroke">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                  </use>
                                              </g>
                                          </svg>
                                          <div class="rating__star rating__star--only-edge">
                                              <div class="rating__fill">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                              <div class="rating__stroke">
                                                  <div class="fake-svg-icon"></div>
                                              </div>
                                          </div>
                                      <?php } ?>

                                  </div>
                              </div>
                              <div class="product-card__rating-legend">{{$review_count}} </div>
                          </div>

                      </div>
                      <div class="product-card__actions">
                          <div class="product-card__availability">Availability: <span class="text-success">In
                                  Stock</span></div>
                          <div class="d-flex">
                          <div class="product-card__prices">{{currentCurrency($item->price)}} / {{$item->unit}}</div>
                          <div class="product-card__buttons ml-4">
                              <!--<button
                                              class="btn btn-primary product-card__addtocart" type="button">Add To
                                              Cart</button> <button
                                              class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                              type="button">Add To Cart</button> -->
                              <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="30px" height="30px" onclick="add_to_wishlist({{$item->id}})">
                                      <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                  </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                              <!-- <button
                                              class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                              type="button"><svg width="16px" height="16px">
                                                  <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                              </svg> <span
                                                  class="fake-svg-icon fake-svg-icon--compare-16"></span></button> -->
                          </div>
                          <!-- <div class="product-card__buttons">
                              @if(isset(Auth('customer')->user()->id) == false)
                              <a class="btn btn-outline-primary col-12" href="{{route('login')}}">Chat with Supplier</a>
                              @else
                              <a class="btn btn-outline-primary col-12" href="javascript:void(0);" class="chat-toggle" onclick="Chatpop('{{ $item->user->id }}','{{ $item->user->name }}')" data-id="{{ $item->user->id }}" data-user="{{ $item->user->name }}">Chat with Supplier</a>


                              <input type="hidden" id="current_user" value="{{ Auth('customer')->user()->id }}" />
                              <input type="hidden" id="pusher_app_key" value="678afaa42e4cd7f96249" />
                              <input type="hidden" id="pusher_cluster" value="ap2" />
                              @endif
                          </div> -->
                          </div>
                      </div>
                  </div>
                  </div>
                  @endif
                @endforeach
            </div>

        </div>
    </div>


    <div class="block block-products-carousel" data-layout="grid-4" >
        <div class="container">
            <div class="block-header text-center">
                <h3 class="block-header__title d-inline mx-auto">Auction <span style="color:#F18819"> Products </span></h3>
            </div>
            <div class="row">
              @if(count($auctions) < 1)
              <p class="text-center">Products Not Found</p>
              @endif
                @foreach($auctions as $product)
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3" >
                                            <div class="product-card"><button class="product-card__quickview"
                                                    type="button" onclick="return window.location.href='/auction-details/{{$product->product->id}}'"><svg width="16px" height="16px">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__image"><a href="/auction-details/{{$product->product->id}}"><img
                                                            src="{{ asset('storage/uploads/Products-Images/' . $product->product->image1) }}" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="/auction-details/{{$product->product->id}}">{{$product->product->name}}</a></div>
                                            <div class="product-card__rating">
                                                <div class="rating">

                                                    <?php
                                                        $review_count = App\Models\Reviews::where('product_id', $product->product->id)->count();
                                                        $total_rating = App\Models\Reviews::where('product_id', $product->product->id)->sum('rating');
                                                        $total_rating = $review_count>0?$total_rating/$review_count:$total_rating;
                                                        $total_rating = round($total_rating);
                                                    ?>


                                <div class="rating__body">

                                                            <?php for($i = 0; $i<$total_rating; $i++){ ?>
                                                            <svg class="rating__star rating__star--active" width="13px"
                                                                height="12px">
                                                                <g class="rating__fill">
                                                                    <use
                                                                        xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}">
                                                                    </use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use
                                                                        xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                                    </use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <?php } ?>

                                                            <?php for($i = $total_rating; $i<5; $i++){ ?>
                                                            <svg class="rating__star" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use
                                                                        xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}">
                                                                    </use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use
                                                                        xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                                    </use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <?php } ?>

                                </div>
                                                </div>
                                                <div class="product-card__rating-legend">{{$review_count}} Reviews</div>
                                            </div>
                                                </div>
                                                <div class="product-card__actions">
                                                    <div class="product-card__availability">Availability: <span
                                                            class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices" style="font-size: 21px;">Minimum Bid : {{currentCurrency($product->min_bid)}}</div>
                                                    @php
                                                        $expire_at = date('d H:i:s', strtotime($product->expire_at));
                                                    @endphp
                                                    <div class="product-card__prices" style="font-size: 21px;">Available Until :
                      {{-- <span class='countdown' data-countdown="{{$expire_at}}" value='{{$expire_at}}'>{{$product->expire_at}}</span> --}}                                                                    <div class="filter-categories__counter" data-countdown="{{$expire_at}}">{{$product->expire_at}}</div>
                  </div>
                                                    <div class="product-card__buttons">

                                                        {{-- <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"> --}}
                                                            {{-- <svg width="16px" height="16px">
                                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                                            </svg>  --}}
                                                            {{-- <span
                                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                                        <button
                                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                            type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                                            </svg> <span
                                                                class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                            </button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                @endforeach
            </div>
            <!-- <div class="block-products-carousel__slider">
                <div class="block-products-carousel__preloader"></div>
                <div class="owl-carousel">
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                </div>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-1.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Electric Planer
                                            Brandix KL370090G 300 Watts</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$749.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--hot">Hot</div>
                                </div>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-2.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Undefined Tool IRadix
                                            DPS3000SY 2700 Watts</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">11 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$1,019.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-3.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Drill Screwdriver
                                            Brandix ALX7054 200 Watts</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$850.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--sale">Sale</div>
                                </div>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-4.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Drill Series 3
                                            Brandix KSR4590PQS 1500 Watts</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">7 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices"><span
                                            class="product-card__new-price">$949.00</span> <span
                                            class="product-card__old-price">$1189.00</span></div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-5.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Router Power
                                            Tool 2017ERXPK</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$1,700.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-6.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Drilling
                                            Machine DM2019KW4 4kW</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">7 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$3,199.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-7.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Pliers</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">4 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$24.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-8.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Water Hose 40cm</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">4 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$15.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-9.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Spanner Wrench</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$19.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-10.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Water Tap</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">11 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$15.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-11.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Hand Tool Kit</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$149.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-12.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Ash's Chainsaw
                                            3.5kW</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">11 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$666.99</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-13.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Angle Grinder
                                            KZX3890PQW</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">4 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$649.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-14.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Air
                                            Compressor DELTAKX500</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">7 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$1,800.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-15.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Electric
                                            Jigsaw JIG7000BQ</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">4 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$290.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-16.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Screwdriver
                                            SCREW1500ACC</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">11 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$1,499.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- .block-products-carousel / end -->
    <!-- .block-banner -->
    <div class="block block-banner p-2" style="background: #3d464d; height:auto;">
        <div class="container">
                <!-- <div class="block-banner__image block-banner__image--desktop" style='background-image: url("{{ asset('frontend/images/banners/banner-1.jpg') }}")'></div>
                <div class="block-banner__image block-banner__image--mobile" style='background-image: url("{{ asset('frontend/images/banners/banner-1-mobile.jpg')}}")'></div> -->

                <div class="row p-4">
                    <div class="col-md-6 col-lg-6 col-sm-12 text-left mb-4 ">
                        <h2 style="color: #F18819;">Call To Action</h2>
                        <p class="text-light" style="line-height:30px; font-size:15px;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias deleniti consectetur iure possimus totam temporibus quidem iste sit.</p>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 text-light" style="line-height:40px;">
                        <h6><span style="color: #F18819; font-size:30px;"> Phone : </span> <span style="font-size: 20px;">000-000-000</span></h6>
                        <h6><span style="color: #F18819; font-size:30px;"> Email : </span> <span style="font-size: 20px;">tradersreadystock@admin.com</span></h6>
                        <a href="/contact-us" class="btn mt-4 cta_btn ">Conatact Us</a>
                    </div>
                </div>
            </div>
    </div><!-- .block-banner / end -->
    <!-- .block-products -->
    <!-- <div class="block block-products block-products--layout--large-first">
        <div class="container">
            <div class="block-header">
                <h3 class="block-header__title">BestSuppliers</h3>
                <div class="block-header__divider"></div>
            </div>
            <div class="block-products__body">
                <div class="block-products__featured">
                    <div class="block-products__featured-item">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                    width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                </svg> <span class="fake-svg-icon"></span></button>
                            <div class="product-card__badges-list">
                                <div class="product-card__badge product-card__badge--new">New</div>
                            </div>
                            <div class="product-card__image"><a href="/product-details"><img
                                        src="{{ asset('frontend/images/products/product-1.jpg') }}" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="/product-details">Electric Planer Brandix
                                        KL370090G 300 Watts</a></div>
                                <div class="product-card__rating">
                                    <div class="rating">
                                        <div class="rating__body"><svg class="rating__star rating__star--active"
                                                width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__rating-legend">9 Reviews</div>
                                </div>
                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In
                                        Stock</span></div>
                                <div class="product-card__prices">$749.00</div>
                                <div class="product-card__buttons"><button
                                        class="btn btn-primary product-card__addtocart" type="button">Add To
                                        Cart</button> <button
                                        class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                        type="button">Add To Cart</button> <button
                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                        type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button
                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                        type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products__list">
                    <div class="block-products__list-item">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                    width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                </svg> <span class="fake-svg-icon"></span></button>
                            <div class="product-card__badges-list">
                                <div class="product-card__badge product-card__badge--hot">Hot</div>
                            </div>
                            <div class="product-card__image"><a href="/product-details"><img
                                        src="{{ asset('frontend/images/products/product-2.jpg') }}" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="/product-details">Undefined Tool IRadix
                                        DPS3000SY 2700 Watts</a></div>
                                <div class="product-card__rating">
                                    <div class="rating">
                                        <div class="rating__body"><svg class="rating__star rating__star--active"
                                                width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__rating-legend">11 Reviews</div>
                                </div>
                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In
                                        Stock</span></div>
                                <div class="product-card__prices">$1,019.00</div>
                                <div class="product-card__buttons"><button
                                        class="btn btn-primary product-card__addtocart" type="button">Add To
                                        Cart</button> <button
                                        class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                        type="button">Add To Cart</button> <button
                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                        type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button
                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                        type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products__list-item">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                    width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                </svg> <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image"><a href="/product-details"><img
                                        src="{{ asset('frontend/images/products/product-3.jpg') }}" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="/product-details">Drill Screwdriver Brandix
                                        ALX7054 200 Watts</a></div>
                                <div class="product-card__rating">
                                    <div class="rating">
                                        <div class="rating__body"><svg class="rating__star rating__star--active"
                                                width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__rating-legend">9 Reviews</div>
                                </div>
                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In
                                        Stock</span></div>
                                <div class="product-card__prices">$850.00</div>
                                <div class="product-card__buttons"><button
                                        class="btn btn-primary product-card__addtocart" type="button">Add To
                                        Cart</button> <button
                                        class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                        type="button">Add To Cart</button> <button
                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                        type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button
                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                        type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products__list-item">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                    width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                </svg> <span class="fake-svg-icon"></span></button>
                            <div class="product-card__badges-list">
                                <div class="product-card__badge product-card__badge--sale">Sale</div>
                            </div>
                            <div class="product-card__image"><a href="/product-details"><img
                                        src="{{ asset('frontend/images/products/product-4.jpg') }}" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="/product-details">Drill Series 3 Brandix
                                        KSR4590PQS 1500 Watts</a></div>
                                <div class="product-card__rating">
                                    <div class="rating">
                                        <div class="rating__body"><svg class="rating__star rating__star--active"
                                                width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__rating-legend">7 Reviews</div>
                                </div>
                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In
                                        Stock</span></div>
                                <div class="product-card__prices"><span class="product-card__new-price">$949.00</span>
                                    <span class="product-card__old-price">$1189.00</span></div>
                                <div class="product-card__buttons"><button
                                        class="btn btn-primary product-card__addtocart" type="button">Add To
                                        Cart</button> <button
                                        class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                        type="button">Add To Cart</button> <button
                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                        type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button
                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                        type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products__list-item">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                    width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                </svg> <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image"><a href="/product-details"><img
                                        src="{{ asset('frontend/images/products/product-5.jpg') }}" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="/product-details">Brandix Router Power Tool
                                        2017ERXPK</a></div>
                                <div class="product-card__rating">
                                    <div class="rating">
                                        <div class="rating__body"><svg class="rating__star rating__star--active"
                                                width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__rating-legend">9 Reviews</div>
                                </div>
                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In
                                        Stock</span></div>
                                <div class="product-card__prices">$1,700.00</div>
                                <div class="product-card__buttons"><button
                                        class="btn btn-primary product-card__addtocart" type="button">Add To
                                        Cart</button> <button
                                        class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                        type="button">Add To Cart</button> <button
                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                        type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button
                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                        type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products__list-item">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                    width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                </svg> <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image"><a href="/product-details"><img
                                        src="{{ asset('frontend/images/products/product-6.jpg') }}" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="/product-details">Brandix Drilling Machine
                                        DM2019KW4 4kW</a></div>
                                <div class="product-card__rating">
                                    <div class="rating">
                                        <div class="rating__body"><svg class="rating__star rating__star--active"
                                                width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__rating-legend">7 Reviews</div>
                                </div>
                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In
                                        Stock</span></div>
                                <div class="product-card__prices">$3,199.00</div>
                                <div class="product-card__buttons"><button
                                        class="btn btn-primary product-card__addtocart" type="button">Add To
                                        Cart</button> <button
                                        class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                        type="button">Add To Cart</button> <button
                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                        type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button
                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                        type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products__list-item">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                    width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                </svg> <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image"><a href="/product-details"><img
                                        src="{{ asset('frontend/images/products/product-7.jpg') }}" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="/product-details">Brandix Pliers</a></div>
                                <div class="product-card__rating">
                                    <div class="rating">
                                        <div class="rating__body"><svg class="rating__star rating__star--active"
                                                width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div><svg class="rating__star" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                    </use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__rating-legend">4 Reviews</div>
                                </div>
                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span class="text-success">In
                                        Stock</span></div>
                                <div class="product-card__prices">$24.00</div>
                                <div class="product-card__buttons"><button
                                        class="btn btn-primary product-card__addtocart" type="button">Add To
                                        Cart</button> <button
                                        class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                        type="button">Add To Cart</button> <button
                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                        type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button
                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                        type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- .block-products / end -->
    <!-- .block-categories -->
    <div class="block block--highlighted block-categories block-categories--layout--classic">
        <div class="container">
            <div class="block-header">
                <h3 class="block-header__title  d-inline mx-auto">Popular <span style="color:#F18819"> Categories </span></h3>

            </div>
            <div class="block-categories__list">
                <div class="block-categories__item category-card category-card--layout--classic">
                    <div class="category-card__body">
                        <div class="category-card__image"><a href="#"><img src="{{ asset('frontend/images/categories/category-1.jpg') }}" alt=""></a></div>
                        <div class="category-card__content">
                            <div class="category-card__name"><a href="#">Power Tools</a></div>
                            <ul class="category-card__links">
                                <li><a href="#">Screwdrivers</a></li>
                                <li><a href="#">Milling Cutters</a></li>
                                <li><a href="#">Sanding Machines</a></li>
                                <li><a href="#">Wrenches</a></li>
                                <li><a href="#">Drills</a></li>
                            </ul>
                            <div class="category-card__all"><a href="#">Show All</a></div>
                            <div class="category-card__products">572 Products</div>
                        </div>
                    </div>
                </div>
                <div class="block-categories__item category-card category-card--layout--classic">
                    <div class="category-card__body">
                        <div class="category-card__image"><a href="#"><img src="{{ asset('frontend/images/categories/category-2.jpg') }}" alt=""></a></div>
                        <div class="category-card__content">
                            <div class="category-card__name"><a href="#">Hand Tools</a></div>
                            <ul class="category-card__links">
                                <li><a href="#">Screwdrivers</a></li>
                                <li><a href="#">Hammers</a></li>
                                <li><a href="#">Spanners</a></li>
                                <li><a href="#">Handsaws</a></li>
                                <li><a href="#">Paint Tools</a></li>
                            </ul>
                            <div class="category-card__all"><a href="#">Show All</a></div>
                            <div class="category-card__products">134 Products</div>
                        </div>
                    </div>
                </div>
                <div class="block-categories__item category-card category-card--layout--classic">
                    <div class="category-card__body">
                        <div class="category-card__image"><a href="#"><img src="{{ asset('frontend/images/categories/category-4.jpg') }}" alt=""></a></div>
                        <div class="category-card__content">
                            <div class="category-card__name"><a href="#">Machine Tools</a></div>
                            <ul class="category-card__links">
                                <li><a href="#">Lathes</a></li>
                                <li><a href="#">Milling Machines</a></li>
                                <li><a href="#">Grinding Machines</a></li>
                                <li><a href="#">CNC Machines</a></li>
                                <li><a href="#">Sharpening Machines</a></li>
                            </ul>
                            <div class="category-card__all"><a href="#">Show All</a></div>
                            <div class="category-card__products">301 Products</div>
                        </div>
                    </div>
                </div>
                <div class="block-categories__item category-card category-card--layout--classic">
                    <div class="category-card__body">
                        <div class="category-card__image"><a href="#"><img src="{{ asset('frontend/images/categories/category-3.jpg') }}" alt=""></a></div>
                        <div class="category-card__content">
                            <div class="category-card__name"><a href="#">Power Machinery</a></div>
                            <ul class="category-card__links">
                                <li><a href="#">Generators</a></li>
                                <li><a href="#">Compressors</a></li>
                                <li><a href="#">Winches</a></li>
                                <li><a href="#">Plasma Cutting</a></li>
                                <li><a href="#">Electric Motors</a></li>
                            </ul>
                            <div class="category-card__all"><a href="#">Show All</a></div>
                            <div class="category-card__products">79 Products</div>
                        </div>
                    </div>
                </div>
                <div class="block-categories__item category-card category-card--layout--classic">
                    <div class="category-card__body">
                        <div class="category-card__image"><a href="#"><img src="{{ asset('frontend/images/categories/category-5.jpg') }}" alt=""></a></div>
                        <div class="category-card__content">
                            <div class="category-card__name"><a href="#">Measurement</a></div>
                            <ul class="category-card__links">
                                <li><a href="#">Tape Measure</a></li>
                                <li><a href="#">Theodolites</a></li>
                                <li><a href="#">Thermal Imagers</a></li>
                                <li><a href="#">Calipers</a></li>
                                <li><a href="#">Levels</a></li>
                            </ul>
                            <div class="category-card__all"><a href="#">Show All</a></div>
                            <div class="category-card__products">366 Products</div>
                        </div>
                    </div>
                </div>
                <div class="block-categories__item category-card category-card--layout--classic">
                    <div class="category-card__body">
                        <div class="category-card__image"><a href="#"><img src="{{ asset('frontend/images/categories/category-6.jpg') }}" alt=""></a></div>
                        <div class="category-card__content">
                            <div class="category-card__name"><a href="#">Clothes and PPE</a></div>
                            <ul class="category-card__links">
                                <li><a href="#">Winter Workwear</a></li>
                                <li><a href="#">Summer Workwear</a></li>
                                <li><a href="#">Helmets</a></li>
                                <li><a href="#">Belts and Bags</a></li>
                                <li><a href="#">Work Shoes</a></li>
                            </ul>
                            <div class="category-card__all"><a href="#">Show All</a></div>
                            <div class="category-card__products">81 Products</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .block-categories / end -->
    <!-- .block-products-carousel -->
    <div class="block block-products-carousel" data-layout="horizontal">
        <div class="container">
            <div class="block-header">
                <h3 class="block-header__title  d-inline mx-auto">New <span style="color:#F18819"> Arrivals </span></h3>

                <!-- <ul class="block-header__groups-list">
                    <li><button type="button" class="block-header__group block-header__group--active">All</button></li>
                    <li><button type="button" class="block-header__group">Power Tools</button></li>
                    <li><button type="button" class="block-header__group">Hand Tools</button></li>
                    <li><button type="button" class="block-header__group">Plumbing</button></li>
                </ul> -->
                <!-- <div class="block-header__arrows-list"><button class="block-header__arrow block-header__arrow--left" type="button"><svg width="7px" height="11px">
                            <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-left-7x11') }}"></use>
                        </svg></button> <button class="block-header__arrow block-header__arrow--right" type="button"><svg width="7px" height="11px">
                            <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-7x11') }}"></use>
                        </svg></button></div> -->
            </div>
            <div class="row">
                @foreach($newArrivals as $item)
                <div class="product-card col-md-4"><button class="product-card__quickview" onclick="return window.location.href='/product-details/{{$item->id}}'" type="button"><svg width="16px" height="16px">
                            <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                        </svg> <span class="fake-svg-icon"></span></button>
                    <div class="product-card__image"><a href="/product-details/{{$item->id}}"><img src="{{ asset('storage/uploads/Products-Images/' . $item->image1) }}" alt=""></a></div>
                    <div class="product-card__info">
                        <div class="product-card__name"><a href="/product-details/{{$item->id}}">{{ucwords($item->name)}}</a></div>
                        <div class="d-flex">
                            <div class="flag_custom">
                                {{ flag(getCountryCode($item->user->countries->name)) }}
                            </div>
                            <h6 class="ml-2 mt-1"> {{$item->user->countries->name}}</h6>
                            <h6 class="ml-2 mt-1">Stock:<span class="ml-2">{{$item->stock_quantity}}</span> </h6>
                        </div>
                        <div class="product-card__rating">
                            <div class="rating">

                                <?php
                                $review_count = App\Models\Reviews::where('product_id', $item->id)->count();
                                $total_rating = App\Models\Reviews::where('product_id', $item->id)->sum('rating');
                                $total_rating = $review_count > 0 ? $total_rating / $review_count : $total_rating;
                                $total_rating = round($total_rating);
                                ?>


                                <div class="rating__body">

                                    <?php for ($i = 0; $i < $total_rating; $i++) { ?>
                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                            <g class="rating__fill">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}">
                                                </use>
                                            </g>
                                            <g class="rating__stroke">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                </use>
                                            </g>
                                        </svg>
                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                            <div class="rating__fill">
                                                <div class="fake-svg-icon"></div>
                                            </div>
                                            <div class="rating__stroke">
                                                <div class="fake-svg-icon"></div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php for ($i = $total_rating; $i < 5; $i++) { ?>
                                        <svg class="rating__star" width="13px" height="12px">
                                            <g class="rating__fill">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}">
                                                </use>
                                            </g>
                                            <g class="rating__stroke">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                </use>
                                            </g>
                                        </svg>
                                        <div class="rating__star rating__star--only-edge">
                                            <div class="rating__fill">
                                                <div class="fake-svg-icon"></div>
                                            </div>
                                            <div class="rating__stroke">
                                                <div class="fake-svg-icon"></div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="product-card__rating-legend">{{$review_count}} Reviews</div>
                        </div>

                    </div>
                    <div class="product-card__actions style="height:auto;">
                        <div class="product-card__availability">Availability: <span class="text-success">In
                                Stock</span></div>
                        <div style="color:#F18819; font-size:20px; font-weight:15px;">{{currentCurrency($item->price)}} / {{$item->unit}}</div>
                        <div class="product-card__buttons">
                            <!-- <button class="btn btn-primary product-card__addtocart" type="button">Add To
                                Cart</button>  -->
                                <!-- <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>  -->
                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- <div class="block-products-carousel__slider">
                <div class="block-products-carousel__preloader"></div>
                <div class="owl-carousel">
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview"  type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                </div>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-1.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Electric Planer
                                            Brandix KL370090G 300 Watts</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$749.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--hot">Hot</div>
                                </div>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-2.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Undefined Tool IRadix
                                            DPS3000SY 2700 Watts</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">11 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$1,019.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">

                        </div>
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--sale">Sale</div>
                                </div>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-4.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Drill Series 3
                                            Brandix KSR4590PQS 1500 Watts</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">7 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices"><span
                                            class="product-card__new-price">$949.00</span> <span
                                            class="product-card__old-price">$1189.00</span></div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-5.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Router Power
                                            Tool 2017ERXPK</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$1,700.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-6.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Drilling
                                            Machine DM2019KW4 4kW</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">7 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$3,199.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-7.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Pliers</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">4 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$24.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-8.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Water Hose 40cm</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">4 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$15.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-9.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Spanner Wrench</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$19.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-10.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Water Tap</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">11 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$15.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-11.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Hand Tool Kit</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$149.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-12.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Ash's Chainsaw
                                            3.5kW</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">11 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$666.99</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-13.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Angle Grinder
                                            KZX3890PQW</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">4 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$649.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-14.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Air
                                            Compressor DELTAKX500</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">7 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$1,800.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-15.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Electric
                                            Jigsaw JIG7000BQ</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">4 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$290.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                        width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img
                                            src="{{ asset('frontend/images/products/product-16.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Screwdriver
                                            SCREW1500ACC</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active"
                                                    width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px"
                                                    height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">11 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$1,499.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Add To Cart</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span
                                                class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div><!-- .block-products-carousel / end -->
    <!-- .block-posts -->
    <!-- <div class="block block-posts block-posts--layout--list-sm" data-layout="list-sm">
        <div class="container">
            <div class="block-header">
                <h3 class="block-header__title">Latest News</h3>
                <div class="block-header__divider"></div>
                <div class="block-header__arrows-list"><button class="block-header__arrow block-header__arrow--left" type="button"><svg width="7px" height="11px">
                            <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-left-7x11') }}"></use>
                        </svg></button> <button class="block-header__arrow block-header__arrow--right" type="button"><svg width="7px" height="11px">
                            <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-7x11') }}"></use>
                        </svg></button></div>
            </div>
            <div class="block-posts__slider">
                <div class="owl-carousel">
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="{{ asset('frontend/images/posts/post-1.jpg') }}" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">Special Offers</a></div>
                            <div class="post-card__name"><a href="#">Philosophy That Addresses Topics Such As
                                    Goodness</a></div>
                            <div class="post-card__date">October 19, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...</div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="{{ asset('frontend/images/posts/post-2.jpg') }}" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">Latest News</a></div>
                            <div class="post-card__name"><a href="#">Logic Is The Study Of Reasoning And
                                    Argument Part 2</a></div>
                            <div class="post-card__date">September 5, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...</div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="{{ asset('frontend/images/posts/post-3.jpg') }}" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">New Arrivals</a></div>
                            <div class="post-card__name"><a href="#">Some Philosophers Specialize In One Or More
                                    Historical Periods</a></div>
                            <div class="post-card__date">August 12, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...</div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="{{ asset('frontend/images/posts/post-4.jpg') }}" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">Special Offers</a></div>
                            <div class="post-card__name"><a href="#">A Variety Of Other Academic And
                                    Non-Academic Approaches Have Been Explored</a></div>
                            <div class="post-card__date">Jule 30, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...</div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="{{ asset('frontend/images/posts/post-5.jpg') }}" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">New Arrivals</a></div>
                            <div class="post-card__name"><a href="#">Germany Was The First Country To
                                    Professionalize Philosophy</a></div>
                            <div class="post-card__date">June 12, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...</div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="{{ asset('frontend/images/posts/post-6.jpg') }}" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">Special Offers</a></div>
                            <div class="post-card__name"><a href="#">Logic Is The Study Of Reasoning And
                                    Argument Part 1</a></div>
                            <div class="post-card__date">May 21, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...</div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="{{ asset('frontend/images/posts/post-7.jpg') }}" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">Special Offers</a></div>
                            <div class="post-card__name"><a href="#">Many Inquiries Outside Of Academia Are
                                    Philosophical In The Broad Sense</a></div>
                            <div class="post-card__date">April 3, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...</div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="{{ asset('frontend/images/posts/post-8.jpg') }}" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">Latest News</a></div>
                            <div class="post-card__name"><a href="#">An Advantage Of Digital Circuits When
                                    Compared To Analog Circuits</a></div>
                            <div class="post-card__date">Mart 29, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...</div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="{{ asset('frontend/images/posts/post-9.jpg') }}" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">New Arrivals</a></div>
                            <div class="post-card__name"><a href="#">A Digital Circuit Is Typically Constructed
                                    From Small Electronic Circuits</a></div>
                            <div class="post-card__date">February 10, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...</div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="{{ asset('frontend/images/posts/post-10.jpg') }}" alt=""></a></div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">Special Offers</a></div>
                            <div class="post-card__name"><a href="#">Engineers Use Many Methods To Minimize
                                    Logic Functions</a></div>
                            <div class="post-card__date">January 1, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...</div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    .block-posts / end -->
    <!-- .block-brands -->
    <!--<div class="block block-brands">-->
    <!--    <div class="container">-->
    <!--    <div class="block-header">-->
    <!--            <h3 class="block-header__title  d-inline mx-auto">Our <span style="color:#F18819"> Partners</span></h3>-->

    <!--        </div>-->
    <!--        <div class="block-brands__slider">-->
    <!--            <div class="owl-carousel">-->
    <!--                <div class="block-brands__item"><a href="#"><img src="{{ asset('frontend/images/logos/logo-1.png') }}" alt=""></a>-->
    <!--                </div>-->
    <!--                <div class="block-brands__item"><a href="#"><img src="{{ asset('frontend/images/logos/logo-2.png') }}" alt=""></a>-->
    <!--                </div>-->
    <!--                <div class="block-brands__item"><a href="#"><img src="{{ asset('frontend/images/logos/logo-3.png') }}" alt=""></a>-->
    <!--                </div>-->
    <!--                <div class="block-brands__item"><a href="#"><img src="{{ asset('frontend/images/logos/logo-4.png') }}" alt=""></a>-->
    <!--                </div>-->
    <!--                <div class="block-brands__item"><a href="#"><img src="{{ asset('frontend/images/logos/logo-5.png') }}" alt=""></a>-->
    <!--                </div>-->
    <!--                <div class="block-brands__item"><a href="#"><img src="{{ asset('frontend/images/logos/logo-6.png') }}" alt=""></a>-->
    <!--                </div>-->
    <!--                <div class="block-brands__item"><a href="#"><img src="{{ asset('frontend/images/logos/logo-7.png') }}" alt=""></a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="block">
                <div class="container">
                <div class="block-header">
                <h3 class="block-header__title  d-inline mx-auto">Contact <span style="color:#F18819"> Us </span></h3>

            </div>
                    <div class="card mb-0">

                        <div class="card-body contact-us">
                            <div class="contact-us__container">
                                <div class="row">

                                    <div class="col-12 col-lg-12">
                                        <h4 class="contact-us__header card-title">Leave us a Message</h4>
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-6"><label for="form-name">Your
                                                        Name</label> <input type="text" id="form-name"
                                                        class="form-control" placeholder="Your Name"></div>
                                                <div class="form-group col-md-6"><label for="form-email">Email</label>
                                                    <input type="email" id="form-email" class="form-control"
                                                        placeholder="Email Address"></div>
                                            </div>
                                            <div class="form-group"><label for="form-subject">Subject</label> <input
                                                    type="text" id="form-subject" class="form-control"
                                                    placeholder="Subject"></div>
                                            <div class="form-group"><label for="form-message">Message</label> <textarea
                                                    id="form-message" class="form-control" rows="4"></textarea></div>
                                            <button type="submit" class="btn btn-primary">Send Message</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     <!--.block-brands / end -->
    <!-- .block-product-columns -->
    <!-- <div class="block block-product-columns d-lg-block d-none">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="block-header">
                        <h3 class="block-header__title">Top Rated Products</h3>
                        <div class="block-header__divider"></div>
                    </div>
                    <div class="block-product-columns__column">
                        <div class="block-product-columns__item">
                            <div class="product-card product-card--layout--horizontal"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                </div>
                                <div class="product-card__image"><a href="/product-details"><img src="{{ asset('frontend/images/products/product-1.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Electric Planer
                                            Brandix KL370090G 300 Watts</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$749.00</div>
                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-product-columns__item">
                            <div class="product-card product-card--layout--horizontal"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--hot">Hot</div>
                                </div>
                                <div class="product-card__image"><a href="/product-details"><img src="{{ asset('frontend/images/products/product-2.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Undefined Tool IRadix
                                            DPS3000SY 2700 Watts</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">11 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$1,019.00</div>
                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-product-columns__item">
                            <div class="product-card product-card--layout--horizontal"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img src="{{ asset('frontend/images/products/product-3.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Drill Screwdriver
                                            Brandix ALX7054 200 Watts</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$850.00</div>
                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="block-header">
                        <h3 class="block-header__title">Special Offers</h3>
                        <div class="block-header__divider"></div>
                    </div>
                    <div class="block-product-columns__column">
                        <div class="block-product-columns__item">
                            <div class="product-card product-card--layout--horizontal"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--sale">Sale</div>
                                </div>
                                <div class="product-card__image"><a href="/product-details"><img src="{{ asset('frontend/images/products/product-4.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Drill Series 3
                                            Brandix KSR4590PQS 1500 Watts</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">7 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices"><span class="product-card__new-price">$949.00</span> <span class="product-card__old-price">$1189.00</span></div>
                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-product-columns__item">
                            <div class="product-card product-card--layout--horizontal"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img src="{{ asset('frontend/images/products/product-5.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Router Power
                                            Tool 2017ERXPK</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$1,700.00</div>
                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-product-columns__item">
                            <div class="product-card product-card--layout--horizontal"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img src="{{ asset('frontend/images/products/product-6.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Drilling
                                            Machine DM2019KW4 4kW</a></div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">7 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$3,199.00</div>
                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="block-header">
                        <h3 class="block-header__title">BestSuppliers</h3>
                        <div class="block-header__divider"></div>
                    </div>
                    <div class="block-product-columns__column">
                        <div class="block-product-columns__item">
                            <div class="product-card product-card--layout--horizontal"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img src="{{ asset('frontend/images/products/product-7.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Brandix Pliers</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">4 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$24.00</div>
                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-product-columns__item">
                            <div class="product-card product-card--layout--horizontal"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img src="{{ asset('frontend/images/products/product-8.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Water Hose 40cm</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">4 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$15.00</div>
                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-product-columns__item">
                            <div class="product-card product-card--layout--horizontal"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__image"><a href="/product-details"><img src="{{ asset('frontend/images/products/product-9.jpg') }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="/product-details">Spanner Wrench</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="rating">
                                            <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div><svg class="rating__star" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal') }}"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#star-normal-stroke') }}">
                                                        </use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">9 Reviews</div>
                                    </div>
                                    <ul class="product-card__features-list">
                                        <li>Speed: 750 RPM</li>
                                        <li>Power Source: Cordless-Electric</li>
                                        <li>Battery Cell Type: Lithium</li>
                                        <li>Voltage: 20 Volts</li>
                                        <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In
                                            Stock</span></div>
                                    <div class="product-card__prices">$19.00</div>
                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                            Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- .block-product-columns / end -->
</div><!-- site__body / end -->
@if(auth('customer')->check())
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
<a class="support-btn" href="javascript:void(0);" class="chat-toggle" onclick="supportpopup('{{ $support->id }}','Support')" data-id="{{ $support->id }}" data-user="{{ $support->name }}"> <i class="fas fa-comments"></i>
</a></div>
@endif
@if(auth('web')->check() )
@if( auth('web')->user()->usertype != "admin" )
<input type="hidden" id="current_user" value="{{ Auth('web')->id() }}" />

<input type="hidden" id="pusher_app_key" value="678afaa42e4cd7f96249" />
<input type="hidden" id="pusher_cluster" value="ap2" />
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script src="{{ asset('js/supportuser.js') }}">
</script>
@php
$support = supportid();
@endphp
@include('support-box')


<div class="support d-flex">
<a class="support-btn" href="javascript:void(0);" class="chat-toggle" onclick="supportpopup('{{ $support->id }}','Support')" data-id="{{ $support->id }}" data-user="{{ $support->name }}"> <i class="fas fa-comments"></i>
</a></div>
@endif
@endif



@endsection
