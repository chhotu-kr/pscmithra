@extends('base')
@section('content')
    <div class="container mt-5">
        <div class="row mt-5">
            <div class=" mt-5">
                <h1 class="py-2 mt-5 fw-bold lh-3">Csc MiTrA - <br>
                    Online Learning and <br>
                    Examination System
                </h1>
            </div>
        </div>
        <a href="" class="btn btn-warning text-light fw-bold rounded-pill pe-5 ps-5 mb-5 mt-5">GET STARTED</a>
    </div>
    <div class="container-fluid mt-5" style="background:rgb(223, 223, 223)">
        <div class="row mt-5">
            <div class="col-sm-12 text-center">
                <h3 class=" mt-5">Practice Exams And Exam Categories</h3>
                <div class="col-8 mx-auto mt-5">
                    <ul class="nav nav-pills cs-nav-pills text-ceneter">
                        <li class="nav-item"><a href="{{route('bpsc')}}" class="btn btn-warning me-2">BPSC</a></li>
                        <li class="nav-item"><a href="{{route('physics')}}" class="btn btn-secondary me-2">Physics</a></li>
                        <li class="nav-item"><a href="{{route('chemistery')}}" class="btn btn-secondary me-2">Chemistry</a></li>
                        <li class="nav-item"><a href="{{route('biology')}}" class="btn btn-secondary me-2">Biology</a></li>
                        <li class="nav-item"><a href="{{route('math')}}" class="btn btn-secondary me-2">Maths</a></li>
                        <li class="nav-item"><a href="{{route('commerce')}}" class="btn btn-secondary me-2">Commerce</a></li>
                        <li class="nav-item"><a href="{{route('bba')}}" class="btn btn-secondary me-2">BBA</a></li>
                        <li class="nav-item"><a href="{{route('bca')}}" class="btn btn-secondary me-2">BCA</a></li>
                        <li class="nav-item"><a href="{{route('bsc')}}" class="btn btn-secondary me-2">Bsc</a></li>
                        <li class="nav-item"><a href="" class="btn btn-secondary me-2">Mock Test</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row mt-5">
                <div class="col-3">
                    <div class="card">
                        <img src="{{ asset('images/mathformula.jpeg') }}" alt="" height="200px">
                        <div class="card-body">
                            <h4>MATHS FORMULA</h4>
                            <P>MARKS:36 <span class="float-end">30 min</span></P>
                            <span>
                                <a href="" class="btn btn-warning stretched-link">START EXAM</a>
                                <a href="" class="">Price : Rp 100</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <img src="{{ asset('images/mathjx.jpeg') }}" alt="" height="200px">
                        <div class="card-body">
                            <h4>MATHS FORMULA</h4>
                            <P>MARKS:36 <span class="float-end">30 min</span></P>
                            <span>
                                <a href="" class="btn btn-warning stretched-link">START EXAM</a>
                                <a href="" class="">Price : Rp 100</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <img src="{{ asset('images/algebra.jpeg') }}" alt="" height="200px">
                        <div class="card-body">
                            <h4>MATHS FORMULA</h4>
                            <P>MARKS:36 <span class="float-end">30 min</span></P>
                            <span>
                                <a href="" class="btn btn-warning stretched-link">START EXAM</a>
                                <a href="" class="">Price : Rp 100</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <img src="{{ asset('images/mathjx.jpeg') }}" alt="" height="200px">
                        <div class="card-body">
                            <h4>MATHS FORMULA</h4>
                            <P>MARKS:36 <span class="float-end">30 min</span></P>
                            <span>
                                <a href="" class="btn btn-warning stretched-link">START EXAM</a>
                                <a href="" class="">Price : Rp 100</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 mx-auto mt-5 ">
                <a href="{{route('bpsc')}}" class="btn btn-primary ps-5 pe-5 mt-5 mb-4 py-2"><b>Browse All Exams</b></a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12 text-center">
                <h3 class=" mt-5 me-5">LMS Categorias</h3>
                <div class="col-6 mx-auto mt-5">
                    <ul class="nav nav-pills cs-nav-pills text-ceneter">
                        <li class="nav-item"><a href="" class="btn btn-warning me-2">Mocktest</a></li>
                        <li class="nav-item"><a href="" class="btn btn-secondary me-2">History</a></li>
                        <li class="nav-item"><a href="" class="btn btn-secondary me-2">English Grammer</a>
                        </li>
                        <li class="nav-item"><a href="" class="btn btn-secondary me-2">Physics</a></li>
                        <li class="nav-item"><a href="" class="btn btn-secondary me-2">Maths Formulas</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-5">
                <div class="col-4">
                    <div class="card">
                        <img src="{{ asset('images/mathformula.jpeg') }}" alt="" height="200px">
                        <div class="card-body">
                            <h4>Premium</h4>
                            <P>Total Items : 3</P>
                            <a href="" class="btn btn-warning ps-4 pe-4 mx-auto stretched-link">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <img src="{{ asset('images/mathformula.jpeg') }}" alt="" height="200px">
                        <div class="card-body">
                            <h4>Premium</h4>
                            <P>Total Items : 3</P>
                            <a href="" class="btn btn-warning ps-4 pe-4 mx-auto stretched-link">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <img src="{{ asset('images/mathformula.jpeg') }}" alt="" height="200px">
                        <div class="card-body">
                            <h4>Premium</h4>
                            <P>Total Items : 3</P>
                            <a href="" class="btn btn-warning ps-4 pe-4 mx-auto stretched-link">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 mx-auto mt-5 ">
            <a href="" class="btn btn-primary ps-5 pe-5 mt-5 mb-4 py-2 mb-5"><b>Browse All Categories</b></a>
        </div>
    </div>
    <div class="container mt-5">
        <h3 class="text-center mt-5">Hear it Directly from our Students</h3>
        <hr class="my-5">
        <div class="slider" style="margin-bottom:20px; position:relative">
            <div class="owl-carousel">
                <div class="slider-card" style="transform: 1.5; opacity:1; background-color:#ccc;">
                    <div>
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5" style="background:rgb(223, 223, 223)">
        <div class="container mt-5">
            <div class="row ">
                <div class="col-4  mt-5 mb-5">
                    <div class="row ">
                        <img src="{{ asset('images/learningsystem.png') }}" alt="" class="w-25 h-25 mx-auto">
                        <h5 class="text-center mt-3">Learning management system</h5>
                    </div>
                </div>
                <div class="col-4 mt-5 mb-5">
                    <div class="row">
                        <img src="{{ asset('images/paidexam.png') }}" alt="" class="w-25 h-25 mx-auto">
                        <h5 class="text-center mt-3">Paid Exams</h5>
                    </div>
                </div>
                <div class="col-4  mt-5 mb-5">
                    <div class="row">
                        <img src="{{ asset('images/freeexam.png') }}" alt="" class="w-25 h-25 mx-auto">
                        <h5 class="text-center mt-3">Free Exams</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
@endsection
