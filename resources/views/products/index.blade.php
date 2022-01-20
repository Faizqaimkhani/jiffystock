@extends('layouts.app')

@section('content')

<!-- site__body -->
<div class="site__body">


    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a> <svg class="breadcrumb-arrow" width="6px" height="9px">
                                <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-6x9') }}"></use>
                            </svg></li>
                        <li class="breadcrumb-item"><a href="#">{{$sub_category[0]->product_category->name}}</a> <svg class="breadcrumb-arrow" width="6px" height="9px">
                                <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-6x9') }}"></use>
                            </svg></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$sub_category[0]->name}}</li>
                    </ol>
                </nav>
            </div>
            <div class="page-header__title">
                <h1>{{strtoupper($headerTitle)}}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="block">
                    <div class="products-view">
                        <div class="products-view__list products-list" data-layout="grid-5-full" data-with-features="false">

                            @foreach($data as $key=>$value)
                            <h5 class="my-3">
                                {{strtoupper($key)}}
                            </h5>
                            <hr>
                            <div class="products-list__body">
                                @foreach ($value as $p)

                                <div class="products-list__item" >
                                    <div class="product-card"><button class="product-card__quickview" type="button" onclick="return window.location.href='/product-details/{{$p->id}}'"><svg width="16px" height="16px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#quickview-16') }}"></use>
                                            </svg> <span class="fake-svg-icon"></span></button>
                                        {{-- <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--new">New</div>
                                        </div> --}}
                                        <div class="product-card__image"><a href="/product-details/{{$p->id}}"><img src="{{ asset('storage/uploads/Products-Images/' . $p->image1) }}" alt=""></a></div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="/product-details/{{$p->id}}">{{ucwords($p->name)}}
                                                </a></div>
                                            <div class="d-flex">
                                                <div class="flag_custom">
                                                    @if(isset($product->user)==true && isset($product->user->countries)==true)
                                                    {{ flag(getCountryCode($product->user->countries->name)) }}
                                                    @else
                                                    {{ flag('cn') }}
                                                    @endif
                                                </div>
                                                <h6 class="ml-2 mt-1"> 
                                                   
                                                    @if(isset($product->user)==true && isset($product->user->countries)==true)
                                                    {{$p->user->countries->name}}
                                                    @else
                                                    China
                                                    @endif
                                                </h6>
                                                <h6 class="ml-4 mt-1">Stock : <span class="ml-2">{{$p->stock_quantity}}</span></h6>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="rating">

                                                    <?php
                                                    $review_count = App\Models\Reviews::where('product_id', $p->id)->count();
                                                    $total_rating = App\Models\Reviews::where('product_id', $p->id)->sum('rating');
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
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>                                                                                        
                                            <div class="d-flex">
                                            <div class="product-card__prices">{{currentCurrency($p->price)}}/<h6>{{$p->unit}}</h6></div>
                                            <div class="product-card__buttons ml-4">
                                                {{--<a class="btn btn-primary product-card__addtocart" onclick=" return confirm('If Product is From Another Supplier Your Previous Cart Products will lossed?')" href="{{ url('add-to-cart/'.$p->id) }}" role="button">Add To
                                                Cart</a>--}}
                                                <a href="{{ url('add-to-cart/'.$p->id) }}" onclick=" return confirm('If Product is From Another Supplier Your Previous Cart Products will lossed?')" class="btn btn-secondary product-card__addtocart product-card__addtocart--list" role="button">Add To Cart</a>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" onclick="add_to_wishlist({{$p->id}})" type="button"><svg width="30px" height="30px">
                                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#wishlist-16') }}"></use>
                                                    </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="product-card__buttons">
                                                @if(isset(Auth('customer')->user()->id) == false)
                                                <a class="btn btn-outline-primary col-12" href="{{route('login')}}">Chat with Supplier</a>
                                                @else
                                                <a class="btn btn-outline-primary col-12" href="javascript:void(0);" class="chat-toggle" onclick="Chatpop('{{ $p->user->id }}','{{ $p->user->name }}')" data-id="{{ $p->user->id }}" data-user="{{ $p->user->name }}">Chat with Supplier</a>


                                                <input type="hidden" id="current_user" value="{{ Auth('customer')->user()->id }}" />
                                                <input type="hidden" id="pusher_app_key" value="678afaa42e4cd7f96249" />
                                                <input type="hidden" id="pusher_cluster" value="ap2" />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                            @endforeach


                        </div>
                        {{-- <div class="products-view__pagination">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link page-link--with-arrow" href="#"
                                        aria-label="Previous"><svg class="page-link__arrow page-link__arrow--left"
                                            aria-hidden="true" width="8px" height="13px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-left-8x13') }}"></use>
                        </svg></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link page-link--with-arrow" href="#" aria-label="Next"><svg class="page-link__arrow page-link__arrow--right" aria-hidden="true" width="8px" height="13px">
                                    <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-8x13') }}"></use>
                                </svg></a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>



</div><!-- site__body / end -->
@include('chat-box')
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script src="{{ asset('js/chat.js') }}"></script>
@endsection