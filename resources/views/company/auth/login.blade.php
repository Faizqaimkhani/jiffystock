@extends('new-layouts.app',['title' => 'Jiffystock - Sign in to your account ','top_bar' => 'hide'])

@section('content')
<div class="back">
<div class="container login-container">

  <div class="section">
    <div class="container">
      <div class="row">
          <div class="col-md-4 offset-md-2">
            <div class="register">
            <h4>Login for Shipment Company</h4>
            <p>Please enter your email address and password</p>
            <span class="text-danger">
              @if(Session::has('shipment-error'))
              {{ Session::get('shipment-error') }}
              @endif
            </span>
              <form method="POST" action="{{ route('company.shipment.login') }}">
                  @csrf
                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="Your Email *" value="" name="shipment_email" />
                      @if($errors->has('shipment_email'))
                          <div class="error text-danger">{{ $errors->first('shipment_email') }}</div>
                      @endif
                  </div>
                  <div class="form-group">
                      <input type="password" name="shipment_password" class="form-control" placeholder="Your Password *" value="" />
                      @if($errors->has('shipment_password'))
                          <div class="error text-danger">{{ $errors->first('shipment_password') }}</div>
                      @endif
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn theme-btn full" value="Login" />
                  </div>
                  <div class="form-group text-center">
                      <a href="{{ route('forget.password.get') }}" class="text-brand">Reset Password</a>
                      <br>
                      <a href="{{route('company.register')}}" class="text-brand" value="Login">Create Account</a>
                  </div>
              </form>
            </div>
          </div>
          <div class="col-md-4">
              <div class="register">

              <span class="text-warning">
              @if(Session::has('clearance-error'))
                {{ Session::get('clearance-error') }}
              @endif
              </span>
              <h4>Login for Clearance Agency</h4>
              <p>Please enter your email address and password</p>
              <form method="POST" action="{{ route('company.clearance.login') }}">
                  @csrf
                  <div class="form-group">
                      <input type="text" class="form-control" name="clearance_email" placeholder="Your Email *" value="" />
                      @if($errors->has('clearance_email'))
                          <div class="error text-danger">{{ $errors->first('clearance_email') }}</div>
                      @endif
                  </div>
                  <div class="form-group">
                      <input type="password" class="form-control" name="clearance_password" placeholder="Your Password *" value="" />
                      @if($errors->has('clearance_password'))
                          <div class="error text-danger">{{ $errors->first('clearance_password') }}</div>
                      @endif
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn theme-btn full" value="Login" />
                  </div>
                  <div class="form-group text-center">
                      <a href="{{ route('forget.password.get') }}" class="text-brand">Reset Password</a>
                      <br>
                      <a href="{{route('company.register')}}" class="text-brand" value="Login">Create Account</a>
                  </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
