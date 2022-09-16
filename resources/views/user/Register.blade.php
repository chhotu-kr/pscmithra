
@extends('user.dashboard')
@section('pscmithra')
<div class="education-breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">Register</h1>
            </div>
            <ul class="education-breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('view.home')}}">Home</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ul>
        </div>
    </div>
    <ul class="shape-group">
        <li class="shape-1"><img src="{{asset('nassets/images/about/shape-22.png')}}" alt="shape"></li>
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
                    <img src="{{asset('nassets/img/registration-form-login-user.webp')}}">
                </div>
               <div class="col-lg-5">
                @livewire('user.user-register')
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