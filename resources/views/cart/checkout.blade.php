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
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
        <div class="page-header__title">
            <h1>Checkout</h1>
        </div>
    </div>
</div>
<div class="checkout block">
    <div class="container">
            <form action="{{route('order-submit')}}" method="post">
                        @csrf
        <div class="row">
            @if (!Auth::guard('customer')->user())
            <div class="col-12 mb-3">
                <div class="alert alert-lg alert-primary">Returning customer? <a href="{{ route('login') }}">Click here
                        to login</a></div>
            </div>
            @endif
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="card mb-lg-0">
                    <div class="card-body">
                        <h3 class="card-title">Billing details</h3>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="checkout-first-name">Name</label>
                                <input type="text" name="full_name" class="form-control" id="checkout-first-name"
                                    placeholder="Full Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="checkout-last-name">Email</label>
                                <input type="email" name="email" class="form-control" id="checkout-last-name"
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="checkout-phone">Contact No</label>
                            <input type="text" class="form-control" name="contact_no" id="checkout-phone"
                                placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="checkout-country">Country</label>
                            <select id="country" class="form-control" name="country">
                                <option>Select a country...</option>
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="checkout-country">City</label>
                            <select id="city" class="form-control" name="city">
                                <option>Select a city...</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="checkout-postcode">Postcode / ZIP</label>
                            <input type="text" class="form-control" name="zip_code" id="checkout-postcode">
                        </div>
                        <div class="form-group">
                            <label for="checkout-street-address">Street Address</label>
                            <input type="text" class="form-control" name="address" id="checkout-street-address"
                                placeholder="Street Address">
                        </div>
                    </div>
                    <div class="card-divider"></div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                <div class="card mb-0">
                    <div class="card-body">
                        <h3 class="card-title">Your Order</h3>
                        <table class="checkout__totals">
                            <thead class="checkout__totals-header">
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody class="checkout__totals-products">
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
                                        <tr>
                                            <input type="hidden" name="product_id[]" value="{{$details['product_id']}}">
                                            <input type="hidden" name="product_quantity[]" value="{{$details['quantity']}}">
                                            <input type="hidden" name="product_price[]" value="{{$details['price']}}">
                                            <td>{{$details['name']}} × {{$details['quantity']}}</td>
                                            <td>${{$details['price'] * $details['quantity']}}.00</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tbody class="checkout__totals-subtotals">
                                <tr>
                                    <th>Subtotal</th>
                                    <td>${{number_format($subtotal, 2, '.', ',')}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td><input type="hidden" name="shipping_price" value="{{$shipping}}">${{number_format($shipping, 2, '.', ',')}}</td>
                                </tr>
                            </tbody>
                            <tfoot class="checkout__totals-footer">
                                <tr>
                                    <th>Total</th>
                                    <td><input type="hidden" name="total_price" value="{{$total}}">${{number_format($total, 2, '.', ',')}}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="checkout__agree form-group">
                            <div class="form-check">
                                <span class="form-check-input input-check"><span class="input-check__body"><input class="input-check__input" type="checkbox" name="agree" id="checkout-terms"> <span class="input-check__box"></span> <svg class="input-check__icon" width="9px" height="7px"><use xlink:href="{{ asset('frontend/images/sprite.svg#check-9x7') }}"></use></svg> </span></span>
                                <label class="form-check-label" for="checkout-terms">I have read and agree to the website <a target="_blank" href="terms-and-conditions.html">terms and conditions</a>*</label>
                            </div>
                        </div>
                    @if (Auth::guard('customer')->user())
                        @if ($wallet->price < $total) 
                        <div class="alert alert-lg alert-danger">Sorry you don't have
                            enough balance
                        </div>
                    @else
                    <button type="submit" class="btn btn-primary btn-xl btn-block">Place Order</button>
                    @endif
                    @endif
                    @if (!Auth::guard('customer')->user())
                    <div class="col-12 mb-3">
                        <div class="alert alert-lg alert-primary">Please Login to checkout <a
                                href="{{ route('login') }}">login</a></div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /* When click show user */
        $('#country').change(function () {
            var id = $(this).val();
            var url = '{{ route("checkout-cities", ":id") }}';
            url = url.replace(':id', id);

            $.get(url, function (response) {
                response = JSON.parse(response);
                data = response.data;
                console.log(data);

                $('#city').empty();
                $.each(data, function (key, value) {
                    console.log(value);
                    var html = '<option value="' + value.id + '">' + value.name +
                        '</option>';
                    $('#city').append(
                        html
                    );
                });

            })
        });

    });

</script>


@endsection
