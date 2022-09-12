
@extends('user/dashboard')
@section('pscmithra')
<div class="education-breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">Category</h1>
            </div>
            <ul class="education-breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('view.home')}}">Home</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
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

<div class="features-area-3">
    <div class="container">
        <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
            <h2 class="title">Online Test <span class="color-primary">Series</span></h2>
        </div>
        <div class="features-grid-wrap">
            <div class="features-box features-style-3 color-primary-style edublink-svg-animate">
                <div class="icon">
                    <img class="svgInject" src="{{asset('nassets/images/animated-svg-icons/scholarship-facility.svg')}}" alt="animated icon">
                    <!-- <i class="icon-34"></i> -->
                </div>
                <div class="content">
                    <h4 class="title">Scholarship Facility</h4>
                    <p>Lorem ipsum dolor sit amet cont adipiscing elit.</p>
                </div>
            </div>
            <div class="features-box features-style-3 color-secondary-style edublink-svg-animate">
                <div class="icon">
                    <img class="svgInject" src="{{asset('nassets/images/animated-svg-icons/skilled-lecturers.svg')}}" alt="animated icon">
                </div>
                <div class="content">
                    <h4 class="title">Skilled Lecturers</h4>
                    <p>Lorem ipsum dolor sit amet cont adipiscing elit.</p>
                </div>
            </div>
            <div class="features-box features-style-3 color-extra02-style edublink-svg-animate">
                <div class="icon">
                    <img class="svgInject" src="{{asset('nassets/images/animated-svg-icons/book-library.svg')}}" alt="animated icon">
                    <!-- <i class="icon-36"></i> -->
                </div>
                <div class="content">
                    <h4 class="title">Book Library &amp; Store</h4>
                    <p>Lorem ipsum dolor sit amet cont adipiscing elit.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="education-categorie-area categorie-area-3 education-section-gap bg-image bg-image--4" id="categories">
    <div class="container">
        <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
            <h2 class="title">Select Your  <span class="color-primary">Exam Category</span></h2>
        </div>
        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4 p-5" style="margin-top: -50px">
            @foreach ($cate as $item)
            <div class="col-md-2 col sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800" >
                
                <a href="{{route('view.categorydetails',$item->id)}}">
                    <div class="categorie-grid categorie-style-3 color-primary-style">
                        <div class="icon">
                            <i class="icon-9"></i>
                         </div>
                        <div class="content">
                            <h5 class="title">{{$item->category}}</h5>
                        </div>
                    </div>
                </a>
                
            </div>
            @endforeach
            
    </div>
</div>
@livewire('user.categoryslider')

<div class="content-area-page">
    <div class="container">
        <h3>Test Series Key Features</h3>
        <ul>
            <li>Full-length mock tests can be practised here.</li>
            <li>A complete set is prepared by the expert faculty.</li>
            <li>Every set contains the latest and updated pattern of questions.</li>
            <li>Every question holds a detailed solution for more understanding.</li>
            <li>You can practice mock test in Hindi as well as in the English language as per the nature of the exam.</li>
        </ul>
        <h3>List of Exam Categories for Mock Test Series</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</div>
@endsection


