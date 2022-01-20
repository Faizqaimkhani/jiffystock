@extends('layouts.app')

@section('content')

<div class="page-header">
    <div class="page-header__container container">
        <div class="page-header__breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a> <svg class="breadcrumb-arrow" width="6px" height="9px">
                            <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-6x9') }}"></use>
                        </svg></li>
                      @if(isset($product->sub_category)==true)
                    <li class="breadcrumb-item"><a href="/category/products/{{$product->sub_category->id}}">{{$product->sub_category->name}}</a>
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                            <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-6x9') }}"></use>
                        </svg>
                    </li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">{{$product->name}}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="block">
    <div class="container">
        <div class="product product--layout--standard" data-layout="standard">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            <div class="product__content">
                <!-- .product__gallery -->
                <div class="product__gallery">
                    <div class="product-gallery">
                        <div class="product-gallery__featured">
                            <div class="owl-carousel" id="product-image"><a href="images/products/product-16.html" target="_blank"><img src="{{ asset('storage/uploads/Products-Images/' . $product->image1) }}" alt=""> </a><a href="images/products/product-16-1.html" target="_blank"><img src="{{ asset('storage/uploads/Products-Images/' . $product->image2) }}" alt=""> </a><a href="images/products/product-16-2.html" target="_blank"><img src="{{ asset('storage/uploads/Products-Images/' . $product->image3) }}" alt=""> </a><a href="images/products/product-16-3.html" target="_blank"><img src="{{ asset('storage/uploads/Products-Images/' . $product->image4) }}" alt=""> </a><a href="images/products/product-16-4.html" target="_blank"><img src="{{ asset('storage/uploads/Products-Images/' . $product->image5) }}" alt=""></a>
                            </div>
                        </div>
                        <div class="product-gallery__carousel">
                            <div class="owl-carousel" id="product-carousel"><a href="#" class="product-gallery__carousel-item"><img class="product-gallery__carousel-image" src="{{ asset('storage/uploads/Products-Images/' . $product->image1) }}" alt=""> </a><a href="#" class="product-gallery__carousel-item"><img class="product-gallery__carousel-image" src="{{ asset('storage/uploads/Products-Images/' . $product->image2) }}" alt=""> </a><a href="#" class="product-gallery__carousel-item"><img class="product-gallery__carousel-image" src="{{ asset('storage/uploads/Products-Images/' . $product->image3) }}" alt=""> </a><a href="#" class="product-gallery__carousel-item"><img class="product-gallery__carousel-image" src="{{ asset('storage/uploads/Products-Images/' . $product->image4) }}" alt=""> </a><a href="#" class="product-gallery__carousel-item"><img class="product-gallery__carousel-image" src="{{ asset('storage/uploads/Products-Images/' . $product->image5) }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div><!-- .product__gallery / end -->
                <!-- .product__info -->
                <div class="product__info">
                    <div class="product__wishlist-compare"><button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Wishlist"><svg width="16px" height="16px">
                                <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                            </svg></button> <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Compare"><svg width="16px" height="16px">
                                <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}"></use>
                            </svg></button></div>
                    <h1 class="product__name">{{$product->name}}</h1>
                    <div class="product__rating">
                        <div class="product__rating-stars">
                            <div class="rating">
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
                        </div>
                        <div class="product__rating-legend"><a href="#">{{$review_count}} Reviews</a><span>/</span><a href="#product-tabs">Write A
                                Review</a></div>
                    </div>
                    <div class="product__description">{{$product->little_describe}}</div>

                    <ul class="product__meta">
                        <li class="product__meta-availability"> Stock : {{$product->stock_quantity}}</li>
                        <li>Brand: <a href="#">{{$product->brand}}</a></li>

                    </ul>

                    {{-- Supplier Information --}}

                    <ul class="product__meta d-flex ">
                        <li>Supplier Country: <div class="flag_custom">
                                @if(isset($product->user)==true && isset($product->user->countries)==true)
                                {{ flag(getCountryCode($product->user->countries->name)) }}
                                @else
                                {{ flag('cn') }}
                                @endif
                            </div>

                            @if(isset($product->user)==true && isset($product->user->countries)==true)
                            {{$product->user->countries->name}}
                            @else
                            China
                            @endif


                        </li>
                        <li>City:
                        @if(isset($product->user)==true && isset($product->user->cities)==true)
                        {{$product->user->cities->name}}


                                                    @endif
                        </li>

                    </ul>

                    {{-- Supplier Information end --}}

                </div><!-- .product__info / end -->
                <!-- .product__sidebar -->


                <div class="product__sidebar">

                    <div class="product__prices" style="font-size : 16px; color: #767a7c">Average Market Price : ${{$product->average_market_price}}</div><!-- .product__options -->
                    <div class="product__prices">Selling Price : {{currentCurrency($product->price)}} <small>/ {{$product->unit}}</small></div><!-- .product__options -->
                    <form class="product__options" method="POST" action="{{route('order-product')}}">
                        @csrf
                        <div class="form-group product__option"><label class="product__option-label">Color</label>
                            <div class="input-radio-color">
                                <div class="input-radio-color__list">
                                    @php
                                    $p_colors = explode(",", $product->color);
                                    @endphp

                                    @foreach ($colors as $color)
                                    @foreach ($p_colors as $c)
                                    @if ($color->id == $c)
                                    <label class="input-radio-color__item input-radio-color__item--white" style="color: {{$color->code}};" data-toggle="tooltip" title="{{$color->name}}">
                                        <input type="radio" name="color"> <span></span>
                                    </label>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>

                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="user_id" value="{{$product->user->id}}">
                            <div>
                                <h6>Payment</h6>

                            </div>
                            <div class="input-radio-color__list">
                                @php

                                $payment = json_decode($product->payment);
                                $delivery = json_decode($product->delivery);
                                if(empty($payment)){
                                $payment = array();
                                }
                                if(empty($delivery)){
                                $delivery = array();
                                }
                                @endphp

                                <div class="form-group ">
                                    @foreach($payment as $item)
                                    <i class="fas fa-wallet"></i>
                                    <label for="{{$item}}">{{$item}}</label>

                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <h6>Delivery</h6>

                            </div>
                            <div>

                                <div class="form-group ">
                                    @foreach($delivery as $item)
                                    <i class="fas fa-shipping-fast"></i>
                                    <label for="{{$item}}">{{$item}}</label>

                                    @endforeach
                                </div>

                                <span></span>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="Qunatity">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" required>
                        </div> -->
                        <!-- <div class="form-group">
                            <input type="submit" name="submit" class="form-control btn btn-outline-primary" value="Buy Now">
                        </div> -->
                    </form>
                    <div class="form-group product__option">
                        <div class="product__actions">
                            <div class="product__actions-item product__actions-item--addtocart">
                                <div class="product-card__buttons">
                                    @if(isset(Auth('customer')->user()->id) == false)
                                    <a class="btn btn-outline-primary col-12" href="{{route('login')}}">Chat with Supplier</a>
                                    @else
                                    <a class="btn btn-outline-primary col-12" href="javascript:void(0);" class="chat-toggle" onclick="Chatpop('{{ $product->user->id }}','{{ $product->user->name }}')" data-id="{{ $product->user->id }}" data-user="{{ $product->user->name }}">Chat with Supplier</a>


                                    <input type="hidden" id="current_user" value="{{ Auth('customer')->user()->id }}" />
                                    <input type="hidden" id="pusher_app_key" value="678afaa42e4cd7f96249" />
                                    <input type="hidden" id="pusher_cluster" value="ap2" />
                                    @endif
                                </div>
                                {{-- <a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-primary btn-lg" role="button" >Add To Cart</a>
                                --}}
                            </div>
                        </div>
                    </div>
                    <!-- .product__options / end -->
                </div><!-- .product__end -->
                <!-- <div class="product__footer">
                    <div class="product__tags tags">
                        <div class="tags__list"><a href="#">Mounts</a> <a href="#">Electrodes</a> <a
                                href="#">Chainsaws</a></div>
                    </div>
                    <div class="product__share-links share-links">
                        <ul class="share-links__list">
                            <li class="share-links__item share-links__item--type--like"><a href="#">Like</a>
                            </li>
                            <li class="share-links__item share-links__item--type--tweet"><a href="#">Tweet</a></li>
                            <li class="share-links__item share-links__item--type--pin"><a href="#">Pin
                                    It</a></li>
                            <li class="share-links__item share-links__item--type--counter"><a href="#">4K</a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="product-tabs" id="product-tabs">
            <div class="product-tabs__list"><a href="#tab-description" class="product-tabs__item product-tabs__item--active">Description</a> <a href="#tab-specification" class="product-tabs__item">Specification</a> <a href="#tab-reviews" class="product-tabs__item">Reviews</a></div>
            <div class="product-tabs__content">
                <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                    <div class="typography">
                        <h3>Product Full Description</h3>
                        <p>{{$product->description}}</p>
                    </div>
                </div>
                <!-- <div class="product-tabs__pane" id="tab-specification">
                    <div class="spec">
                        <h3 class="spec__header">Specification</h3>
                        <div class="spec__section">
                            <h4 class="spec__section-title">General</h4>
                            <div class="spec__row">
                                <div class="spec__name">Material</div>
                                <div class="spec__value">Aluminium, Plastic</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Engine Type</div>
                                <div class="spec__value">Brushless</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Battery Voltage</div>
                                <div class="spec__value">18 V</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Battery Type</div>
                                <div class="spec__value">Li-lon</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Number of Speeds</div>
                                <div class="spec__value">2</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Charge Time</div>
                                <div class="spec__value">1.08 h</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Weight</div>
                                <div class="spec__value">1.5 kg</div>
                            </div>
                        </div>
                        <div class="spec__section">
                            <h4 class="spec__section-title">Dimensions</h4>
                            <div class="spec__row">
                                <div class="spec__name">Length</div>
                                <div class="spec__value">99 mm</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Width</div>
                                <div class="spec__value">207 mm</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Height</div>
                                <div class="spec__value">208 mm</div>
                            </div>
                        </div>
                        <div class="spec__disclaimer">Information on technical characteristics, the delivery
                            set, the country of manufacture and the appearance of the goods is for reference
                            only and is based on the latest information available at the time of
                            publication.</div>
                    </div>
                </div> -->
                <div class="product-tabs__pane" id="tab-reviews">
                    <div class="reviews-view">
                        <div class="reviews-view__list">
                            <h3 class="reviews-view__header">Customer Reviews</h3>
                            <div class="reviews-list">
                                <ol class="reviews-list__content">
                                    @foreach ($reviews as $review)
                                    <li class="reviews-list__item">
                                        <div class="review">
                                            <div class="review__avatar"><img src="{{ asset('frontend/images/avatars/avatar-1.jpg') }}" alt="">
                                            </div>
                                            <div class="review__content">
                                                <div class="review__author">{{$review->customer->name}}</div>
                                                <div class="review__rating">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <?php for ($i = 0; $i < $review->rating; $i++) { ?>
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

                                                            <?php for ($i = $review->rating; $i < 5; $i++) { ?>
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
                                                </div>
                                                <div class="review__text">{{$review->review}}
                                                </div>
                                                <div class="review__date">{{date('d F, Y', strtotime($review->created_at))}}</div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach

                                </ol>
                                {{-- <div class="reviews-list__pagination">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled"><a class="page-link page-link--with-arrow"
                                                href="#" aria-label="Previous"><svg
                                                    class="page-link__arrow page-link__arrow--left" aria-hidden="true"
                                                    width="8px" height="13px">
                                                    <use
                                                        xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-left-8x13') }}">
                                </use>
                                </svg></a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2 <span class="sr-only">(current)</span></a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link page-link--with-arrow" href="#" aria-label="Next"><svg class="page-link__arrow page-link__arrow--right" aria-hidden="true" width="8px" height="13px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-8x13') }}">
                                            </use>
                                        </svg></a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                    @if(auth('customer')->check())
                     <form class="reviews-view__form" method="POST" action="{{route('submit-review')}}">
                         @csrf
                            <a href="#tab-reviews" class="reviews-view__header">Write A Review</a>
                            <div class="row">
                                <div class="col-12 col-lg-9 col-xl-8">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <div class="form-row">
                                        <div class="form-group col-md-4"><label for="review-stars">Review
                                                Stars</label> <select id="review-stars" name="rating" class="form-control">
                                                <option value="5">5 Stars Rating</option>
                                                <option value="4">4 Stars Rating</option>
                                                <option value="3">3 Stars Rating</option>
                                                <option value="2">2 Stars Rating</option>
                                                <option value="1">1 Stars Rating</option>
                                            </select></div>
                                        <div class="form-group col-md-4"><label for="review-author">Your
                                                Name</label> <input type="text" class="form-control" id="review-author"
                                                placeholder="Your Name" name="name" value=""></div>
                                        <div class="form-group col-md-4"><label for="review-email">Email
                                                Address</label> <input type="text"  name="email" class="form-control"
                                                id="review-email" placeholder="Email Address"></div>
                                    </div>
                                    <div class="form-group"><label for="review-text">Your Review</label>
                                        <textarea class="form-control" id="review-text" name="review" rows="6"></textarea>
                                    </div>
                                    <div class="form-group mb-0"><button type="submit"
                                            class="btn btn-primary btn-lg">Post Your Review</button></div>
                                </div>
                            </div>
                        </form>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div><!-- .block-products-carousel -->
<div class="block block-products-carousel" data-layout="grid-5">
    <div class="container">
        <div class="block-header">
            <h3 class="block-header__title">Related Products</h3>
            <div class="block-header__divider"></div>
            <div class="block-header__arrows-list"><button class="block-header__arrow block-header__arrow--left" type="button"><svg width="7px" height="11px">
                        <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-left-7x11') }}"></use>
                    </svg></button> <button class="block-header__arrow block-header__arrow--right" type="button"><svg width="7px" height="11px">
                        <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-7x11') }}"></use>
                    </svg></button></div>
        </div>
        <div class="block-products-carousel__slider">
            <div class="block-products-carousel__preloader"></div>
            <div class="owl-carousel">
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                    <span class="product-card__old-price">$1189.00</span>
                                </div>
                                <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                        Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                </svg> <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image"><a href="/product-details"><img src="{{ asset('frontend/images/products/product-10.jpg') }}" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="/product-details">Water Tap</a></div>
                                <div class="product-card__rating">
                                    <div class="rating">
                                        <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                        Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                </svg> <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image"><a href="/product-details"><img src="{{ asset('frontend/images/products/product-11.jpg') }}" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="/product-details">Hand Tool Kit</a>
                                </div>
                                <div class="product-card__rating">
                                    <div class="rating">
                                        <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                        Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                </svg> <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image"><a href="/product-details"><img src="{{ asset('frontend/images/products/product-12.jpg') }}" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="/product-details">Ash's Chainsaw
                                        3.5kW</a></div>
                                <div class="product-card__rating">
                                    <div class="rating">
                                        <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                        Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                </svg> <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image"><a href="/product-details"><img src="{{ asset('frontend/images/products/product-13.jpg') }}" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="/product-details">Brandix Angle Grinder
                                        KZX3890PQW</a></div>
                                <div class="product-card__rating">
                                    <div class="rating">
                                        <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                        Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                </svg> <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image"><a href="/product-details"><img src="{{ asset('frontend/images/products/product-14.jpg') }}" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="/product-details">Brandix Air
                                        Compressor DELTAKX500</a></div>
                                <div class="product-card__rating">
                                    <div class="rating">
                                        <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                        Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                </svg> <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image"><a href="/product-details"><img src="{{ asset('frontend/images/products/product-15.jpg') }}" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="/product-details">Brandix Electric
                                        Jigsaw JIG7000BQ</a></div>
                                <div class="product-card__rating">
                                    <div class="rating">
                                        <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                            </div><svg class="rating__star" width="13px" height="12px">
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
                                <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                        Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                </svg> <span class="fake-svg-icon"></span></button>
                            <div class="product-card__image"><a href="/product-details"><img src="{{ asset('frontend/images/products/product-16.jpg') }}" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="/product-details">Brandix Screwdriver
                                        SCREW1500ACC</a></div>
                                <div class="product-card__rating">
                                    <div class="rating">
                                        <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                            </div><svg class="rating__star rating__star--active" width="13px" height="12px">
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
                                <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To
                                        Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#compare-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- .block-products-carousel / end -->

@include('chat-box')
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script src="{{ asset('js/chat.js') }}"></script>
@endsection
