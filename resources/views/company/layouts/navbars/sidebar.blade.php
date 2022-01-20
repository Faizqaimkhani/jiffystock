<div class="sidebar" data-color="orange">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
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
        <a href="/home" aria-expanded="false">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      <li class="@if ($activePage == 'services') active @endif">
        <a href="{{route('shipment.service.index')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Services</p></a> </li>
      <li class="@if ($activePage == 'advertisement') active @endif">
        <a href="{{route('shipment.advertisement')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Advertisement</p></a></li>
      <li class="@if ($activePage == 'wallet') active @endif">
          <a href="{{route('shipment.wallet.index')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Wallet</p></a> </li>

    </ul>
  </div>
</div>
