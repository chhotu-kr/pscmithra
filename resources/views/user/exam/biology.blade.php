@extends('base')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                @include('side')
            </div>
            <div class="col-8">
                <div class="container">
                    <div class="row">
                        <div class="col-4"><h5>Biology Exam</h5></div>
                        <div class="col-8">
                            <form action="" class="d-flex" method="GET">
                                <input type="text" name="search" class="form-control" placeholder="search exam here">
                                <input type="submit" class="btn btn-dark">
                            </form>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-4">
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
                        <div class="col-4">
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
                        <div class="col-4">
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
                        <div class="col-4">
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
                        <div class="col-4">
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
                        <div class="col-4">
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
                </div>
            </div>
        </div>
    </div>
    @include('footer')
@endsection






