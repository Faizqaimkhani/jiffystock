@section('nav_identification')
<div class="mr-1">
    <h4 class="text-white mb-0">{{Auth::guard($user)->user()->name}}</h4>
    <small class="text-white">{{Auth::guard($user)->user()->email}}</small>
</div>
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
      <li class="active">
        <a href="{{route($route)}}" aria-expanded="false">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
