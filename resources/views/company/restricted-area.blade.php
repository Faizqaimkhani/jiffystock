@extends('company.layouts.app',["title" => "Restricted Area"])

@include('company.layouts.default-sidebar')
@section('content')
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12 m-b-30">
              <div class="d-block flex-nowrap align-items-center">
                  <div class="page-title mb-2 mb-sm-0">
                    <h1>Dashboard</h1>
                    <br>
                    <div class="card-header">
                      <h6>{{ __('This page is not accessible till you are verified by admin') }}</h6>
                      <p class="text-dark text-sm">It can take from 2-4 business days and you will be notified by email</p>
                      <p class="text-dark text-sm">Thank You for your patience.</p>
                    </div>
                    <br>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
