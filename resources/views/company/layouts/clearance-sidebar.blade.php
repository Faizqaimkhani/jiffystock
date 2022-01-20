@section('nav_identification')
    @if(Auth::guard('clearance_user')->user()->badge_verification_status == 2)
     <p class="dropdown-item ">{{Auth::guard('clearance_user')->user()->name}} <i class="fa fa-check" style="font-size: 14px;color: #7599e9;" aria-hidden="true"></i></p>
     @else
     <p class="dropdown-item ">{{Auth::guard('clearance_user')->user()->name}}</p>
     @endif
     <small class="dropdown-item">{{Auth::guard('clearance_user')->user()->email}} </small>
@endsection
<div class="sidebar" data-color="orange">
  <div class="logo">
    <a href="javascript:;" class="simple-text logo-mini">
      <img src="{{asset('frontend/images/logos/png/logo_web.png')}}" class="img-fluid logo-desktop" alt="logo" />
    </a>
    <a href="{{ url('/') }}" class="simple-text logo-normal">
      {{ __('Jiffystock') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{route('clearance.index')}}" aria-expanded="false">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      <li class="@if ($activePage == 'services') active @endif">
        <a href="{{route('clearance.service.index')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Services</p></a> </li>
      <li class="@if ($activePage == 'advertisement') active @endif">
        <a href="{{route('clearance.advertisement')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Advertisement</p></a></li>
      <li class="@if ($activePage == 'wallet') active @endif">
          <a href="{{route('clearance.wallet.index')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Wallet</p></a> </li>
          <li class="@if ($activePage == 'send_email') active @endif"><a href="{{ route('clearance.send.email') }}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Send Email</p></a></li>
  {{-- <li class="@if ($activePage == 'conversation') active @endif">
        <a href="{{route('shipment.chat')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Conversation</p></a> </li> --}}

    </ul>
  </div>
</div>
