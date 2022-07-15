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
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

    <link rel="stylesheet" href="{{asset('new/assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('new/assets/css/vendor/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('new/assets/css/vendor/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('new/assets/css/vendor/magnifypopup.css')}}">
    <link rel="stylesheet" href="{{asset('new/assets/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('new/assets/css/vendor/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('new/assets/css/vendor/lightbox.css')}}">
    <link rel="stylesheet" href="{{asset('new/assets/css/vendor/animation.css')}}">
    <link rel="stylesheet" href="{{asset('new/assets/css/vendor/jqueru-ui-min.css')}}">
    <link rel="stylesheet" href="{{asset('new/assets/css/vendor/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('new/assets/css/vendor/tipped.min.css')}}">

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="new/assets/css/app.css">

</head>

<body class="sticky-header">

    <div id="main-wrapper" class="main-wrapper">

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
                        <li><a href="{{route('user.login')}}">Login</a></li>
                        <li><a href="{{route('user.signup')}}">Register</a></li>
                        <li><a href="tel:+011235641231"><i class="icon-phone"></i>Call: 123 4561 5523</a></li>
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
                        <a href="index.php">
                            <img class="logo-light" src="images/logo/logo-dark.png" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="header-mainnav">
                    <nav class="mainmenu-nav">
                        <ul class="mainmenu">
                            <li><a href="#">Home</a></li>
                            <li><a href="{{route('user.mocktest')}}">Mock Text</a></li>
                            <li class="has-droupdown"><a href="#">Study Materials</a>
                                <ul class="submenu">
                                    <li><a href="#">Course 1</a></li>
                                    <li><a href="#">Course 1</a></li>
                                    <li><a href="#">Course 1</a></li>
                                    <li><a href="#">Course 1</a></li>
                                    <li><a href="#">Course 1</a></li>
                                    <li><a href="#">Course 1</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('user.quiztest')}}">Quizes</a></li>
                            <li><a href="{{route('user.livetest')}}">Live Exam</a></li>
                            <li><a href="#">Contact Us</a></li>
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
                            <a href="#" class="education-btn btn-medium">Buy Now<i class="icon-4"></i></a>
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
    <div class="popup-mobile-menu">
        <div class="inner">
            <div class="header-top">
                <div class="logo">
                    <a href="index.php">
                        <img src="images/logo/logo-dark.png" alt="Logo">
                    </a>
                </div>
                <div class="close-menu">
                    <button class="close-button">
                        <i class="icon-73"></i>
                    </button>
                </div>
            </div>
            <ul class="mainmenu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Mock Text</a></li>
                <li class="has-droupdown"><a href="#">Study Materials</a>
                    <ul class="submenu">
                        <li><a href="#">Course 1</a></li>
                        <li><a href="#">Course 1</a></li>
                        <li><a href="#">Course 1</a></li>
                        <li><a href="#">Course 1</a></li>
                        <li><a href="#">Course 1</a></li>
                        <li><a href="#">Course 1</a></li>
                    </ul>
                </li>
                <li class="has-droupdown"><a href="#">Study Materials</a>
                    <ul class="submenu">
                        <li><a href="#">Course 1</a></li>
                        <li><a href="#">Course 1</a></li>
                        <li><a href="#">Course 1</a></li>
                        <li><a href="#">Course 1</a></li>
                        <li><a href="#">Course 1</a></li>
                        <li><a href="#">Course 1</a></li>
                    </ul>
                </li>
                <li><a href="#">Quizes</a></li>
                <li><a href="#">Live Exam</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
    </div>
    <!-- Start Search Popup  -->
    <div class="education-search-popup">
        <div class="content-wrap">
            <div class="site-logo">
                <img src="images/logo/logo-dark.png" alt="Logo">
            </div>
            <div class="close-button">
                <button class="close-trigger"><i class="icon-73"></i></button>
            </div>
            <div class="inner">
                <form class="search-form" action="#">
                    <input type="text" class="educationblink-search-popup-field" placeholder="Search Here...">
                    <button class="submit-button"><i class="icon-2"></i></button>
                </form>
            </div>
        </div>
    </div>
@section('content')
@show
    

</header>
