<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>
    Jiffystock Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link href="{{ asset('css') }}/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('css') }}/now-ui-dashboard.min.css?v=1.3.0" rel="stylesheet" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @yield('service_css')
  @yield('js')

  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
</head>

<body class="{{ $class ?? '' }}">
  <div class="wrapper">
    @yield('content')
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('js') }}/core/jquery.min.js"></script>
  <script src="{{ asset('js') }}/core/popper.min.js"></script>
  <script src="{{ asset('js') }}/core/bootstrap.min.js"></script>
  <script src="{{ asset('js') }}/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('js') }}/plugins/chartjs.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="{{ asset('js') }}/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js') }}/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  @yield('ckEditor')
  @stack('js')
</body>

</html>
