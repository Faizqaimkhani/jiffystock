@extends('layouts.dashboard')

@section('content')
<!-- begin container-fluid -->
<div class="container-fluid">
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Create a Supplier</h1>
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
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="/home"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Supplier
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Create a Supplier</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>
    <!-- end row -->
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-statistics">
                <div class="card-body">
                    <form action="{{ route('supplier.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <div class="row register-form">
                              <div class="col-md-6">
                                  <input type="hidden" name="user_type" value="user">
                                  <div class="form-group">
                                      <input type="text" name="name" class="form-control" placeholder="Name *" required
                                          value="{{old('name')}}" />
                                          @if($errors->has('name'))
                                              <div class="error text-danger">{{ $errors->first('name') }}</div>
                                          @endif
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="company" placeholder="Company Name *"
                                          required value="{{old('company')}}" />
                                          @if($errors->has('company'))
                                              <div class="error text-danger">{{ $errors->first('company') }}</div>
                                          @endif
                                  </div>
                                  <div class="form-group">
                                      <input type="password" autocomplete="new-password"
                                          name="password" class="form-control" placeholder="Password *"
                                          required value="" />
                                          @if($errors->has('password'))
                                          <ul class="list-unstyled">
                                            @foreach($errors->get('password') as $err)
                                              <li class="text-danger">
                                                  {{ $err }}
                                              </li>
                                            @endforeach
                                          </ul>
                                              <!-- <div class="error text-danger">{{ $errors->first('password') }}</div> -->
                                          @endif
                                  </div>
                                  <div class="form-group">
                                      <select class="form-control" id="s-country" name="country" value="{{old('country')}}" required>
                                          <option class="hidden" selected disabled>Country</option>
                                          @foreach ($countries as $country)
                                          <option value="{{$country->id}}">{{$country->name}}</option>
                                          @endforeach

                                      </select>
                                      @if($errors->has('country'))
                                              <div class="error text-danger">{{ $errors->first('country') }}</div>
                                          @endif
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="contact_number" class="form-control"
                                          placeholder="Contact Number *" required value="{{old('contact_number')}}" />
                                          @if($errors->has('contact_number'))
                                              <div class="error text-danger">{{ $errors->first('contact_number') }}</div>
                                          @endif
                                  </div>


                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <input type="email" name="email" class="form-control" placeholder="Email *" required
                                          value="{{old('email')}}" />
                                          @if($errors->has('email'))
                                              <div class="error text-danger">{{ $errors->first('email') }}</div>
                                          @endif
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="company_license" class="form-control"
                                          placeholder="Company License *" required value="{{old('company_license')}}" />
                                          @if($errors->has('company_license'))
                                              <div class="error text-danger">{{ $errors->first('company_license') }}</div>
                                          @endif
                                  </div>
                                  <div class="form-group">
                                      <input type="password" id="password-confirm" name="password_confirmation"
                                          autocomplete="new-password" class="form-control"
                                          placeholder="Confirm Password *" required value="" />
                                          @if($errors->has('password_confirmation'))
                                              <div class="error text-danger">{{ $errors->first('password_confirmation') }}</div>
                                          @endif
                                  </div>
                                  <div class="form-group">
                                      <select class="form-control" name="city" id="s-city" required>
                                          <option class="hidden" selected disabled>City</option>
                                      </select>
                                      @if($errors->has('city'))
                                              <div class="error text-danger">{{ $errors->first('city') }}</div>
                                        @endif
                                  </div>
                                  <button type="submit" class="btn btn-primary" value="">Create Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- end container-fluid -->
@endsection

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
        $('#s-country').change(function () {
            var country_id = $(this).val();
            var url = '{{ route("cities", ":id") }}';
            url = url.replace(':id', country_id);

            $.get(url, function (response) {
                response = JSON.parse(response);
                data = response.data;
                console.log(data);

                $('#s-city').empty();
                $.each(data, function (key, value) {
                    console.log(value);
                    var html = '<option value="' + value.id + '">' + value.name +
                        '</option>';
                    $('#s-city').append(
                        html
                    );
                });

            })
          });
        });
      </script>
