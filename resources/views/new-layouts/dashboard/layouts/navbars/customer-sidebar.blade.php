<div class="sidebar" data-color="orange">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="{{ url('/') }}" class="simple-text logo-mini">
      <img src="{{asset('frontend/images/logos/png/logo_web.png')}}" class="img-fluid logo-desktop" alt="logo" />
    </a>
    <a href="{{ url('/') }}" class="simple-text logo-normal">
      {{ __('Jiffystock') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="/customer-home" aria-expanded="false">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      <li class="@if ($activePage == 'wallet') active @endif"><a href="/customer-wallet" aria-expanded="false"><i class="now-ui-icons design_app"></i><p class="nav-title">Wallet</p></a> </li>
      <li class="@if ($activePage == 'bids') active @endif"><a href="{{route('customer-bids')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p class="nav-title">Bids</p></a> </li>
      <li class="@if ($activePage == 'setting') active @endif"><a href="{{route('setting')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p class="nav-title">Setting</p></a> </li>
      <li class="@if ($activePage == 'orders') active @endif"><a href="{{route('orders')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p class="nav-title">Orders</p></a> </li>
        <li class="@if ($activePage == 'chat') active @endif"><a href="{{route('customer.chat')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p class="nav-title">Conversation</p></a> </li>
    </ul>
  </div>
</div>
