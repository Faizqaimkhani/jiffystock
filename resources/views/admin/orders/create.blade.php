@extends('new-layouts.dashboard.layouts.app', ['activePage' => 'admin_orders','namePage' => 'Jiffystock Orders Management'])

@section('content')
<!-- begin container-fluid -->
   <div class="panel-header panel-header-sm">
    </div>
    @if (session()->has('message'))
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <span>{{ session()->get('message') }}</span>
      </div>
      <br>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <span>{{ session()->get('error') }}</span>
    </div>
    <br>
    @endif
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Place Order</h4>
            </div>
            <div class="card-body">
              <div class="content p-3">
                <form action="{{ route('order.store') }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <input type="hidden" name="group_id" value="{{ request('group_id') }}">
                      <div class="form-group">
                        <label for="name">Name : </label>
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                        @if($errors->has('name'))
                            <div class="error text-danger">{{ $errors->first('name') }}</div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="email">Email : </label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="" required>
                        @if($errors->has('email'))
                            <div class="error text-danger">{{ $errors->first('email') }}</div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="contact_no">Contact No : </label>
                        <input type="text" name="contact_no" class="form-control" placeholder="Contact Number" value="" required>
                        @if($errors->has('contact_no'))
                            <div class="error text-danger">{{ $errors->first('contact_no') }}</div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="country">Country : </label>
                        <select class="form-control" name="country" id="country" required>
                          <option selected hidden disabled>Select Country</option>
                          @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                          @endforeach
                        </select>
                        @if($errors->has('country'))
                            <div class="error text-danger">{{ $errors->first('country') }}</div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="city">City : </label>
                        <select class="form-control" name="city" id="city" required>
                          <option selected hidden disabled>Select City</option>
                        </select>
                        @if($errors->has('city'))
                            <div class="error text-danger">{{ $errors->first('city') }}</div>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="zip_code">Zip Code : </label>
                        <input type="text" name="zip_code" class="form-control" placeholder="Zip Code" value="" required>
                        @if($errors->has('zip_code'))
                            <div class="error text-danger">{{ $errors->first('zip_code') }}</div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="address">Address : </label>
                        <input type="text" name="address" class="form-control" placeholder="Address" value="" required>
                        @if($errors->has('address'))
                            <div class="error text-danger">{{ $errors->first('address') }}</div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="product_quantity">Product Quantity : </label>
                        <input type="number" name="product_quantity" class="form-control" placeholder="Product Quantity" value="" required>
                        @if($errors->has('product_quantity'))
                            <div class="error text-danger">{{ $errors->first('product_quantity') }}</div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="shipping_price">Shipping Price : </label>
                        <input type="number" name="shipping_price" class="form-control" placeholder="Shipping Price" value="" required>
                        @if($errors->has('shipping_price'))
                            <div class="error text-danger">{{ $errors->first('shipping_price') }}</div>
                        @endif
                      </div>
                    </div>
                    <div class="form-group pl-3">
                      <button type="submit" class="btn btn-primary">Place Order</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
<!-- end container-fluid -->
@endsection

@push('js')
  <script type="text/javascript">
    $('#country').change(function () {
        var country_id = $(this).val();
        var url = '{{ route("cities", ":id") }}';
        url = url.replace(':id', country_id);

        $.get(url, function (response) {
            response = JSON.parse(response);
            data = response.data;
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
  </script>
@endpush
