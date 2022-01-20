@extends('company.layouts.app')
@authguard('shipment_user')
  @include('company.layouts.shipment-sidebar',['activePage' => 'home'])
@endauthguard
@authguard('clearance_user')
  @include('company.layouts.clearance-sidebar',['activePage' => 'home'])
@endauthguard

@section('content')
<div class="main-panel">
  @include('company.layouts.navbars.navs.auth', ["namePage" => "Shipment Services"])
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
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-body">
              <div class="d-block d-sm-flex flex-nowrap align-items-center">
                  <div class="page-title mb-2 mb-sm-0">
                    <h1>Dashboard</h1>
                    <p class="lead">Only Verified Users can access Dashboard Features.</p>
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route($resend) }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
      @include('new-layouts.dashboard.layouts.footer')
    </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  @endpush
