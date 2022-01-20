@extends('company.layouts.app')
@include('company.layouts.shipment-sidebar',['activePage' => 'send_email'])

@section('content')
<div class="main-panel">
  @include('company.layouts.navbars.navs.auth', ["namePage" => "Shipment Send Email"])
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
              <h4 class="card-title">Send Email To Customers</h4>
            </div>
            <div class="card-body">
              <div class="content p-3">
                <form action="{{ route('send.email.store') }}" method="POST">
                  @csrf
                      <div class="form-group">
                        <label for="email">Email : </label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                        @if($errors->has('email'))
                            <div class="error text-danger">{{ $errors->first('email') }}</div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="subject">Subject : </label>
                        <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}" required>
                        @if($errors->has('subject'))
                            <div class="error text-danger">{{ $errors->first('subject') }}</div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="subject">Body : </label>
                        <textarea name="body" class="form-control" placeholder="Body" rows="8" cols="80" required>{{ old('body') }}</textarea>
                        @if($errors->has('body'))
                            <div class="error text-danger">{{ $errors->first('body') }}</div>
                        @endif
                      </div>
                    <div class="form-group pl-3">
                      <button type="submit" class="btn btn-primary">Send</button>
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
