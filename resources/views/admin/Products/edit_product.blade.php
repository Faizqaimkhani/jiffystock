<style>
    #circle {
        border-radius: 50%;
        border-color: black;
        width: 30px;
        height: 30px;
    }

</style>

@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'supplier_products','namePage' => 'Jiffystock Edit Package Price'])

@section('content')

   <div class="panel-header panel-header-sm">
    </div>
<!-- begin container-fluid -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-body">
              <div class="container">

              <div class="card-title">
                <h3>Edit Product</h3>
              </div>
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color: red">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form action="/products/{{ $product->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <label for="">Name</label>
                                <input type="text" class="form-control" value="{{ $product->name }}" required
                                    name="name">
                            </div>
                            <div class="col">
                                <label for="">Category</label>
                                <select name="category" class="form-control" id="category" required>

                                @foreach ($categories as $category)
                                  @if(isset($product->sub_category) && isset($product->sub_category->product_category) && $product->sub_category->product_category->id == $category->id )
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                   @endif
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>


                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Sub Category</label>
                                <select name="sub_category" class="form-control" id="sub-category" required>
                                    @if(isset($product->sub_category))

                                    <option value="{{ $product->sub_category->id }}">{{ $product->sub_category->name }}</option>
                                @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Brand Name</label>
                                <input type="text" class="form-control" value="{{ $product->brand }}" required
                                    name="brand">
                            </div>
                            <div class="col">
                                <label for="">Stock Quantity</label>
                                <input type="text" class="form-control" value="{{ $product->stock_quantity }}" required
                                    name="stock_quantity">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Average Market Price</label>
                                <input type="text" class="form-control" value="{{ $product->average_market_price }}" required name="average_market_price">
                            </div>
                            <div class="col">
                                <label for="">Price</label>
                                <input type="text" class="form-control" value="{{ $product->price }}" required
                                    name="price">
                            </div>
                            <div class="col">
                                <label for="">Unit</label>
                                <input type="text" class="form-control" value="{{ $product->unit }}" required
                                    name="unit">
                            </div>
                            <!-- <div class="col">
                                <label for="">Add Duration</label>
                                <select name="add_duration" class="form-control" id="">
                                    <option value="0">Select</option>
                                    <option value="1">24 Hours</option>
                                    <option value="2">3 Days</option>
                                    <option value="3">7 Days</option>
                                </select>
                            </div> -->
                        </div>
                        <div>
                                <h6>Payment</h6>

                            </div>
                            <div class="input-radio-color__list">
                                @php

                                    $payment = json_decode($product->payment);
                                    $delivery = json_decode($product->delivery);
                                    if(empty($payment)){
                                        $payment = ["Paypal"];
                                    }
                                    if(empty($delivery)){
                                        $delivery = ["Door Step"];
                                    }
                                @endphp

                                <div class="form-group ">

                                    <input type="checkbox" id="Paypal" name="payment[]" value="Paypal" {{in_array('Paypal',$payment)==true?"checked":""}} >
                                    <label for="Paypal">Paypal</label>
                                    <input type="checkbox" id="master_card" name="payment[]" value="Master card" {{in_array('Master card',$payment)==true?"checked":""}}>
                                    <label for="master_card">Master Card</label>
                                    <input type="checkbox" id="cradit" name="payment[]" value="Cradit" {{in_array('Cradit',$payment)==true?"checked":""}}>
                                    <label for="cradit">Cradit Card</label>
                                    <input type="checkbox" id="debit" name="payment[]" value="Debit card" {{in_array('Debit card',$payment)==true?"checked":""}}>
                                    <label for="debit">Debit Card</label>
                                    <input type="checkbox" id="bank_transfer" name="payment[]" value="Bank Transfer" {{in_array('Bank Transfer',$payment)==true?"checked":""}}>
                                    <label for="bank_transfer">Bank Transfer</label>
                                    <input type="checkbox" id="wechat" name="payment[]" value="We Chat" {{in_array('We Chat',$payment)==true?"checked":""}}>
                                    <label for="wechat">We Chat</label>

                                </div>
                                <div>
                                <h6>Delivery</h6>

                            </div>
                            <div class="input-radio-color__list">


                                <div class="form-group ">

                                    <input type="checkbox" id="door_step" name="delivery[]" value="Door Step" {{in_array('Door Step',$delivery)==true?"checked":""}}>
                                    <label for="door_step">Door Step</label>
                                    <input type="checkbox" id="national" name="delivery[]" value="National" {{in_array('National',$delivery)==true?"checked":""}}>
                                    <label for="national">National Delivery</label>
                                    <input type="checkbox" id="international" name="delivery[]" value="International" {{in_array('International',$delivery)==true?"checked":""}}>
                                    <label for="international">Cradit Card</label>


                                </div>
                            </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Color</label>
                                    @php
                                    $p_colors = explode(",", $product->color);
                                    @endphp
                                @foreach ($colors as $color)
                                <input type="checkbox" @foreach ($p_colors as $c)
                                    @if ($color->id == $c)
                                        checked
                                    @endif
                                @endforeach class="ml-4" name="color[]" value="{{$color->id}}">
                                <label for="vehicle1" style="background: {{$color->code}}" class="border-dark"
                                    id="circle"></label>
                                @endforeach

                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Short Description</label>
                                {{-- <input type="text" class="form-control" value="{{ $product->price }}" required
                                    name="little"> --}}
                                <textarea class="form-control" name="little_describe" id="" cols="30" rows="5">{{ $product->little_describe }}</textarea>
                                </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Description</label>
                                {{-- <input type="text" class="form-control" value="{{ $product->price }}" required
                                    name="little"> --}}
                                <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ $product->description }}</textarea>
                                </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Video</label>
                                <br>
                                <img src="{{ asset('storage/uploads/Products-Video/' . $product->video) }}"
                                    style="width:200px; height:200px" alt="">
                                <input type="hidden" name="old_video" value="{{$product->video}}">
                                <input type="file" class="form-control" name="video">
                            </div>
                            <div class="col">
                                <label for="">Image 1</label>
                                <br>
                                <img src="{{ asset('storage/uploads/Products-Images/' . $product->image1) }}"
                                    style="width:200px; height:200px" alt="">
                                <input type="hidden" name="old_image1" value="{{$product->image1}}">
                                <input type="file" class="form-control" name="image1">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Image 2</label>
                                <br>
                                <img src="{{ asset('storage/uploads/Products-Images/' . $product->image2) }}"
                                    style="width:200px; height:200px" alt="">
                                <input type="hidden" name="old_image2" value="{{$product->image2}}">
                                <input type="file" class="form-control" name="image2">
                            </div>
                            <div class="col">
                                <label for="">Image 3</label>
                                <br>
                                <img src="{{ asset('storage/uploads/Products-Images/' . $product->image3) }}"
                                    style="width:200px; height:200px" alt="">
                                <input type="hidden" name="old_image3" value="{{$product->image3}}">
                                <input type="file" class="form-control" name="image3">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Image 4</label>
                                <br>
                                <img src="{{ asset('storage/uploads/Products-Images/' . $product->image4) }}"
                                    style="width:200px; height:200px" alt="">
                                <input type="hidden" name="old_image4" value="{{$product->image4}}">
                                <input type="file" class="form-control" name="image4">
                            </div>
                            <div class="col">
                                <label for="">Image 5</label>
                                <br>
                                <img src="{{ asset('storage/uploads/Products-Images/' . $product->image5) }}"
                                    style="width:200px; height:200px" alt="">
                                <input type="hidden" name="old_image5" value="{{$product->image5}}">
                                <input type="file" class="form-control" name="image5">
                            </div>
                        </div>
                        <div class="mt-4 mb-2">
                            <button class="btn btn-primary">Submit</button>
                            <a href="/products" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

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
        $('#category').change(function () {
            var category_id = $(this).val();
            var url = '{{ route("products_sub_categories", ":id") }}';
            url = url.replace(':id', category_id);

            $.get(url, function (response) {
                response = JSON.parse(response);
                data = response.data;
                console.log(data);

                $('#sub-category').empty();
                $.each(data, function (key, value) {
                    console.log(value);
                    var html = '<option value="' + value.id + '">' + value.name +
                        '</option>';
                    $('#sub-category').append(
                        html
                    );
                });

            })
        });

    });

</script>


@endsection
