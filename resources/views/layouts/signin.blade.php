<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">




    <style>
        .register {
             background: -webkit-linear-gradient(left, #3931af, #00c6ff); 
             background-image: url('{{ asset('frontend/images/login.jpg')}}');
            background-repeat: no-repeat;
            background-size: 100%; 
            background-color: #000000;
            background-size: cover;
            background-position: center;
        }

        .register-left {
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }

        .register-left a {
            border: none;
            border-radius: 1rem;
            padding: 2% 6% 2% 6%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }

        .register-right {
            background-color: rgba(255, 255, 255, 0.2)	;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }

        .register-left img {
            margin-top: 15%;
            margin-bottom: 5%;
            width: 25%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }

        @-webkit-keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        .register-left p {
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }

        .register .register-form {
            padding: 10%;
            margin-top: 10%;
        }

        .btnRegister {
            float: right;
            margin-top: 1.5%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #F18819;
            color: #fff;
            font-weight: 600;
            width: 100%;
            cursor: pointer;
        }

        .btnRegister:hover{
            background-color: #495057;
            color: #F18819;
            border: 1px solid #F18819;
        }

        .register .nav-tabs {
            margin-top: 3%;
            border: none;
            background: #F18819;
            border-radius: 1.5rem;
            width: 25%;
            float: right;
            margin-right: 20px;

        }

        .register .nav-tabs .nav-link {
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }

        .register .nav-tabs .nav-link:hover {
            border: none;
        }

        .register .nav-tabs .nav-link.active {
            width: 100px;
            color: #F18819;
            border: 2px solid #F18819;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }

        .register-heading {
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #F18819;
        }



        .login-container {
            /* background-image: url('{{ asset('frontend/images/login.jpg')}}'); */
            /* margin-top: 5%;
            margin-bottom: 5%; */
        }
        
        .back {
             background-image: url('{{ asset('frontend/images/login.jpg')}}');
            background-repeat: no-repeat; 
            
            padding: 50px 10px;
                        background-repeat: no-repeat;
            background-size: 100%; 
            background-color: #000000;
            background-size: cover;
            background-position: center;
        }

        .login-form-1 {
            padding: 5%;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        }

        .login-form-1 h3 {
            text-align: center;
            color: #fff;
        }

        .login-form-2 {
            padding: 5%;
            /* background: #F18819; */
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
            /*background-color: #F18819;                        */
            border-radius: 10px;
        }

        .login-form-2 h3 {
            text-align: center;
            color: #fff;
        }

        .login-container form {
            padding: 10%;
        }

        .btnSubmit {
            width: 50%;
            border-radius: 1rem;
            padding: 1.5%;
            border: none;
            cursor: pointer;
        }

        .login-form-1 .btnSubmit {
            font-weight: 600;
            color: #fff;
            background-color: #F18819;
            border: 2px solid #F18819;
        }
        
        .login-form-1 .btnSubmit:hover {
            font-weight: 600;
            color: #F18819;
            background-color: #383d41;
            border: 2px solid #F18819;

        }

        .login-form-2 .btnSubmit {
            font-weight: 600;
            color: #F18819;
            background-color: #383d41;
            border: 2px solid #383d41;

        }
        
        .login-form-2 .btnSubmit:hover {
            font-weight: 600;
            color: #383d41;
            background-color: #F18819;
            border: 2px solid #383d41;
        }

        .login-form-2 .ForgetPwd {
            color: #fff;
            font-weight: 600;
            text-decoration: none;
        }

        .login-form-1 .ForgetPwd {
            color: #fff;
            font-weight: 600;
            text-decoration: none;
        }
        .login-form-2 .ForgetPwd:hover {
            border-bottom: 1px solid #383d41;
        }
        .login-form-1 .ForgetPwd:hover {
            border-bottom: 1px solid #F18819;
        }

    </style>





</head>

<body>
    <div id="app">

        <main class="">
            @yield('content')
        </main>
</body>

</html>
