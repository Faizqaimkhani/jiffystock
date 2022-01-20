@extends('layouts.signin')
  
  @section('content')
  <main class="login-form" >
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:80vh;">
            <div class="col-md-8">
                <div class="card" style="background:#F18819">
                    <div class="card-header text-center">Reset Password</div>
                    <div class="card-body">
    
                      @if (Session::has('message'))
                           <div class="alert alert-success" role="alert">
                              {{ Session::get('message') }}
                          </div>
                      @endif
    
                        <form action="{{ route('cus.forget.password.post') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </form>
                          
                    </div>
                </div>
                </div>
        </div>
    </div>
  </main>
  @endsection 