@extends('layouts.app')

@section('content')

<!-- site__body -->
<div class="site__body">

                <div class="page-header">
                <div class="page-header__container container">
                    <div class="page-header__breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a> <svg class="breadcrumb-arrow"
                                        width="6px" height="9px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-6x9') }}"></use>
                                    </svg></li>
                                <li class="breadcrumb-item"><a href="#">Breadcrumb</a> <svg class="breadcrumb-arrow"
                                        width="6px" height="9px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-6x9') }}"></use>
                                    </svg></li>
                                <li class="breadcrumb-item active" aria-current="page">Screwdrivers</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="page-header__title">
                        <h1>{{$category_name}}</h1>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="shop-layout shop-layout--sidebar--end">
                    <div class="shop-layout__content">
                        <div class="block">
                            <div class="products-view">
                                <div class="products-view__options">
                                    <div class="view-options">
                                        <div class="view-options__layout">
                                            <div class="layout-switcher">
                                                <div class="layout-switcher__list"><button data-layout="grid-3-sidebar"
                                                        data-with-features="false" title="Grid" type="button"
                                                        class="layout-switcher__button layout-switcher__button--active"><svg
                                                            width="16px" height="16px">
                                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#layout-grid-16x16') }}"></use>
                                                        </svg></button>
                                                         <button data-layout="list"
                                                        data-with-features="false" title="List" type="button"
                                                        class="layout-switcher__button"><svg width="16px" height="16px">
                                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#layout-list-16x16') }}"></use>
                                                        </svg></button></div>
                                            </div>
                                        </div>
                                        {{-- <div class="view-options__legend">Showing 6 of 98 products</div>
                                        <div class="view-options__divider"></div> --}}
                                        {{-- <div class="view-options__control"><label for="">Sort By</label>
                                            <div><select class="form-control form-control-sm" name="" id="">
                                                    <option value="">Default</option>
                                                    <option value="">Name (A-Z)</option>
                                                </select></div>
                                        </div> --}}
                                        {{-- <div class="view-options__control"><label for="">Show</label>
                                            <div><select class="form-control form-control-sm" name="" id="">
                                                    <option value="">12</option>
                                                    <option value="">24</option>
                                                </select></div>
                                        </div> --}}
                                    </div> 
                                </div>
                                <div class="products-view__list products-list" data-layout="grid-3-sidebar"
                                    data-with-features="false">
                                    <div class="products-list__body">
                                        @foreach ($products as $product)
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview"
                                                    type="button"><svg width="16px" height="16px">
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
                                                    <div class="product-card__prices" style="font-size: 21px;">Minimum Bid : ${{$product->min_bid}}.00</div>
                                                    @php
                                                        $expire_at = date('d H:i:s', strtotime($product->expire_at));
                                                    @endphp
                                                    <div class="product-card__prices" style="font-size: 21px;">Available Until : 
            {{-- <span class='countdown' data-countdown="{{$expire_at}}" value='{{$expire_at}}'>{{$product->expire_at}}</span> --}}                                                                    <div class="filter-categories__counter" data-countdown="{{$expire_at}}">{{$product->expire_at}}</div>
        </div>
                                                    <div class="product-card__buttons">
                                                        <button class="btn btn-primary product-card__addtocart"  data-toggle="modal" onclick="openModal('{{$product->product->user->id}}','{{$product->id}}','{{$product->product_id}}','{{$product->min_bid}}')" type="button">Bid Now</button>
                                                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" data-toggle="modal"  onclick="openModal('{{$product->product->user->id}}','{{$product->id}}','{{$product->product_id}}','{{$product->min_bid}}')"  type="button">Bid Now</button> 
                                                        
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
                                        {{-- Bid now modal --}}
                            <div class="modal fade" id="bidModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                aria-hidden="true">
                                <form action="{{route('submit-bid')}}" id="bidform" method="post">
                                @csrf
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Bid Now</h5>
                                            <button type="button" class="close" onclick="location.reload();" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        
                                            <input type="hidden" name="user_id" value="">
                                            <input type="hidden" name="auction_id" value="">
                                            <input type="hidden" name="product_id" value="">
                                            <input type="hidden" class="min_bid" name="min_bid" value="">
                                            <input type="hidden" name="customerWallet" class="customerWallet" value="{{isset(auth('customer')->user()->wallet->price) == true?auth('customer')->user()->wallet->price:0}}">

                                            <input type="number" name="bid_price" id="amount" class="form-control amount"
                                                placeholder="Enter your bidding amount" required>
                                                <div class='form-row row'>
                                                    <div class='col-md-12 hide error form-group d-none '>
                                                        <div class='alert-danger alert  my-2'>Fix the errors before you begin.</div>
                                                    </div>
                                                </div> 
                                        <!-- </div>
                                        <div class="modal-footer"> -->
                                            <hr>
                                        <input type="hidden"  name="min_bid" value="{{isset($product->min_bid) == true?$product->min_bid:0}}">
                                            <button type="button" onclick="location.reload();" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button"   class="btn btn-primary submitbid">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                                    </div>
                                </div>
                                {{-- <div class="products-view__pagination">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled"><a class="page-link page-link--with-arrow"
                                                href="#" aria-label="Previous"><svg
                                                    class="page-link__arrow page-link__arrow--left" aria-hidden="true"
                                                    width="8px" height="13px">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-left-8x13') }}"></use>
                                                </svg></a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">2 <span
                                                    class="sr-only">(current)</span></a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link page-link--with-arrow" href="#"
                                                aria-label="Next"><svg class="page-link__arrow page-link__arrow--right"
                                                    aria-hidden="true" width="8px" height="13px">
                                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-8x13') }}"></use>
                                                </svg></a></li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="shop-layout__sidebar">
                        <div class="block block-sidebar">
                            <div class="block-sidebar__item">
                                <div class="widget-filters widget" data-collapse
                                    data-collapse-opened-class="filter--opened">
                                    <h4 class="widget__title">Categories</h4>
                                    <div class="widget-filters__list">
                                        <div class="widget-filters__item">
                                            <div class="filter filter--opened" data-collapse-item>
                                                <div class="filter__body" data-collapse-content>
                                                    <div class="filter__container">
                                                        <div class="filter-categories">
                                                            <ul class="filter-categories__list">
                                                                <li
                                                                    class="filter-categories__item filter-categories__item--parent">
                                                                    <svg class="filter-categories__arrow" width="6px"
                                                                        height="9px">
                                                                        <use
                                                                            xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-6x9') }}">
                                                                        </use>
                                                                    </svg>
                                                                     <a href="/auction">All Products</a>
                                                                     @php
                                                                             $cat_products = App\Models\auction::select('auctions.id')->leftjoin('products', 'auctions.product_id', '=', 'products.id')->leftjoin('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')->leftjoin('product_categories', 'sub_categories.category_id', '=', 'product_categories.id')->get();
                                                                            $cat_products = $cat_products->count();

                                                                     @endphp
                                                                    <div class="filter-categories__counter">{{$cat_products}}</div>
                                                                </li>
                                                                @foreach ($categories as $c)
                                                                <li
                                                                    class="filter-categories__item filter-categories__item--parent">
                                                                    <svg class="filter-categories__arrow" width="6px"
                                                                        height="9px">
                                                                        <use
                                                                            xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-6x9') }}">
                                                                        </use>
                                                                    </svg>
                                                                     <a href="/auction/category/{{$c->id}}">{{$c->name}}</a>
                                                                     @php
                                                                             $cat_products = App\Models\auction::select('auctions.id')->leftjoin('products', 'auctions.product_id', '=', 'products.id')->leftjoin('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')->leftjoin('product_categories', 'sub_categories.category_id', '=', 'product_categories.id')->where('product_categories.id', '=', $c->id)->get();
                                                                            $cat_products = $cat_products->count();

                                                                     @endphp
                                                                    <div class="filter-categories__counter">{{$cat_products}}</div>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="widget-filters__item">
                                            <div class="filter filter--opened" data-collapse-item><button type="button"
                                                    class="filter__title" data-collapse-trigger>Price <svg
                                                        class="filter__arrow" width="12px" height="7px">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-down-12x7') }}">
                                                        </use>
                                                    </svg></button>
                                                <div class="filter__body" data-collapse-content>
                                                    <div class="filter__container">
                                                        <div class="filter-price" data-min="500" data-max="1500"
                                                            data-from="590" data-to="1130">
                                                            <div class="filter-price__slider"></div>
                                                            <div class="filter-price__title">Price: $<span
                                                                    class="filter-price__min-value"></span> – $<span
                                                                    class="filter-price__max-value"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="widget-filters__item">
                                            <div class="filter filter--opened" data-collapse-item><button type="button"
                                                    class="filter__title" data-collapse-trigger>Brand <svg
                                                        class="filter__arrow" width="12px" height="7px">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-down-12x7') }}">
                                                        </use>
                                                    </svg></button>
                                                <div class="filter__body" data-collapse-content>
                                                    <div class="filter__container">
                                                        <div class="filter-list">
                                                            <div class="filter-list__list"><label
                                                                    class="filter-list__item"><span
                                                                        class="filter-list__input input-check"><span
                                                                            class="input-check__body"><input
                                                                                class="input-check__input"
                                                                                type="checkbox"> <span
                                                                                class="input-check__box"></span> <svg
                                                                                class="input-check__icon" width="9px"
                                                                                height="7px">
                                                                                <use
                                                                                    xlink:href="{{ asset('frontend/images/sprite.svg#check-9x7') }}">
                                                                                </use>
                                                                            </svg> </span></span><span
                                                                        class="filter-list__title">Wakita </span><span
                                                                        class="filter-list__counter">7</span></label>
                                                                <label class="filter-list__item"><span
                                                                        class="filter-list__input input-check"><span
                                                                            class="input-check__body"><input
                                                                                class="input-check__input"
                                                                                type="checkbox" checked="checked"> <span
                                                                                class="input-check__box"></span> <svg
                                                                                class="input-check__icon" width="9px"
                                                                                height="7px">
                                                                                <use
                                                                                    xlink:href="{{ asset('frontend/images/sprite.svg#check-9x7') }}">
                                                                                </use>
                                                                            </svg> </span></span><span
                                                                        class="filter-list__title">Zosch </span><span
                                                                        class="filter-list__counter">42</span></label>
                                                                <label
                                                                    class="filter-list__item filter-list__item--disabled"><span
                                                                        class="filter-list__input input-check"><span
                                                                            class="input-check__body"><input
                                                                                class="input-check__input"
                                                                                type="checkbox" checked="checked"
                                                                                disabled="disabled"> <span
                                                                                class="input-check__box"></span> <svg
                                                                                class="input-check__icon" width="9px"
                                                                                height="7px">
                                                                                <use
                                                                                    xlink:href="{{ asset('frontend/images/sprite.svg#check-9x7') }}">
                                                                                </use>
                                                                            </svg> </span></span><span
                                                                        class="filter-list__title">WeVALT</span></label>
                                                                <label
                                                                    class="filter-list__item filter-list__item--disabled"><span
                                                                        class="filter-list__input input-check"><span
                                                                            class="input-check__body"><input
                                                                                class="input-check__input"
                                                                                type="checkbox" disabled="disabled">
                                                                            <span class="input-check__box"></span> <svg
                                                                                class="input-check__icon" width="9px"
                                                                                height="7px">
                                                                                <use
                                                                                    xlink:href="{{ asset('frontend/images/sprite.svg#check-9x7') }}">
                                                                                </use>
                                                                            </svg> </span></span><span
                                                                        class="filter-list__title">Hammer</span></label>
                                                                <label class="filter-list__item"><span
                                                                        class="filter-list__input input-check"><span
                                                                            class="input-check__body"><input
                                                                                class="input-check__input"
                                                                                type="checkbox"> <span
                                                                                class="input-check__box"></span> <svg
                                                                                class="input-check__icon" width="9px"
                                                                                height="7px">
                                                                                <use
                                                                                    xlink:href="{{ asset('frontend/images/sprite.svg#check-9x7') }}">
                                                                                </use>
                                                                            </svg> </span></span><span
                                                                        class="filter-list__title">Mitasia </span><span
                                                                        class="filter-list__counter">1</span></label>
                                                                <label class="filter-list__item"><span
                                                                        class="filter-list__input input-check"><span
                                                                            class="input-check__body"><input
                                                                                class="input-check__input"
                                                                                type="checkbox"> <span
                                                                                class="input-check__box"></span> <svg
                                                                                class="input-check__icon" width="9px"
                                                                                height="7px">
                                                                                <use
                                                                                    xlink:href="{{ asset('frontend/images/sprite.svg#check-9x7') }}">
                                                                                </use>
                                                                            </svg> </span></span><span
                                                                        class="filter-list__title">Metaggo </span><span
                                                                        class="filter-list__counter">25</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-filters__item">
                                            <div class="filter filter--opened" data-collapse-item><button type="button"
                                                    class="filter__title" data-collapse-trigger>Brand <svg
                                                        class="filter__arrow" width="12px" height="7px">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-down-12x7') }}">
                                                        </use>
                                                    </svg></button>
                                                <div class="filter__body" data-collapse-content>
                                                    <div class="filter__container">
                                                        <div class="filter-list">
                                                            <div class="filter-list__list"><label
                                                                    class="filter-list__item"><span
                                                                        class="filter-list__input input-radio"><span
                                                                            class="input-radio__body"><input
                                                                                class="input-radio__input"
                                                                                name="filter_radio" type="radio"> <span
                                                                                class="input-radio__circle"></span>
                                                                        </span></span><span
                                                                        class="filter-list__title">Wakita </span><span
                                                                        class="filter-list__counter">7</span></label>
                                                                <label class="filter-list__item"><span
                                                                        class="filter-list__input input-radio"><span
                                                                            class="input-radio__body"><input
                                                                                class="input-radio__input"
                                                                                name="filter_radio" type="radio"> <span
                                                                                class="input-radio__circle"></span>
                                                                        </span></span><span
                                                                        class="filter-list__title">Zosch </span><span
                                                                        class="filter-list__counter">42</span></label>
                                                                <label
                                                                    class="filter-list__item filter-list__item--disabled"><span
                                                                        class="filter-list__input input-radio"><span
                                                                            class="input-radio__body"><input
                                                                                class="input-radio__input"
                                                                                name="filter_radio" type="radio"
                                                                                checked="checked" disabled="disabled">
                                                                            <span class="input-radio__circle"></span>
                                                                        </span></span><span
                                                                        class="filter-list__title">WeVALT</span></label>
                                                                <label
                                                                    class="filter-list__item filter-list__item--disabled"><span
                                                                        class="filter-list__input input-radio"><span
                                                                            class="input-radio__body"><input
                                                                                class="input-radio__input"
                                                                                name="filter_radio" type="radio"
                                                                                disabled="disabled"> <span
                                                                                class="input-radio__circle"></span>
                                                                        </span></span><span
                                                                        class="filter-list__title">Hammer</span></label>
                                                                <label class="filter-list__item"><span
                                                                        class="filter-list__input input-radio"><span
                                                                            class="input-radio__body"><input
                                                                                class="input-radio__input"
                                                                                name="filter_radio" type="radio"> <span
                                                                                class="input-radio__circle"></span>
                                                                        </span></span><span
                                                                        class="filter-list__title">Mitasia </span><span
                                                                        class="filter-list__counter">1</span></label>
                                                                <label class="filter-list__item"><span
                                                                        class="filter-list__input input-radio"><span
                                                                            class="input-radio__body"><input
                                                                                class="input-radio__input"
                                                                                name="filter_radio" type="radio"> <span
                                                                                class="input-radio__circle"></span>
                                                                        </span></span><span
                                                                        class="filter-list__title">Metaggo </span><span
                                                                        class="filter-list__counter">25</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="block-sidebar__item d-none d-lg-block">
                                <div class="widget-products widget">
                                    <h4 class="widget__title">Latest Products</h4>
                                    <div class="widget-products__list">
                                        <div class="widget-products__item">
                                            <div class="widget-products__image"><a href="product.html"><img
                                                        src="{{ asset('frontend/images/products/product-1.jpg') }}" alt=""></a></div>
                                            <div class="widget-products__info">
                                                <div class="widget-products__name"><a href="product.html">Electric
                                                        Planer Brandix KL370090G 300 Watts</a></div>
                                                <div class="widget-products__prices">$749.00</div>
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

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
<script>
    $('.countdown').each(function(){
        $(this).countdown($(this).attr('value'), function(event) {
            $(this).text(
                event.strftime('%d days %H:%M:%S')
            );
        });
    });
    $('form#bidform').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    ('.submitbid').trigger("click");
    // return false;
  }
});
// $('#myCountDown').countdown('2017/05/28', function(event) {
//   $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
// });
function openModal(user_id,auction_id,product_id,min_bid){
    $('#bidModal').find('input[name="user_id"]').val(user_id);
    $('#bidModal').find('input[name="auction_id"]').val(auction_id);
    $('#bidModal').find('input[name="product_id"]').val(product_id);
    $('#bidModal').find('input[name="min_bid"]').val(min_bid);
    $('#bidModal').modal('show');
}
$( document ).ready(function() 
{
    $('.submitbid').on('click',function(){
        var amount = parseFloat($('#bidModal').find('input[id="amount"]').val());
        var minbidprice=parseFloat($('#bidModal').find('input[name="min_bid"]').val());
        var Balance=parseFloat($('#bidModal').find('input[name="customerWallet"]').val());
       

        if(amount > Balance){
            $('.error')
                .removeClass('d-none')
                .find('.alert')
                .text("Your Wallet Balance is Not Enough for Bidding this Item");
                return;
            }
         if (amount<minbidprice){
            $('.error')
                .removeClass('d-none')
                .find('.alert')
                .text("You Can't Bid Lessthen"+minbidprice);
                return;
        }
       
            var form =$('#bidModal').find('form#bidform');
           form.submit();
        
      
    })
    // $('.countdown').each(function() 
    // {
    //     var $this = $(this), finalDate = $(this).attr('value');
    //     $this.countdown(finalDate, function(event) 
    //     {
    //         $this.html(event.strftime('%-D %!D:dzień,dni; %-H h %-M min %-S s'));
    //         $this.on('finish.countdown', function(event)
    //         {
    //             $this.html("-");
    //             $this.css('text-align','center');;
    //         });
    //     });

    // });
});

$('[data-countdown]').each(function() {
  var $this = $(this), finalDate = $(this).data('countdown');
  $this.countdown(finalDate, function(event) {
    $this.html(event.strftime('%D days %H:%M:%S'));
  });
});

</script>

@endsection
