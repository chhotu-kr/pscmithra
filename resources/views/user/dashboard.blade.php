<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
    {{-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png"> --}}

    <link rel="stylesheet" href="{{ asset('nassets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('nassets/css/vendor/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('nassets/css/vendor/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('nassets/css/vendor/magnifypopup.css') }}">
    <link rel="stylesheet" href="{{ asset('nassets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('nassets/css/vendor/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('nassets/css/vendor/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('nassets/css/vendor/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('nassets/css/vendor/jqueru-ui-min.css') }}">
    <link rel="stylesheet" href="{{ asset('nassets/css/vendor/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('nassets/css/vendor/tipped.min.css') }}">

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="{{ asset('nassets/css/app.css') }}">
    <!-- CSS only -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
<!-- CSS only -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;500&family=Roboto:wght@300;500&display=swap"
        rel="stylesheet">

    <script type="text/javascript" async
        src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({
      tex2jax: { inlineMath: [["$","$"],["\\(","\\)"]] },
      "HTML-CSS": {
        linebreaks: { automatic: true, width: "container" }          
      }              
   });
</script>

</head>
@livewireStyles

<body class="sticky-header">

  
   

    <header class="education-header header-style-1 header-fullwidth">
        <div class="header-top-bar">
            <div class="container">
                <div class="header-top">
                    <div class="header-top-left">
                        <div class="header-notify">
                            Online Test Series <a href="#">Hurry up!</a>
                        </div>
                    </div>
                    <div class="header-top-right">
                        <ul class="header-info">
                          @if (!Auth::user())
                          <li><a href="{{ route('user.login') }}">Login</a></li>
                          <li class="nav-item"><a href="{{route('user.register')}}" class="nav-link text-white ">Register</a></li>

                          {{-- elseif --}}
                          @else
                          <li class="nav-item"><a href="{{route('user.dashboard')}}" class="nav-link text-white ">Dashboard</a></li>
                          <li class="nav-item"><a href="{{route('logout')}}" class="">LogOut</a></li>
                   
                          
                          @endif
                            
                            <li><span>Call:</span><a href="tel:+04844632514">+04844632514</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="education-sticky-placeholder"></div>
        <div class="header-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-brand">
                        <div class="logo">
                            <a href="{{ route('view.home') }}">

                                <img src='{{ asset('nassets/images/logo.png') }}' style="
    width: 125px;
"
                                    width="150" alt="logo" class="">
                            </a>
                        </div>
                    </div>
                    <div class="header-mainnav">
                        <nav class="mainmenu-nav">
                            <ul class="mainmenu">
                                <li><a href="{{ route('view.home') }}">Home</a></li>
                                <li><a href="{{ route('view.category') }}">Mock Text</a></li>
                                <li class="has-droupdown"><a href="#">Study Materials</a>
                                    <ul class="submenu">
                                        <li><a href="course.php">Course 1</a></li>
                                        <li><a href="course.php">Course 2</a></li>
                                        <li><a href="course.php">Course 3</a></li>
                                        <li><a href="course.php">Course 4</a></li>
                                        <li><a href="course.php">Course 5</a></li>
                                        <li><a href="course.php">Course 6</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('view.quiz') }}">Quizes</a></li>
                                <li><a href="{{ route('quiz.result') }}">Live Exam</a></li>
                                <li><a href="{{route('about.page')}}">About Us</a></li>
                                {{-- <li><a href="contact.php">Contact Us</a></li> --}}
                            </ul>
                        </nav>
                    </div>
                    <div class="header-right">
                        <ul class="header-action">
                            <li class="search-bar">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <button class="search-btn" type="button"><i class="icon-2"></i></button>
                                </div>
                            </li>
                            <li class="icon search-icon">
                                <a href="javascript:void(0)" class="search-trigger">
                                    <i class="icon-2"></i>
                                </a>
                            </li>
                            <li class="header-btn">
                                <a href="{{ route('view.course') }}" class="education-btn btn-medium">Buy Now<i class="icon-4"></i></a>
                            </li>
                            <li class="mobile-menu-bar d-block d-xl-none">
                                <button class="hamberger-button">
                                    <i class="icon-54"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </header>

    @section('pscmithra')
    @show

    <footer class="education-footer footer-lighten bg-image bg-image--12">
        <div class="footer-top">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="education-footer-widget">
                            <div class="logo">
                                <a href="{{ route('view.home') }}">
                                    <img src='{{ asset('nassets/images/logo.png') }}' style="width: 215px;"
                                        width="215px" alt="" class="">

                                </a>
                            </div>
                            <br>
                            <div class="widget-information">
                                <ul class="information-list">
                                    <li><span>Add:</span>3rd, V 196,BLDG No 60/49E, J C Chambers, Panampilly Nagar
                                        Road, Panampilly Nagar, Kochi, Ernakulam, Kerala, 682036</li>
                                    <li><span>Call:</span><a href="tel:+04844632514">+04844632514</a></li>
                                    <li><span>Email:</span><a
                                            href="mailto:pscmithrallp@gmail.com">pscmithrallp@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="education-footer-widget explore-widget">
                            <h4 class="widget-title">Links</h4>
                            <div class="inner">
                                <ul class="footer-link link-hover">
                                    <li><a href="{{route('about.page')}}">About</a></li>
                                    {{-- <li><a href="#">Services</a></li> --}}
                                    <li><a href="{{ route('view.course') }}">Courses</a></li>
                                    <li><a href="{{ route('view.blog') }}">Blog</a></li>
                                    {{-- <li><a href="#">Events</a></li>
                                    <li><a href="#">Become a Teacher</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-2 col-sm-6">
                        <div class="education-footer-widget quick-link-widget">
                            <h4 class="widget-title">Services</h4>
                            <div class="inner">
                                <ul class="footer-link link-hover">
                                    <li><a href="#">Library</a></li>
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="#">Partner</a></li>
                                    <li><a href="#">Location</a></li>
                                    <li><a href="#">News & Articles</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-4 col-md-6">
                        <div class="education-footer-widget">
                            <h4 class="widget-title">Contacts</h4>
                            <div class="inner">
                                <p class="description">Enter your email address to register to our newsletter
                                    subscription</p>
                                <div class="input-group footer-subscription-form">
                                    <input type="email" class="form-control" placeholder="Your email">
                                    <button class="education-btn btn-medium" type="button">Subscribe <i
                                            class="icon-4"></i></button>
                                </div>
                                <ul class="social-share icon-transparent">
                                    <li><a href="#" class="color-fb"><i class="icon-facebook"></i></a></li>
                                    <li><a href="#" class="color-linkd"><i class="icon-linkedin2"></i></a></li>
                                    <li><a href="#" class="color-ig"><i class="icon-instagram"></i></a></li>
                                    <li><a href="#" class="color-twitter"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#" class="color-yt"><i class="icon-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner text-center" >
                            <p>Copyright 2022 <a href="{{ route('view.home') }}">PscMithra</a> All Rights Reserved | <a href="{{ route('view.privacy') }}"> Privacy Policy </a> | <a href="{{ route('view.term') }}"> Terms & Condition </a> | <a href="{{ route('view.refund') }}">Refund Policy</a></p> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>

    <div class="rn-progress-parent">
        <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- JS
    ============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('nassets/js/vendor/modernizr.min.js') }}"></script>
    <!-- Jquery Js -->
    <script src="{{ asset('nassets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/sal.min.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/backtotop.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/magnifypopup.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/slick.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/jquery-appear.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/odometer.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/isotop.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/imageloaded.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/lightbox.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/wow.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/paralax.min.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/paralax-scroll.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/jquery-ui.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/svg-inject.min.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/vivus.min.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/tipped.min.js') }}"></script>
    <script src="{{ asset('nassets/js/vendor/viewport.jquery.js') }}"></script>
    

    <!-- Site Scripts -->
    <script src="{{ asset('nassets/js/app.js') }}"></script>
    @livewireScripts
</body>

</html>
