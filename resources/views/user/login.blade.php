{{-- @extends('user.footer')
@section('psc')
    
@endsection --}}
@extends('user.dashboard')
@section('pscmithra')
<div class="education-breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">Login</h1>
            </div>
            <ul class="education-breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('view.home')}}">Home</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ul>
        </div>
    </div>
    <ul class="shape-group">
        <li class="shape-1"><img src="{{asset('nassets/images/about/shape-22.png" alt="shape')}}"></li>
        <li class="shape-2 scene"><img data-depth="2" src="{{asset('nassets/images/about/shape-13.png')}}" alt="shape"></li>
        <li class="shape-3 scene"><img data-depth="-2" src="{{asset('nassets/images/about/shape-15.png')}}" alt="shape"></li>
        <li class="shape-4"><img src="{{asset('nassets/images/about/shape-22.png" alt="shape')}}"></li>
        <li class="shape-5 scene"><img data-depth="2" src="{{asset('nassets/images/about/shape-07.png')}}" alt="shape"></li>
    </ul>
</div>

 <section class="account-page-area section-gap-equal">
        <div class="container position-relative">
            <div class="row g-5 justify-content-center">
                <div class="col-lg-5">
                    <div class="login-form-box">
                        <h3 class="title">Sign in</h3>
                        <p>Don’t have an account? <a href="{{route('user.register')}}">Sign up</a></p>
                        <form action="{{route('user.login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="current-log-email">UserContact</label>
                                <input type="text" name="contact" id="current-log-email" placeholder="Email or username">
                            </div>
                            <div class="form-group">
                                <label for="current-log-password">Password</label>
                                <input type="text" name="password" id="current-log-password" placeholder="Password">
                                <span class="password-show"><i class="icon-76"></i></span>
                            </div>
                            <div class="form-group chekbox-area">
                                <div class="education-form-check">
                                    <input type="checkbox" id="remember-me">
                                    <label for="remember-me">Remember Me</label>
                                </div>
                                <a href="#" class="password-reset">Lost your password?</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="education-btn btn-medium">Sign in <i class="icon-4"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="{{asset('nassets/img/registration-form-login-user.webp')}}">
                </div>
            </div>
            <ul class="shape-group">
                <li class="shape-1 scene"><img data-depth="2" src="{{asset('nassets/images/about/shape-07.png')}}" alt="Shape"></li>
                <li class="shape-2 scene"><img data-depth="-2" src="{{asset('nassets/images/about/shape-13.png')}}" alt="Shape"></li>
                <li class="shape-3 scene"><img data-depth="2" src="{{asset('nassets/images/counterup/shape-02.png')}}" alt="Shape"></li>
            </ul>
        </div>
    </section>
@endsection