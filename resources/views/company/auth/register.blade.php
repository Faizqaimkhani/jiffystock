@extends('new-layouts.app',['title' => 'Jiffystock - Sign Up to JiffyStock ','top_bar' => 'hide'])
@include('layouts.signin')

@section('content')

<div class="register">

    <div class="row">
        <div class="col-md-12 register-right">
            <ul class="nav nav-tabs nav-justified col-12" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Shipment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Clearance</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h1 class="register-heading">Apply as a Shipment Company</h1>
                    <form method="POST" action="{{ route('company.shipment.register') }}" class="shipment-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{old('shipment') ? 'true' : 'false'}}" name="shipment" class="shipment">
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="shipment_name"
                                        placeholder="Full Name *" value="{{old('shipment_name')}}" />
                                        @if($errors->has('shipment_name'))
                                            <div class="error text-danger shipment-errors">{{ $errors->first('shipment_name') }}</div>
                                        @endif

                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="shipment_company" placeholder="Company Name *"
                                        required value="{{old('shipment_company')}}" />
                                        @if($errors->has('shipment_company'))
                                            <div class="error text-danger shipment-errors">{{ $errors->first('shipment_company') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" required autocomplete="new-password" name="shipment_password" class="@error('shipment_password')
                                        is-invalid @enderror form-control"
                                        placeholder="Password *" value="" />
                                        @if($errors->has('shipment_password'))
                                            <div class="error text-danger shipment-errors">{{ $errors->first('shipment_password') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="shipment_country" id="country" value="{{old('shipment_country')}}" required>
                                        <option class="hidden" selected disabled>Country </option>
                                        @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('shipment_country'))
                                        <div class="error text-danger shipment-errors">{{ $errors->first('shipment_country') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" required name="shipment_contact_number"
                                        class="form-control" placeholder="Contact Number *" value="{{old('shipment_contact_number')}}" />
                                        @if($errors->has('shipment_contact_number'))
                                            <div class="error text-danger shipment-errors">{{ $errors->first('shipment_contact_number') }}</div>
                                        @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" required name="shipment_email" class="form-control"
                                        placeholder="Your Email *" value="{{old('shipment_email')}}" />
                                        @if($errors->has('shipment_email'))
                                            <div class="error text-danger shipment-errors">{{ $errors->first('shipment_email') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" name="shipment_company_license" class="form-control"
                                        placeholder="Company License *" required value="{{old('shipment_company_license')}}" />
                                        @if($errors->has('shipment_company_license'))
                                            <div class="error text-danger shipment-errors">{{ $errors->first('shipment_company_license') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password-confirm" name="shipment_password_confirmation"
                                        autocomplete="new-password" class="form-control"
                                        placeholder="Confirm Password *" required  />
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="shipment_city" id="city" required value="{{old('shipment_city')}}">
                                        <option class="hidden" selected disabled>City</option>
                                    </select>
                                    @if($errors->has('shipment_city'))
                                            <div class="error text-danger shipment-errors">{{ $errors->first('shipment_city') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="file">License/Certificate :</label>
                                    <input type="file" name="file" class="form-control" required>
                                    @if($errors->has('file'))
                                    <div class="error text-danger shipment-errors">{{ $errors->first('file') }}</div>
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
                    <h1 class="register-heading">Apply as a Clearance Agency</h1>
                    <form method="POST" action="{{ route('company.clearance.register') }}" class="clearance-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden"  value="{{old('clearance') ? 'true' : 'false'}}" name="clearance" class="clearance">

                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="clearance_name" class="form-control" placeholder="Name *" required
                                        value="{{old('clearance_name')}}" />
                                        @if($errors->has('clearance_name'))

                                            <div class="error text-danger clearance-errors">{{ $errors->first('clearance_name') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="clearance_company" placeholder="Company Name *"
                                        required value="{{old('clearance_company')}}" />
                                        @if($errors->has('clearance_company'))
                                            <div class="error text-danger clearance-errors">{{ $errors->first('clearance_company') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" autocomplete="new-password"  name="clearance_password" class="form-control @error('clearance_password') is-invalid
                                        @enderror" placeholder="Password *"
                                        required value="" />
                                        @if($errors->has('clearance_password'))
                                            <div class="error text-danger clearance-errors">{{ $errors->first('clearance_password') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="s-country" name="clearance_country" required value="{{old('clearance_country')}}">
                                        <option class="hidden" selected disabled>Country</option>
                                        @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach

                                    </select>
                                    @if($errors->has('clearance_country'))
                                            <div class="error text-danger clearance-errors">{{ $errors->first('clearance_country') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" name="clearance_contact_number" class="form-control"
                                        placeholder="Contact Number *" required value="{{old('clearance_contact_number')}}" />
                                        @if($errors->has('clearance_contact_number'))
                                            <div class="error text-danger clearance-errors">{{ $errors->first('clearance_contact_number') }}</div>
                                        @endif
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="clearance_email" class="form-control" placeholder="Email *" required
                                        value="{{old('clearance_email')}}" />
                                        @if($errors->has('clearance_email'))
                                            <div class="error text-danger clearance-errors">{{ $errors->first('clearance_email') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" name="clearance_company_license" class="form-control"
                                        placeholder="Company License *" required value="{{old('clearance_company_license')}}" />
                                        @if($errors->has('clearance_company_license'))
                                            <div class="error text-danger clearance-errors">{{ $errors->first('clearance_company_license') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password-confirm" name="clearance_password_confirmation"
                                        autocomplete="new-password" class="form-control"
                                        placeholder="Confirm Password *" required value="" />
                                        @if($errors->has('clearance_password_confirmation'))
                                            <div class="error text-danger clearance-errors">{{ $errors->first('clearance_password_confirmation') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="clearance_city" id="s-city" required value="{{old('clearance_city')}}">
                                        <option class="hidden" selected disabled>City</option>
                                    </select>
                                    @if($errors->has('clearance_city'))
                                            <div class="error text-danger clearance-errors">{{ $errors->first('clearance_city') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="file">License/Certificate :</label>
                                    <input type="file" name="file" class="form-control" required>
                                    @if($errors->has('file'))
                                    <div class="error text-danger shipment-errors">{{ $errors->first('file') }}</div>
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

        if ($(".shipment").val() == "true") {
          $("#home-tab").click();
          $(".clearance-form").trigger('reset');
        }
        if ($(".clearance").val() == "true") {
          $("#profile-tab").click();
          $(".shipment-form").trigger('reset');
        }



    });

</script>

@endsection
