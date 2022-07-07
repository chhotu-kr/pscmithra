<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PscMithra</title>
    <!-- CSS only -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

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
            <a href="{{ route('home') }}" class="navbar-brand fw-bold"><h3><b>PSCMithra</b></h3></a>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="" class="btn btn-warning rounded-pill ms-1 pe-5 ps-5">Buy Now </a>
                </li>
                <li class="nav-item"><a href="" class="btn btn-danger ms-1">Create Account</a></li>
                <li class="nav-item"><a href="" class="btn btn-success ms-1">Sign In</a></li>
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-danger">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="{{route('exam.category')}}" class="nav-link fw-bold text-white">Mock test</a></li>
                <li class="nav-item"><a href="" class="nav-link fw-bold text-white">Quizes</a></li>
                <li class="nav-item"><a href="" class="nav-link fw-bold text-white">Live exam</a></li>
                <li class="nav-item"><a href="{{route('product')}}" class="nav-link fw-bold text-white">Cart</a></li>
                <li class="nav-item"><a href="{{route('user.subject')}}" class="nav-link fw-bold text-white">Study material</a></li>
            </ul>
        </div>
    </nav>
</body>
@section('content')

@show

</html>
