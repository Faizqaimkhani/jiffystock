<!--Header-->
<header id="sticky-header" class="header">
  <div class="header-area">
    <div class="container-header">
      <div class="navbar-content">
        <ul class="head-round-icon">
          <li class="off-canvas-btn"><a href="javascript:void(0);"><i class="bi bi-list"></i></a></li>
          <li class="off-canvas-btn"><a href="javascript:void(0);"><i class="bi bi-search"></i></a></li>
        </ul>
        <div class="navbar-logo">
          <a href="/">
            <img src="{{ asset('new-frontend/logo_web.png') }}" alt="logo" id="logo">
          </a>
        </div>
        <div class="header-search">
          <form method="GET" action="/search">
            <input name="search" id="search" type="text" class="form-control input-brand" placeholder="Search for Products" required autocomplete="search" autofocus />
            <button type="submit" class="btn btn-brand-search"><i class="bi bi-search"></i>Search</button>
          </form>
        </div>
        <ul class="head-round-icon head-round-icon-auth">
          @php
            $current_user = currentUser();
          @endphp
          @if(count($current_user) < 1)
            <li>
              <i class="bi bi-person"></i>
              <a href="{{ url('/login') }}">
                Login |
              </a>
            </li>
            <li class="nav-res">
              <a href="{{ url('/register') }}" class="sidebar_show_hide text-brand">
                Create Account
              </a>
            </li>
            @else
            <li>
              <a href="{{ url($current_user['profile_url']) }}">
                <i class="bi bi-person" style="font-size: 23px;"></i>
              </a>
            </li>
          @endif
          <li class="text-brand">
              <i class="bi bi-heart"></i>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>
<!--/Header/-->

<!--Menu-->
<div class="header-menu">
    <div class="row">
      @if($top_bar == 'show')
        <div class="col-lg-3">
        <div class="categories_wrap">
          <div class="banner-cate-heading">
            <i class="bi bi-list"></i>Top Categories
          </div>
          <div class="nav_cat_content">
            <ul class="banner-category-list">
              @if(!empty($nav))
                @foreach ($nav as $n)
                <li class="nav-list-item">
                  <span> <i class="{{ $n->icon }}"></i> </span>
                  <a href="{{ url('search?category='.$n->name) }}">{{ $n->name }}</a>
                </li>
                @endforeach
              @endif

            </ul>
          </div>
        </div>
      </div>
      @endif
      <div class="col-lg-9 @if($top_bar == 'hide') container @endif">
        <div class="tp-mega-full">
          <div class="tp-menu align-self-center">
            <nav>
              <ul>
                <li><a target="_self" href="{{ url('/') }}">Home</a></li>

                <li><a target="_self" href="{{ url('/auction-products') }}">Auction Products</a></li>
                <li><a target="_self" href="{{ url('/sellers') }}">Suppliers</a></li>
                <li><a target="_self" href="javascript:void(0)">Logistics</a>
									<div class="mega-menu mega-full">
										<ul class="mega-col-3 ">
											<li><a href="{{ url('/shipment-companies') }}">Shipment Companies</a></li>
                      <li><a href="{{ url('/clearance-agencies') }}">Clearance Agencies</a></li>
											<li><a href="{{ url('/company/login') }}">Login</a></li>
										</ul>
									</div>
								</li>
                <li><a href="{{ url('contact-us') }}">Contact</a></li>
                <li><a href="{{ url('about-us') }}">About</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div>
<!--/Menu/-->

<!-- off-canvas menu start -->
<aside class="mobile-menu-wrapper">
  <div class="off-canvas-overlay"></div>
  <div class="offcanvas-body">
    <div class="offcanvas-top">
      <div class="offcanvas-btn-close">
        <i class="bi bi-x-lg"></i>
      </div>
    </div>
    <div class="search-for-mobile">
      <form method="GET" action="/search">
        <input name="search" id="search" type="text" class="form-control" placeholder="Search for Products" required autocomplete="search" autofocus />
        <button type="submit" class="btn theme-btn"><i class="bi bi-search"></i>Search</button>
      </form>
    </div>
    <div class="mobile-navigation">
      <nav>
        <ul class="mobile-menu">
          <li class="has-children-menu"><a href="#">Top Categories</a>
            <ul class="dropdown">
              @if(!empty($nav))
                @foreach ($nav as $n)
                <li class="nav-list-item">
                  <span> <i class="{{ $n->icon }}"></i> </span>
                  <a href="{{ url('search?category='.$n->name) }}">{{ $n->name }}</a>
                </li>
                @endforeach
              @endif
            </ul>
          </li>
          <li><a target="_self" href="/">Home</a></li>
          <li><a target="_self" href="{{ url('/auction-products') }}">Auction Products</a></li>
          <li><a target="_self" href="{{ url('/sellers') }}">Suppliers</a></li>
          <li class="has-children-menu"><a href="#">Logistics</a>
            <ul class="dropdown">
              <li><a href="{{ url('/shipment-companies') }}">Shipment Companies</a></li>
              <li><a href="{{ url('/clearance-agencies') }}">Clearance Agencies</a></li>
              <li><a href="{{ url('/company/login') }}">Login</a></li>
            </ul>
          </li>

        </ul>
      </nav>
    </div>
  </div>
</aside>
