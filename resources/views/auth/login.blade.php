@extends('new-layouts.app',['title' => 'Jiffystock - Sign in to your account ','top_bar' => 'hide'])


@section('content')
<div class="back">
<div class="container login-container">

  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-2">
          <div class="register">
            <h4>Buyer Login</h4>
            <p>Please enter your email address and password</p>
            <form method="POST" action="{{ route('customer.login') }}">
                @csrf
                <input type="hidden" name="usertype" value="customer">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your Email *" value="" name="email_cus" />
                    @if (\Session::has('email_cus'))
                        <div class="error text-danger">
                            {!! \Session::get('email_cus') !!}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" name="password_cus" class="form-control" placeholder="Your Password *" value="" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn theme-btn full" value="Login" />
                </div>
                <div class="form-group text-center">
                    <a href="{{ route('cus.forget.password.get') }}" class="text-brand">Reset Password</a>
                    <br>
                    <a href="{{route('register')}}" class="text-brand" value="Login">Create Account</a>
                </div>
            </form>
            <div class="text-center">
              <a href="{{route('google_customer')}}" class="btn  btn-light  ">
                <strong><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                  width="25" height="25"
                  viewBox="0 0 172 172"
                  style=" fill:#000000;"><g transform="translate(-6.88,-6.88) scale(1.08,1.08)"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M156.27275,71.96408h-5.77275v-0.29742h-64.5v28.66667h40.50242c-5.90892,16.68758 -21.78667,28.66667 -40.50242,28.66667c-23.74675,0 -43,-19.25325 -43,-43c0,-23.74675 19.25325,-43 43,-43c10.96142,0 20.93383,4.13517 28.52692,10.88975l20.27092,-20.27092c-12.79967,-11.92892 -29.92083,-19.2855 -48.79783,-19.2855c-39.57792,0 -71.66667,32.08875 -71.66667,71.66667c0,39.57792 32.08875,71.66667 71.66667,71.66667c39.57792,0 71.66667,-32.08875 71.66667,-71.66667c0,-4.80525 -0.4945,-9.49583 -1.39392,-14.03592z" fill="#ffc107"></path><path d="M22.5965,52.64275l23.54608,17.26808c6.37117,-15.77383 21.801,-26.91083 39.85742,-26.91083c10.96142,0 20.93383,4.13517 28.52692,10.88975l20.27092,-20.27092c-12.79967,-11.92892 -29.92083,-19.2855 -48.79783,-19.2855c-27.52717,0 -51.39933,15.54092 -63.4035,38.30942z" fill="#ff3d00"></path><path d="M86,157.66667c18.5115,0 35.33167,-7.08425 48.04892,-18.60467l-22.18083,-18.7695c-7.19533,5.45025 -16.13933,8.7075 -25.86808,8.7075c-18.6405,0 -34.46808,-11.88592 -40.43075,-28.47317l-23.3705,18.00625c11.86083,23.20925 35.948,39.13358 63.80125,39.13358z" fill="#4caf50"></path><path d="M156.27275,71.96408h-5.77275v-0.29742h-64.5v28.66667h40.50242c-2.838,8.01592 -7.99442,14.92817 -14.64508,19.96275c0.00358,-0.00358 0.00717,-0.00358 0.01075,-0.00717l22.18083,18.7695c-1.5695,1.42617 23.61775,-17.22508 23.61775,-53.05842c0,-4.80525 -0.4945,-9.49583 -1.39392,-14.03592z" fill="#1976d2"></path></g></g></g></svg></strong>
                </a>
              </div>
          </div>
        </div>
        <div class="col-md-4 ">
          <div class="register">
            <h4>Supplier Login</h4>
            <p>Please enter your email address and password</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="hidden" name="usertype" value="user">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Your Email *" value="" />
                    @if($errors->has('email'))
                        <div class="error text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Your Password *" value="" />
                    @if($errors->has('password'))
                        <div class="error text-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn theme-btn full" value="Login" />
                </div>
                <div class="form-group text-center">
                  <a href="{{ route('forget.password.get') }}" class="text-brand">Reset Password</a>
                  <br>
                    <a href="{{route('register')}}" class="text-brand" value="Login">Create Account</a>
                </div>
            </form>
            <div class="text-center">
              <a href="{{route('google_user')}}" class="btn  btn-light">
                   <strong><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                  width="25" height="25"
                  viewBox="0 0 172 172"
                  style=" fill:#000000;"><g transform="translate(-6.88,-6.88) scale(1.08,1.08)"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M156.27275,71.96408h-5.77275v-0.29742h-64.5v28.66667h40.50242c-5.90892,16.68758 -21.78667,28.66667 -40.50242,28.66667c-23.74675,0 -43,-19.25325 -43,-43c0,-23.74675 19.25325,-43 43,-43c10.96142,0 20.93383,4.13517 28.52692,10.88975l20.27092,-20.27092c-12.79967,-11.92892 -29.92083,-19.2855 -48.79783,-19.2855c-39.57792,0 -71.66667,32.08875 -71.66667,71.66667c0,39.57792 32.08875,71.66667 71.66667,71.66667c39.57792,0 71.66667,-32.08875 71.66667,-71.66667c0,-4.80525 -0.4945,-9.49583 -1.39392,-14.03592z" fill="#ffc107"></path><path d="M22.5965,52.64275l23.54608,17.26808c6.37117,-15.77383 21.801,-26.91083 39.85742,-26.91083c10.96142,0 20.93383,4.13517 28.52692,10.88975l20.27092,-20.27092c-12.79967,-11.92892 -29.92083,-19.2855 -48.79783,-19.2855c-27.52717,0 -51.39933,15.54092 -63.4035,38.30942z" fill="#ff3d00"></path><path d="M86,157.66667c18.5115,0 35.33167,-7.08425 48.04892,-18.60467l-22.18083,-18.7695c-7.19533,5.45025 -16.13933,8.7075 -25.86808,8.7075c-18.6405,0 -34.46808,-11.88592 -40.43075,-28.47317l-23.3705,18.00625c11.86083,23.20925 35.948,39.13358 63.80125,39.13358z" fill="#4caf50"></path><path d="M156.27275,71.96408h-5.77275v-0.29742h-64.5v28.66667h40.50242c-2.838,8.01592 -7.99442,14.92817 -14.64508,19.96275c0.00358,-0.00358 0.00717,-0.00358 0.01075,-0.00717l22.18083,18.7695c-1.5695,1.42617 23.61775,-17.22508 23.61775,-53.05842c0,-4.80525 -0.4945,-9.49583 -1.39392,-14.03592z" fill="#1976d2"></path></g></g></g></svg></strong>
                            </a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- <div class="row justify-content-around">
        <div class="col-md-5 login-form-1 text-center">
            <h3>Login for Buyer</h3>

            <form method="POST" action="{{ route('customer.login') }}">
                @csrf
                <input type="hidden" name="usertype" value="customer">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your Email *" value="" name="email_cus" />
                    @if (\Session::has('email_cus'))
                      <div class="error text-danger">
                          {!! \Session::get('email_cus') !!}
                      </div>
                  @endif
                </div>
                <div class="form-group">
                    <input type="password" name="password_cus" class="form-control" placeholder="Your Password *" value="" />

                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Login" />
                </div>
                <div class="form-group">
                <a href="{{ route('cus.forget.password.get') }}" class=" mr-5 text-light">Reset Password</a>

                    <a href="{{route('register')}}" class="ForgetPwd" value="Login">Create Account</a>
                </div>
            </form>
            <a href="{{route('google_customer')}}" class="btn  btn-light  ">
                 <strong><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                    width="25" height="25"
                    viewBox="0 0 172 172"
                    style=" fill:#000000;"><g transform="translate(-6.88,-6.88) scale(1.08,1.08)"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M156.27275,71.96408h-5.77275v-0.29742h-64.5v28.66667h40.50242c-5.90892,16.68758 -21.78667,28.66667 -40.50242,28.66667c-23.74675,0 -43,-19.25325 -43,-43c0,-23.74675 19.25325,-43 43,-43c10.96142,0 20.93383,4.13517 28.52692,10.88975l20.27092,-20.27092c-12.79967,-11.92892 -29.92083,-19.2855 -48.79783,-19.2855c-39.57792,0 -71.66667,32.08875 -71.66667,71.66667c0,39.57792 32.08875,71.66667 71.66667,71.66667c39.57792,0 71.66667,-32.08875 71.66667,-71.66667c0,-4.80525 -0.4945,-9.49583 -1.39392,-14.03592z" fill="#ffc107"></path><path d="M22.5965,52.64275l23.54608,17.26808c6.37117,-15.77383 21.801,-26.91083 39.85742,-26.91083c10.96142,0 20.93383,4.13517 28.52692,10.88975l20.27092,-20.27092c-12.79967,-11.92892 -29.92083,-19.2855 -48.79783,-19.2855c-27.52717,0 -51.39933,15.54092 -63.4035,38.30942z" fill="#ff3d00"></path><path d="M86,157.66667c18.5115,0 35.33167,-7.08425 48.04892,-18.60467l-22.18083,-18.7695c-7.19533,5.45025 -16.13933,8.7075 -25.86808,8.7075c-18.6405,0 -34.46808,-11.88592 -40.43075,-28.47317l-23.3705,18.00625c11.86083,23.20925 35.948,39.13358 63.80125,39.13358z" fill="#4caf50"></path><path d="M156.27275,71.96408h-5.77275v-0.29742h-64.5v28.66667h40.50242c-2.838,8.01592 -7.99442,14.92817 -14.64508,19.96275c0.00358,-0.00358 0.00717,-0.00358 0.01075,-0.00717l22.18083,18.7695c-1.5695,1.42617 23.61775,-17.22508 23.61775,-53.05842c0,-4.80525 -0.4945,-9.49583 -1.39392,-14.03592z" fill="#1976d2"></path></g></g></g></svg></strong>
          </a>
        </div>
        <div class="col-md-5 login-form-2 text-center">
            <h3>Login for Supplier</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="hidden" name="usertype" value="user">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Your Email *" value="" />
                    @if($errors->has('email'))
                        <div class="error text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Your Password *" value="" />
                    @if($errors->has('password'))
                        <div class="error text-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Login" />
                </div>
                <div class="form-group">
                <a href="{{ route('forget.password.get') }}" class="mr-5 text-light">Reset Password</a>

                    <a href="{{route('register')}}" class="ForgetPwd" value="Login">Create Account</a>
                </div>
            </form>
            <a href="{{route('google_user')}}" class="btn  btn-light  ">
                 <strong><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="25" height="25"
                viewBox="0 0 172 172"
                style=" fill:#000000;"><g transform="translate(-6.88,-6.88) scale(1.08,1.08)"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M156.27275,71.96408h-5.77275v-0.29742h-64.5v28.66667h40.50242c-5.90892,16.68758 -21.78667,28.66667 -40.50242,28.66667c-23.74675,0 -43,-19.25325 -43,-43c0,-23.74675 19.25325,-43 43,-43c10.96142,0 20.93383,4.13517 28.52692,10.88975l20.27092,-20.27092c-12.79967,-11.92892 -29.92083,-19.2855 -48.79783,-19.2855c-39.57792,0 -71.66667,32.08875 -71.66667,71.66667c0,39.57792 32.08875,71.66667 71.66667,71.66667c39.57792,0 71.66667,-32.08875 71.66667,-71.66667c0,-4.80525 -0.4945,-9.49583 -1.39392,-14.03592z" fill="#ffc107"></path><path d="M22.5965,52.64275l23.54608,17.26808c6.37117,-15.77383 21.801,-26.91083 39.85742,-26.91083c10.96142,0 20.93383,4.13517 28.52692,10.88975l20.27092,-20.27092c-12.79967,-11.92892 -29.92083,-19.2855 -48.79783,-19.2855c-27.52717,0 -51.39933,15.54092 -63.4035,38.30942z" fill="#ff3d00"></path><path d="M86,157.66667c18.5115,0 35.33167,-7.08425 48.04892,-18.60467l-22.18083,-18.7695c-7.19533,5.45025 -16.13933,8.7075 -25.86808,8.7075c-18.6405,0 -34.46808,-11.88592 -40.43075,-28.47317l-23.3705,18.00625c11.86083,23.20925 35.948,39.13358 63.80125,39.13358z" fill="#4caf50"></path><path d="M156.27275,71.96408h-5.77275v-0.29742h-64.5v28.66667h40.50242c-2.838,8.01592 -7.99442,14.92817 -14.64508,19.96275c0.00358,-0.00358 0.00717,-0.00358 0.01075,-0.00717l22.18083,18.7695c-1.5695,1.42617 23.61775,-17.22508 23.61775,-53.05842c0,-4.80525 -0.4945,-9.49583 -1.39392,-14.03592z" fill="#1976d2"></path></g></g></g></svg></strong>
                          </a>
        </div>
    </div> -->

</div>
</div>
@endsection
