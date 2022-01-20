@extends('new-layouts.app',['title' => 'Jiffystock - Sign Up to JiffyStock ','top_bar' => 'hide'])

@include('layouts.signin')


@section('content')

<div class="register">

    <div class="row">
        <div class="col-md-12 register-right">
            <ul class="nav nav-tabs nav-justified col-12" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Buyer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Supplier</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h1 class="register-heading">Apply as a Buyer</h1>
                    <form method="POST" action="{{ route('register.customer') }}">
                        @csrf
                        <div class="row register-form">
							<div class="col-lg-12">
								@if($errors->any())
									<div class="alert alert-danger">
										<p><strong>Opps Something went wrong</strong></p>
										<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
										</ul>
									</div>
								@endif
							</div>
                            <div class="col-md-6">
								
                                <input type="hidden" name="user_type" value="customer">
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="name"
                                        placeholder="Full Name *"  value="{{old('name')}}" />
                                            @if($errors->has('name'))
                                                  <div class="error text-danger">{{ $errors->first('name') }}</div>
                                              @endif

                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="company" placeholder="Company Name *"
                                        required  value="{{old('company')}}" />
                                        @if($errors->has('company'))
                                            <div class="error text-danger">{{ $errors->first('company') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" required autocomplete="new-password" name="password" class="form-control"
                                        placeholder="Password *" value="" />
                                        @if($errors->has('password'))
                                            <div class="error text-danger">{{ $errors->first('password') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="country" id="country" required>
                                        <option class="hidden" selected disabled>Country </option>
                                        @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('country'))
                                        <div class="error text-danger">{{ $errors->first('country') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="maxl">
                                        <div class="form-group">
                                            <select class="form-control" name="category" required>
                                                <option class="hidden" selected disabled>Category Interested </option>
                                                @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('category'))
                                                <div class="error text-danger">{{ $errors->first('category') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" required name="email" class="form-control"
                                        placeholder="Your Email *" value="{{old('email')}}" />
                                        @if($errors->has('email'))
                                          <div class="error text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" required name="contact_number" name="contact_number"
                                        class="form-control" placeholder="Contact Number *"  value="{{old('contact_number')}}" />
                                        @if($errors->has('contact_number'))
                                                <div class="error text-danger">{{ $errors->first('txtEmpPhone') }}</div>
                                            @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password-confirm" name="password_confirmation"
                                        autocomplete="new-password" class="form-control"
                                        placeholder="Confirm Password *" required value="" />
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="city" id="city" required>
                                        <option class="hidden" selected disabled>City</option>
                                    </select>
                                    @if($errors->has('city'))
                                      <div class="error text-danger">{{ $errors->first('city') }}</div>
                                    @endif
                                  </div>
                                  <div class="form-group captcha">
                                      <span>{!! captcha_img() !!}</span>
                                      <button type="button" class="btn btn-danger" class="reload" id="reload-captcha-1">
                                          &#x21bb;
                                      </button>
                                  </div>
                                  <div class="form-group">
                                       <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha" required>
                                       @if($errors->has('captcha'))
                                       <div class="error text-danger shipment-errors">Invalid Captcha</div>
                                       @endif
                                   </div>
                                <div class="form-group">
                                  <label for="terms_conditions">Accept Our Terms and conditions
                                    <input type="checkbox" name="terms_conditions" required>
                                  </label>
                                  @if($errors->has('terms_conditions'))
                                    <div class="error text-danger shipment-errors">Accept Terms And Conditions</div>
                                  @endif
                                </div>
                                <input type="submit" class="btnRegister" value="Create Account" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h1 class="register-heading">Apply as a Supplier</h1>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row register-form">
                            <div class="col-md-6">
                                <input type="hidden" name="user_type" value="user">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name *" required
                                        value="" />
                                        @if($errors->has('name'))
                                            <div class="error text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="company" placeholder="Company Name *"
                                        required value="" />
                                        @if($errors->has('company'))
                                            <div class="error text-danger">{{ $errors->first('company') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" autocomplete="new-password"  name="password" class="form-control" placeholder="Password *"
                                        required value="" />
                                        @if($errors->has('password'))
                                            <div class="error text-danger">{{ $errors->first('password') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="s-country" name="country" required>
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
                                        placeholder="Contact Number *" required value="" />
                                        @if($errors->has('contact_number'))
                                        <div class="error text-danger">{{ $errors->first('contact_number') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email *" required
                                        value="" />
                                        @if($errors->has('email'))
                                        <div class="error text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" name="company_license" class="form-control"
                                        placeholder="Company License *" required value="" />
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
                                <div class="form-group">
                                  <label for="files">Provide License/Certificate Image</label>
                                  <input type="file" name="file" class="form-control" required>
                                  @if($errors->has('file'))
                                  <div class="error text-danger shipment-errors">{{ $errors->first('file') }}</div>
                                  @endif
                                </div>
                                <div class="form-group captcha">
                                    <span>{!! captcha_img() !!}</span>
                                    <button type="button" class="btn btn-danger" class="reload" id="reload-captcha-2">
                                        &#x21bb;
                                    </button>
                                </div>
                                <div class="form-group">
                                     <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha" required>
                                     @if($errors->has('captcha'))
                                     <div class="error text-danger shipment-errors">Invalid Captcha</div>
                                     @endif
                                 </div>
                                 <div class="form-group">
                                   <label for="terms_conditions">Accept Our Terms and conditions
                                     <input type="checkbox" name="terms_conditions" required>
                                   </label>
                                   @if($errors->has('terms_conditions'))
                                    <div class="error text-danger shipment-errors">Accept Terms And Conditions</div>
                                   @endif
                                 </div>
                                <input type="submit" class="btnRegister" value="Create Account">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {

      $('#reload-captcha-1').click(function () {
          $.ajax({
              type: 'GET',
              url: "{{ url('reload-captcha') }}",
              success: function (data) {
                  $(".captcha span").html(data.captcha);
              }
          });
      });
      $('#reload-captcha-2').click(function () {
          $.ajax({
              type: 'GET',
              url: "{{ url('reload-captcha') }}",
              success: function (data) {
                  $(".captcha span").html(data.captcha);
              }
          });
      });
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

        /* When click show user */
        $('#country').change(function () {
            var country_id = $(this).val();
            var url = '{{ route("cities", ":id") }}';
            url = url.replace(':id', country_id);

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
