@extends('user.footer')
@section('psc')
    
@endsection
@extends('user.dashboard')
@section('pscmithra')
<div class="education-breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">QuizChapter</h1>
            </div>
            <ul class="education-breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('view.home')}}">Home</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item active" aria-current="page">QuizChapter</li>
            </ul>
        </div>
    </div>
    <ul class="shape-group">
        <li class="shape-1"><img src="{{asset('newlms/assets/images/about/shape-22.png" alt="shape')}}"></li>
        <li class="shape-2 scene"><img data-depth="2" src="{{asset('newlms/assets/images/about/shape-13.png')}}" alt="shape"></li>
        <li class="shape-3 scene"><img data-depth="-2" src="{{asset('newlms/assets/images/about/shape-15.png')}}" alt="shape"></li>
        <li class="shape-4"><img src="{{asset('newlms/assets/images/about/shape-22.png" alt="shape')}}"></li>
        <li class="shape-5 scene"><img data-depth="2" src="{{asset('newlms/assets/images/about/shape-07.png')}}" alt="shape"></li>
    </ul>
</div>


<div class="row">
    <div class="col-6 ms-5 mt-5">
      <livewire:quiz-chapt/> 
    </div>
</div>
<div class="education-categorie-area categorie-area-3 education-section-gap bg-image bg-image--4" id="categories">
    <div class="container">
        <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
            <h2 class="title">Select Your  <span class="color-primary">Exam QuizChapter</span></h2>
        </div>
        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4">
            @foreach ($chapt as $item)
            <div class="col sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <a href="{{route('view.categorydetails')}}">
                    <div class="categorie-grid categorie-style-3 color-primary-style">
                        <div class="icon">
                            <i class="icon-9"></i>
                        </div>
                        <div class="content">
                            <h5 class="title">{{$item->name}}</h5>
                        </div>
                    </div>
                </a>
                
            </div>
            @endforeach
            
    </div>
</div>

@endsection