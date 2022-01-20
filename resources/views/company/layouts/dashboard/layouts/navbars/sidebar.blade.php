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
        <a href="/home" aria-expanded="false">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      @if(Auth::user()->usertype == "admin")
      <li class="@if ($activePage == 'suppliers') active @endif"><a href="/suppliers" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Suppliers</p></a> </li>
      <li class="@if ($activePage == 'buyers') active @endif"><a href="/buyyers" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Buyers</p></a> </li>
      <li class="@if ($activePage == 'companies') active @endif"><a href="/companies" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Companies</p></a> </li>

      <li class="@if ($activePage == 'countries') active @endif"><a href="/country" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Country</p></a> </li>
      <li class="@if ($activePage == 'cities') active @endif"><a href="/city" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>City</p></a> </li>
      <li class="@if ($activePage == 'package_prices') active @endif"><a href="/add-package-price" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Adds Packages Price</p></a> </li>
      <li class="@if ($activePage == 'categories') active @endif"><a href="/products-category" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Products Categories</p></a> </li>
      <li class="@if ($activePage == 'sub_categories') active @endif"><a href="/products-sub-category" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Products Sub Categories</p></a> </li>
      <li class="@if ($activePage == 'colors') active @endif"><a href="/colors" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Product Colors</p></a> </li>
      <li class="@if ($activePage == 'products') active @endif"><a href="/all-products" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Products</p></a> </li>
      <li class="@if ($activePage == 'admin_wallet') active @endif"><a href="{{ route('admin.wallet') }}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Wallet</p></a> </li>
      <li class="@if ($activePage == 'admin_auctions') active @endif"><a href="{{route('admin_auctions')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Products Auctions</p></a> </li>
      <li class="@if ($activePage == 'add_product') active @endif"><a href="{{route('admin_product_adds')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Products Adds</p></a> </li>
      <li>
      <a data-toggle="collapse" href="#laravelExamples">
          <i class="fab fa-laravel"></i>
        <p>
          {{ __("Website frontend") }}
          <b class="caret"></b>
        </p>
      </a>
      <div class="collapse show" id="laravelExamples">
          <ul class="nav">
            <li class="@if ($activePage == 'sliders') active @endif">
              <a href="/frontend-slider">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("Sliders") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'advertisements') active @endif">
              <a href="{{route('add-show')}}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Addvertisement") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="@if ($activePage == 'bids') active @endif"><a href="{{route('all-bids')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Bids</p></a> </li>
      <li class="@if ($activePage == 'admin_settings') active @endif"><a href="{{route('user.setting')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Setting</p></a> </li>
      <li class="@if ($activePage == 'admin_orders') active @endif"><a href="{{route('orders')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Orders</p></a> </li>
      <li class="@if ($activePage == 'admin_pending_orders') active @endif"><a href="{{route('pending-orders')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Pending Orders</p></a> </li>
      <li class="@if ($activePage == 'withdraw_customers') active @endif"><a href="{{route('withdraw-customer')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Customer Withdraw Request</p></a> </li>
      <li class="@if ($activePage == 'withdraw_sellers') active @endif"><a href="{{route('withdraw-seller')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Seller Withdraw Request</p></a> </li>
      <li class="@if ($activePage == 'admin_support') active @endif"><a href="{{route('admin_support')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Support</p></a> </li>

      @endif


      @if(Auth::user()->usertype == "user")
      <li class="@if ($activePage == 'supplier_products') active @endif"><a href="/products" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Products</p></a> </li>
      <li class="@if ($activePage == 'supplier_add_product') active @endif"><a href="/product-add" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Publish Product</p></a></li>
      <li class="@if ($activePage == 'supplier_product_auction') active @endif"><a href="/product-auction" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Auctions</p></a> </li>
      <li class="@if ($activePage == 'supplier_advertisements') active @endif"><a href="/Advertisement" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Advertisement</p></a> </li>
      <li class="@if ($activePage == 'supplier_wallet') active @endif"><a href="/wallet" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Wallet</p></a> </li>
      <li class="@if ($activePage == 'supplier_pending_bids') active @endif"><a href="{{route('pending-bids')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Pending Bids</p></a></li>
      <li class="@if ($activePage == 'supplier_accepted_bids') active @endif"><a href="{{route('accepted-bids')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Approved Bids</p></a></li>
      <li class="@if ($activePage == 'supplier_rejected_bids') active @endif"><a href="{{route('rejected-bids')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Rejected Bids</p></a></li>
      <li class="@if ($activePage == 'supplier_settings') active @endif"><a href="{{route('user.setting')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Setting</p></a> </li>
      <li class="@if ($activePage == 'admin_orders') active @endif"><a href="{{route('orders')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Orders</p></a> </li>
       <li class="@if ($activePage == 'supplier_customer_request') active @endif"><a href="{{route('customer_request')}}" aria-expanded="false"><i class="now-ui-icons design_app"></i><p>Customer Request <span class="notify"> @if(auth()->check())
      {{getunread(auth()->id())}}
      @else
      0
      @endif
      </span>
      </p></a> </li>@endif
    </ul>
  </div>
</div>
