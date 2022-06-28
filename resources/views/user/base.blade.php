<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSC-Mitra</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/owl.theme.default.css') }}">

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a href="{{route('home')}}" class="navbar-brand fw-bold">CSC-Mirta</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="" class="btn btn-warning rounded-pill ms-1 pe-5 ps-5">Buy Now </a>
                </li>
                <li class="nav-item"><a href="" class="btn btn-danger ms-1">Create Account</a></li>
                <li class="nav-item"><a href="" class="btn btn-success ms-1">Sign In</a></li>
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-info">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="{{route('home')}}" class="nav-link "> <b>Home</b> </a></li>
                <li class="nav-item"><a href="{{route('bpsc')}}" class="nav-link fw-bold">Practice Exams</a></li>
                <li class="nav-item"><a href="{{route('course')}}" class="nav-link fw-bold">Courses</a></li>
                <li class="nav-item"><a href="{{route('pattern')}}" class="nav-link fw-bold">Pattern</a></li>
                <li class="nav-item"><a href="{{route('pricing')}}" class="nav-link fw-bold">Pricing</a></li>
                <li class="nav-item"><a href="{{route('syllabus')}}" class="nav-link fw-bold">Syllabus</a></li>
                <li class="nav-item"><a href="{{route('about')}}" class="nav-link fw-bold">About Us</a></li>
                <li class="nav-item"><a href="{{route('contact')}}" class="nav-link fw-bold">Contact Us</a></li>
                <div class="dropdown show">
                    <a class="btn btn-info dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      More
                    </a>
                  
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
            </ul>
        </div>
    </nav>
</body>
@section('content')

@show

</html>
