<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0,
maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no">
    <title>{{env("APP_NAME")}}</title>
    <script src="{{ asset('frontend/vendor/jquery-3.3.1/jquery.min.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('frontend/images/logos/png/logo_web.png') }}"><!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i"><!-- css -->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap-4.2.1/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="vendor/bootstrap-4.2.1/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('frontend/vendor/owl-carousel-2.3.4/assets/owl.carousel.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <!-- chat box css -->
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}" />

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- js -->
    <script src="{{ asset('frontend/vendor/bootstrap-4.2.1/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/owl-carousel-2.3.4/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/nouislider-12.1.0/nouislider.min.js') }}"></script>
    <script src="{{ asset('frontend/js/number.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/vendor/svg4everybody-2.1.9/svg4everybody.min.js') }}"></script>

    @yield('js')

    <script>
        svg4everybody();
        var base_url = '{{ url("/") }}';
    </script><!-- font - fontawesome -->
    <!-- font awesome links -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <!-- font - stroyka -->
    <link rel="stylesheet" href="{{ asset('frontend/fonts/stroyka/stroyka.css') }}">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-6"></script>


</head>

<body>

    <!-- site -->
    <div class="site">
        <!-- mobile site__header -->

        <!-- desktop site__header -->
        <header class="site__header d-lg-block">
            <div class="site-header">
                <nav class="navbar navbar-expand-lg navbar-light bg-light py-0">
                    <!-- <div style="border: 2px solid #3d464d;" class="navbar-toggler py-0 mb-1 mt-1 ml-auto" type="" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border-color: #3d464d;">
    <span class="navbar-toggler-icon"></span>
</div> -->

                    <div class="d-flex" id="navbarSupportedContent" style="width: 100%;">
                        <div class="mr-auto d-flex f_nav">
                            <a class="topbar-link nav-link" href="/about-us">About Us</a>
                            <a class="topbar-link nav-link" href="/contact-us">Contacts</a>
                            <a class="topbar-link nav-link" href="/blogs">Blog</a>
                        </div>
                        <ul class="t_nav">
                            @php
                            getcurrencies();
                            @endphp
                            <li class="nav-item dropdown">
                                <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <button class="topbar-dropdown__btn" type="button">Currency: <span class="topbar__item-value">{{session()->get('currency')->symbol}} {{session()->get('currency')->name}}</span> <svg width="7px" height="5px">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-down-7x5') }}">
                                            </use>
                                        </svg></button>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="border: none;">
                                    <ul class="menu menu--layout--topbar">
                                        @foreach(getcurrencies() as $cur)
                                        <li><a href='{{route("currency",$cur->id)}}'>{{$cur->symbol}} {{$cur->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item dropdown" style="color: orange;">
                                <form id="form1" runat="server">
                                    <div id="google_translate_element" style="display: none">
                                    </div>
                                    <script type="text/javascript">
                                        function googleTranslateElementInit() {
                                            new google.translate.TranslateElement({
                                                pageLanguage: 'en',
                                                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                                                autoDisplay: true
                                            }, 'google_translate_element');
                                        }
                                    </script>
                                    <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
                                    <!-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> -->
                                    <script>
                                        function translateLanguage(lang) {

                                            var $frame = $('.goog-te-menu-frame:first');
                                            if (!$frame.size()) {
                                                alert("Error: Could not find Google translate frame.");
                                                return false;
                                            }
                                            var code = $('#' + lang).data('code');
                                            console.log(code);
                                            var content = '<div class="flag_custom" >{{ flag(' + code + ' ) }}</div> ' + lang;
                                            $('#showLanguage').html(content);
                                            $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
                                            return false;
                                        }
                                    </script>
                                </form>
                                <a class="nav-link d-flex justify-content-around" href="#" id="showLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="flag_custom">
                                        {{ flag('us' ) }}
                                    </div>
                                    <div><span class="topbar__item-value"> English</span><svg width="7px" height="5px" class="ml-2">
                                            <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-down-7x5') }}">
                                            </use>
                                        </svg></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="left:-40px;">
                                    <a class="dropdown-item  d-flex justify-content-around" href="javascript:;" id="English" data-code="us" onclick="translateLanguage(this.id);">
                                        <div class="flag_custom">
                                            {{ flag('us') }}
                                        </div> English US
                                    </a>
                                    <a class="dropdown-item  d-flex justify-content-around" href="javascript:;" id="Arabic" data-code="ae" onclick="translateLanguage(this.id);">
                                        <div class="flag_custom">
                                            {{ flag('sa') }}
                                        </div> Arabic
                                    </a>
                                    <a class="dropdown-item  d-flex justify-content-around" href="javascript:;" id="Chinese" data-code="cn" onclick="translateLanguage(this.id);">
                                        <div class="flag_custom">
                                            {{ flag('cn') }}
                                        </div> Chinese
                                    </a>

                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- .topbar -->
                <!-- .topbar / end -->
                <div class="site-header__middle container">
                    <div class="site-header__logo"><a href="/"> <img width="100%" src="{{asset('frontend/images/logos/png/logo_web.png')}}" alt=""></a></div>
                    <div class="site-header__search">
                        <div class="search">
                            <form class="search__form" action="{{route('search')}}" method="get"><input class="search__input" name="search" placeholder="Search over 10,000 products" aria-label="Site search" type="text" autocomplete="off"> <button
                                  class="search__button" type="submit"><svg width="20px" height="20px">
                                        <use xlink:href="{{ asset('frontend/images/sprite.svg#search-20') }}"></use>
                                    </svg></button>
                                <div class="search__border"></div>
                            </form>
                        </div>
                    </div>
                    <div class="site-header__phone">
                        <div class="site-header__phone-title">Customer Service</div>
                        <div class="site-header__phone-number">(000) 000-0000</div>
                    </div>
                </div>



                <nav class="navbar navbar-expand-lg navbar-light py-0" style="background-color: #F18819;color:#fff;">
                    <div style="border: 2px solid #3d464d; background-color:#F18819;" class="navbar-toggler mb-1 py-0 mt-1 ml-auto" type="" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent"
                      aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item mb-1 mr-1">
                                <div class="nav-panel__departments">
                                    <!-- .departments -->
                                    <div class="departments
                                    @if (Route::current()->getName() == " index") departments--opened departments--fixed @endif "
                                        data-departments-fixed-by=" .block-slideshow">
                                        <div class="departments__body">
                                            <div class="departments__links-wrapper">
                                                <ul class="departments__links">
                                                    @if(!empty($nav))
                                                    @foreach ($nav as $n)
                                                    <li class="departments__item departments__item--menu"><a href="#">{{$n->name}} <svg class="departments__link-arrow" width="6px" height="9px">
                                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-right-6x9') }}">
                                                                </use>
                                                            </svg></a>
                                                        <div class="departments__menu">
                                                            <!-- .menu -->
                                                            <ul class="menu menu--layout--classic">
                                                                @foreach ($sub_nav as $nav)
                                                                @if ($nav->category_id == $n->id)
                                                                <li><a href="/category/products/{{$nav->id}}">{{$nav->name}}</a></li>
                                                                @endif
                                                                @endforeach
                                                            </ul><!-- .menu / end -->
                                                        </div>
                                                    </li>

                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <button class="departments__button"><svg class="departments__button-icon" width="18px" height="14px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#menu-18x14') }}">
                                                </use>
                                            </svg> Shop By Category <svg class="departments__button-arrow" width="9px" height="6px">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#arrow-rounded-down-9x6') }}">
                                                </use>
                                            </svg></button>
                                    </div><!-- .departments / end -->
                                </div>
                            </li>
                            <li class="nav-item nav-links__item">
                                <a href="/"><span>Home</span></a>
                            </li>
                            <li class="nav-item nav-links__item">
                                <a href="/auction"><span>Products Auction</span></a>
                            </li>
                            <li class="nav-item nav-links__item">
                                <a href="/sellers"><span>Sellers</span></a>
                            </li>
                            <li class="nav-item nav-links__item">
                                <a href="/about-us"><span>About Us</span></a>
                            </li>
                            <li class="nav-item nav-links__item">
                                <a href="/blogs"><span>Blog</span></a>
                            </li>
                            <li class="nav-item nav-links__item">
                                <a href="/contact-us"><span>Contact Us</span></a>
                            </li>
                        </ul>
                        <ul class="d-flex form-inline my-2 my-lg-0" style="padding-left: 0px; list-style-type: none ;">
                            <li class="nav-item nav-links__item dropdown">
                                <div class="dropdown">
                                    <div class="dropbtn">Services</div>
                                    <div class="dropdown-content">
                                        <!-- .menu -->
                                        <ul class="menu ">
                                            <li><a href="{{ route('shipment_companies') }}">Shipment Services</a></li>
                                            <li><a href="{{ route('clearance_agencies') }}">Clearance Services</a></li>
                                        </ul><!-- .menu / end -->
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('company.register')}}" class="text-white">
                                    Create Company Account
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <div class="dropdown">
                                    <div class="dropbtn"><i class="far fa-user" style="color: #fff;"></i></div>
                                    <div class=" dropdown-content">
                                        <!-- .menu -->
                                        <ul class="menu menu--layout--topbar">
                                            @if(auth('web')->check() || auth('customer')->check())

                                            <li><a href="/customer-home">Dashboard</a></li>

                                            <li><a href="{{route('orders')}}">Orders</a></li>
                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="text-white font-20 tooltip-wrapper" data-toggle="tooltip" data-placement="top" title=""> Logout <i class="zmdi zmdi-power"></i>
                                                </a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                            @else
                                            <li><a href="/login">Login</a></li>
                                            <li><a href="/register">Create Account</a></li>
                                            @endif
                                            {{-- <li><a href="#">Addresses</a></li> --}}
                                        </ul><!-- .menu / end -->
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="indicator indicator--trigger--click"><a href="cart.html" class="indicator__button"><span class="indicator__area"><svg width="20px" height="20px" style="color:#fff;">
                                                <use xlink:href="{{ asset('frontend/images/sprite.svg#heart-20') }}">
                                                </use>
                                            </svg> <span class="indicator__value">
                                                @if(auth('customer')->check())
                                                {{ wishlistcount(auth('customer')->id()) }}
                                                @else
                                                0
                                                @endif

                                            </span></span></a>
                                    <div class="indicator__dropdown">
                                        <!-- .dropcart -->
                                        <div class="dropcart">
                                            <div class="dropcart__products-list">
                                                @if(auth('customer')->check())
                                                {{ wishlistItems(auth('customer')->id()) }}
                                                @else
                                                <div class="dropcart__product text-center">
                                                    <h6 class="text-center">No Items In Wishlist</h6>
                                                </div>
                                                @endif
                                            </div>
                                        </div><!-- .dropcart / end -->
                                    </div>
                                </div>

                            </li>
                        </ul>
                    </div>

                </nav>
            </div>
        </header><!-- desktop site__header / end -->
        <!-- site__body -->

        <div class="site__body">
            @yield('content')
        </div>

        <footer class="site__footer">
            <div class="site-footer">
                <div class="container">
                    <div class="site-footer__widgets">
                        <div class="row">
                            <div class="col-12 col-md-5 col-lg-3">
                                <div class="site-footer__widget footer-contacts">
                                    <!-- <h5 class="footer-contacts__title">Contact Us</h5> -->
                                    <div class="site-header__logo" style="margin:auto;"><a href="/"> <img width="100%" height="150px" src="{{asset('frontend/images/logos/png/logo.png')}}" alt="logo"></a></div>
                                    <div class="footer-contacts__text my-4">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Integer in feugiat lorem. Pellentque ac placerat tellus.</div>
                                    <!-- <ul class="footer-contacts__contacts">
                                        <li><i class="footer-contacts__icon fas fa-globe-americas"></i> 715 Fake Street,
                                            New York 10021 USA</li>
                                        <li><i class="footer-contacts__icon far fa-envelope"></i> tradersreadystock@example.com
                                        </li>
                                        <li><i class="footer-contacts__icon fas fa-mobile-alt"></i> (000) 000-0000,
                                            (000) 000-0000</li>
                                        <li><i class="footer-contacts__icon far fa-clock"></i> Mon-Sat 10:00pm - 7:00pm
                                        </li>
                                    </ul> -->
                                </div>
                            </div>

                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="site-footer__widget footer-links">
                                    <h5 class="footer-links__title">My Account</h5>
                                    <ul class="footer-links__list">
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Store
                                                Location</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Order
                                                History</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Wish
                                                List</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Newsletter</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Specials</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Gift
                                                Certificates</a></li>
                                        <!-- <li class="footer-links__item"><a href="#" class="footer-links__link">Affiliate</a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="site-footer__widget footer-links">
                                    <h5 class="footer-links__title">Information</h5>
                                    <ul class="footer-contacts__contacts">
                                        <li><i class="footer-contacts__icon fas fa-globe-americas"></i> 715 Fake Street,<br>
                                            &emsp;&emsp;New York 10021 USA</li>
                                        <li><i class="footer-contacts__icon far fa-envelope"></i> tradersreadystock<br>
                                            &emsp;&emsp;@example.com
                                        </li>
                                        <li><i class="footer-contacts__icon fas fa-mobile-alt"></i> (000) 000-0000<br>
                                            &emsp;&emsp;(000) 000-0000</li>
                                        <li><i class="footer-contacts__icon far fa-clock"></i> Mon-Sat<br>
                                            &emsp;&emsp;10:00pm - 7:00pm
                                        </li>
                                    </ul>
                                    <!--<ul class="footer-links__list">
                                        <li class="footer-links__item"><a href="/about-us" class="footer-links__link">About
                                                Us</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Delivery
                                                Information</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Privacy
                                                Policy</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Brands</a>
                                        </li>
                                        <li class="footer-links__item"><a href="/contact-us" class="footer-links__link">Contact
                                                Us</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Returns</a></li>
                                        <li class="footer-links__item"><a href="/contact-us" class="footer-links__link">Site
                                                Map</a></li>
                                    </ul> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-4">
                                <div class="site-footer__widget footer-newsletter">
                                    <h5 class="footer-newsletter__title">Newsletter</h5>
                                    <div class="footer-newsletter__text">Praesent pellentesque volutpat ex, vitae auctor
                                        lorem pulvinar mollis felis at lacinia.</div>
                                    <form action="#" class="footer-newsletter__form"><label class="sr-only" for="footer-newsletter-address">Email Address</label> <input type="text" class="footer-newsletter__form-input form-control"
                                          id="footer-newsletter-address" placeholder="Email Address..."> <button class="footer-newsletter__form-button btn btn-primary">Subscribe</button>
                                    </form>
                                    <div class="footer-newsletter__text footer-newsletter__text--social">Follow us on
                                        social networks</div>
                                    <ul class="footer-newsletter__social-links">
                                        <li class="footer-newsletter__social-link footer-newsletter__social-link--facebook">
                                            <a href="" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="footer-newsletter__social-link footer-newsletter__social-link--twitter">
                                            <a href="" target="_blank"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li class="footer-newsletter__social-link footer-newsletter__social-link--youtube">
                                            <a href="" target="_blank"><i class="fab fa-youtube"></i></a>
                                        </li>
                                        <li class="footer-newsletter__social-link footer-newsletter__social-link--instagram">
                                            <a href="" target="_blank"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li class="footer-newsletter__social-link footer-newsletter__social-link--rss">
                                            <a href="" target="_blank"><i class="fas fa-rss"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="site-footer__bottom">
                        <div class="footer-copyright m-auto m-lg-0">
                            <p class="footer-company mt-2">All rights reserved &copy; 2021 Designed by <a href="https://az-solutions.pk/">AZ-Solutions</a>
                            </p>
                        </div>
                        <div class="site-footer__payments"><img src="{{ asset('frontend/images/payments2.png') }}" alt=""></div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(".update-cart").click(function(e) {
                    e.preventDefault();
                    var ele = $(this);
                    $.ajax({
                        url: '{{ url("/update-cart") }}',
                        method: "patch",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.attr("data-id"),
                            quantity: ele.parents("tr").find(".quantity").val()
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                });
                $(".remove-from-cart").click(function(e) {
                    e.preventDefault();
                    var ele = $(this);
                    if (confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url("/remove-from-cart") }}',
                            method: "DELETE",
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: ele.attr("data-id")
                            },
                            success: function(response) {
                                window.location.reload();
                            }
                        });
                    }
                });
            </script>


        </footer><!-- site__footer / end -->
    </div><!-- site / end -->

    <div id="chat-overlay" class="row"></div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-countdown]').each(function() {
                console.log($(this))
                var jQuery = $(this)
                var finalDate = $(this).data('countdown');
                jQuery.countdown(finalDate, function(event) {
                    jQuery.html(event.strftime('%D days %H:%M:%S'));
                });
            });
        });
    </script>
</body>

</html>
