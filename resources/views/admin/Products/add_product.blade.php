<style>
    #circle {
        border-radius: 50%;
        border-color: black;
        width: 30px;
        height: 30px;
    }
	.product_colors_circle{
		border:1px solid black;
	}
</style>

@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'supplier_products','namePage' => 'Jiffystock Create Package Price'])

@section('service_css')
<link rel="stylesheet" href="{{ asset('css/dtsel.css') }}">
@endsection

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
                <h3>Create Product</h3>
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

                    <form action="/products" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" required name="name">
                            </div>
                            <div class="col">
                                <label for="">Category</label>
                                <select name="category" class="form-control" id="category" required>
                                    <option value="">--Select--</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Sub Category</label>
                                <select name="sub_category" id="sub-category" class="form-control" id="" required>
                                    <option value="">--Select--</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Brand Name</label>
                                <input type="text" class="form-control" required name="brand">
                            </div>
                            <div class="col">
                                <label for="">Stock Quantity</label>
                                <input type="number" class="form-control" required name="stock_quantity">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Average Market Price</label>
                                <input type="number" class="form-control" required name="average_market_price">
                            </div>
                            <div class="col">
                                <label for="">Selling Price</label>
                                <input type="number" class="form-control" required name="price">
                            </div>
                            <div class="col">
                                <label for="">Unit <small>(Please Define Unit per product e.g Kg,Piece,Meter....)</small></label>
                                <input type="text" class="form-control" required name="unit">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                              <label for="">Add Limited Time Only :</label>
                                <input type="checkbox" name="limited_time_only" id="limited_time_only">
                                <div class="limited_time_only_show">
                                  <label for="">Limited Date :</label>
                                  <input type="date" class="form-control" name="limited_date">
                                  <label for="">Limited Time :</label>
                                  <input type="time" class="form-control" name="limited_time">
                                </div>
                            </div>

                            <div class="col">
                                <label for="">Stock Location</label>
                                <input type="text" class="form-control" name="stock_location" required>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Colors: </label>
                                @foreach ($colors as $c)
                                <input type="checkbox" class="ml-4 product_colors_circle" name="color[]"  value="{{$c->id}}">
                                <label for="vehicle1" style="background: {{$c->code}}" class="border-dark product_colors_circle"
                                    id="circle"></label>
                                @endforeach
                            </div>
                        </div>
                        <div>
                                <h6>Payment</h6>

                            </div>
                            <div class="input-radio-color__list">


                                <div class="form-group ">

                                    <input type="checkbox" id="Paypal" name="payment[]" value="Paypal" checked>
                                    <label for="Paypal">Paypal</label>
                                    <input type="checkbox" id="master_card" name="payment[]" value="Master card">
                                    <label for="master_card">Master Card</label>
                                    <input type="checkbox" id="cradit" name="payment[]" value="Cradit">
                                    <label for="cradit">Cradit Card</label>
                                    <input type="checkbox" id="debit" name="payment[]" value="Debit card">
                                    <label for="debit">Debit Card</label>
                                    <input type="checkbox" id="bank_transfer" name="payment[]" value="Bank Transfer">
                                    <label for="bank_transfer">Bank Transfer</label>
                                    <input type="checkbox" id="wechat" name="payment[]" value="We Chat">
                                    <label for="wechat">We Chat</label>

                                </div>
                                <div>
                                <h6>Delivery</h6>

                            </div>
                            <div class="input-radio-color__list">


                                <div class="form-group ">

                                    <input type="checkbox" id="door_step" name="delivery[]" value="Door Step" checked>
                                    <label for="door_step">Door Step</label>
                                    <input type="checkbox" id="national" name="delivery[]" value="National">
                                    <label for="national">National Delivery</label>
                                    <input type="checkbox" id="international" name="delivery[]" value="International">
                                    <label for="international">Cradit Card</label>


                                </div>
                            </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Little Describede</label>
                                <textarea name="little_describe" required id="" cols="30" class="form-control"
                                    rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Description</label>
                                <textarea name="description" id="" required cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Video</label>
                                <input type="file" class="form-control" name="video">
                            </div>
                            <div class="col">
                                <label for="">Image 1</label>
                                <input type="file" class="form-control" required name="image1">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Image 2</label>
                                <input type="file" class="form-control" name="image2">
                            </div>
                            <div class="col">
                                <label for="">Image 3</label>
                                <input type="file" class="form-control" name="image3">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="">Image 4</label>
                                <input type="file" class="form-control" name="image4">
                            </div>
                            <div class="col">
                                <label for="">Image 5</label>
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
<!-- end container-fluid -->


@section('js')
<script type="text/javascript" src="{{ asset('js/dtsel.js') }}"></script>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
      $(".limited_time_only_show").hide();
      let checkbox = $("#limited_time_only").click(function(){
        let checkbox = $("#limited_time_only").is(":checked");

        if (checkbox) {
          $(".limited_time_only_show").show();
        }else{
          $(".limited_time_only_show").hide();
        }
      });

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
