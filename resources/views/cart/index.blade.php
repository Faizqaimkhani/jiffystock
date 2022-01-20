@extends('layouts.app')

@section('content')

<div class="page-header">
    <div class="page-header__container container">
        <div class="page-header__breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a> <svg class="breadcrumb-arrow" width="6px"
                            height="9px">
                            <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-6x9') }}"></use>
                        </svg></li>
                    <li class="breadcrumb-item"><a href="#">Breadcrumb</a> <svg class="breadcrumb-arrow" width="6px"
                            height="9px">
                            <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-6x9') }}"></use>
                        </svg></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </nav>
        </div>
        <div class="page-header__title">
            <h1>Shopping Cart</h1>
        </div>
    </div>
</div>
<div class="cart block">
    <div class="container">
        <table class="cart__table cart-table">
            <thead class="cart-table__head">
                <tr class="cart-table__row">
                    <th class="cart-table__column cart-table__column--image">Image</th>
                    <th class="cart-table__column cart-table__column--product">Product</th>
                    <th class="cart-table__column cart-table__column--price">Price</th>
                    <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                    <th class="cart-table__column cart-table__column--total">Total</th>
                    <th class="cart-table__column cart-table__column--remove"></th>
                </tr>
            </thead>
            <tbody class="cart-table__body">


                <?php 
        $subtotal = 0;
        $shipping = 30;
        $total = 0;
        ?>
                @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                <?php 
                $subtotal += $details['price'] * $details['quantity']; 
                                                    $total = $subtotal + $shipping;
                ?>



                <tr class="cart-table__row">
                    <td class="cart-table__column cart-table__column--image"><a href="#"><img
                                src="{{ asset('uploads/Products-Images/' . $details['image']) }}" alt=""></a></td>
                    <td class="cart-table__column cart-table__column--product"><a href="#"
                            class="cart-table__product-name">{{$details['name']}}</a>
                        <ul class="cart-table__options">
                            {{-- <li>Color: Yellow</li>
                            <li>Material: Aluminium</li> --}}
                        </ul>
                    </td>
                    <td class="cart-table__column cart-table__column--price" data-title="Price">
                        ${{$details['price']}}.00</td>
                    <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                        <div class="input-number"><input class="form-control input-number__input" type="number" min="1"
                                value="{{$details['quantity']}}">
                            <div class="input-number__add"></div>
                            <div class="input-number__sub"></div>
                        </div>
                    </td>
                    <td class="cart-table__column cart-table__column--total" data-title="Total">
                        ${{ $details['price'] * $details['quantity'] }}.00
                    </td>
                    <td class="remove-from-cart cart-table__column cart-table__column--remove" data-id="{{ $id }}">
                        <button type="button" class="btn btn-light btn-sm btn-svg-icon"><svg width="12px" height="12px">
                                <use xlink:href="{{ asset('frontend/images/sprite.svg#cross-12') }}"></use>
                            </svg></button>
                        <button type="button" class="btn btn-light btn-sm btn-svg-icon"><svg width="12px" height="12px">
                                <use xlink:href="{{ asset('frontend/images/sprite.svg#cross-12') }}"></use>
                            </svg></button>
                    </td>
                </tr>

                @endforeach
                @endif




            </tbody>
        </table>
        <div class="cart__actions">
            <form class="cart__coupon-form"><label for="input-coupon-code" class="sr-only">Password</label>
                <input type="text" class="form-control" id="input-coupon-code" placeholder="Coupon Code">
                <button type="submit" class="btn btn-primary">Apply Coupon</button></form>
            <div class="cart__buttons"><a href="/" class="btn btn-light">Continue Shopping</a> <a href="#"
                    class="update-cart btn data-id=" {{ $id }}" btn-primary cart__update-button">Update Cart</a></div>
        </div>
        <div class="row justify-content-end pt-5">
            <div class="col-12 col-md-7 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Cart Totals</h3>
                        <table class="cart__totals">
                            <thead class="cart__totals-header">
                                <tr>
                                    <th>Subtotal</th>
                                    <td>${{$subtotal}}.00</td>
                                </tr>
                            </thead>
                            <tbody class="cart__totals-body">
                                <tr>
                                    <th>Shipping</th>
                                    <td>${{$shipping}}.00<div class="cart__calc-shipping"><a href="#">Calculate
                                                Shipping</a></div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tax</th>
                                    <td>$0.00</td>
                                </tr>
                            </tbody>
                            <tfoot class="cart__totals-footer">
                                <tr>
                                    <th>Total</th>
                                    <td>${{$total}}.00</td>
                                </tr>
                            </tfoot>
                        </table><a class="btn btn-primary btn-xl btn-block cart__checkout-button"
                            href="/checkout">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
