
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@include('new-layouts.dashboard.layouts.navbars.sidebar')
<div class="main-panel">
    @include('new-layouts.dashboard.layouts.navbars.navs.auth')
    @yield('content')
    @include('new-layouts.dashboard.layouts.footer')
</div>
