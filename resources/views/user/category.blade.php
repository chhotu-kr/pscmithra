
@extends('user/dashboard')
@section('pscmithra')
{{-- <div class="education-breadcrumb-area">
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
   
</div> --}}

<div class="main-home-slider">
    @foreach ($cate as $item)
    <div class="item">
    
        @livewire('imageview', ['image' => ['image' => $item->image,'w'=>'1732','h'=>'500px']], key($item->id))
    </div>
    @endforeach
    
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
            {{-- <div class="col sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-secondary-style">
                    <div class="icon">
                        <i class="icon-10"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">Regulatory Bodies</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col sal-animate" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-extra04-style">
                    <div class="icon">
                        <i class="icon-11"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">SSC & Railway</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col sal-animate" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-tertiary-style">
                    <div class="icon">
                        <i class="icon-12"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">GATE & PSU CS</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col sal-animate" data-sal-delay="300" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-extra02-style">
                    <div class="icon">
                        <i class="icon-13"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">ESE & GATE EE</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-extra07-style">
                    <div class="icon design-pencil-icon">
                        <i class="icon-42"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">ESE & GATE EC</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-extra06-style">
                    <div class="icon">
                        <i class="icon-14"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">ESE & GATE ME</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col sal-animate" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-extra03-style">
                    <div class="icon laptop-icon">
                        <i class="icon-16"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">ESE & GATE CE</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col sal-animate" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-extra01-style">
                    <div class="icon">
                        <i class="icon-17"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">Photography</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col sal-animate" data-sal-delay="300" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-extra05-style">
                    <div class="icon">
                        <i class="icon-43"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">Music Class</h5>
                    </div>
                </div>
                </a>
            </div>
        </div> --}}
    </div>
</div>

<div class="edu-gallery-area edu-section-gap">
    <div class="container mt-5">
        <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
            <h2 class="title">All Test Series & <span class="color-primary">Mock Tests</span></h2>
        </div>
        <div class="isotope-wrapper">
            <div class="isotop-button button-transparent isotop-filter">
                <button data-filter="*" class="is-checked">
                    <span class="filter-text">All</span>
                </button>
               @foreach ($cate as $item)
               <button data-filter=".ESEGATEEC">
                <span class="filter-text">{{$item->category}}</span>
            </button>
               @endforeach
                {{-- <button data-filter=".IAS">
                    <span class="filter-text">IAS</span>
                </button>
                <button data-filter=".IASHindi">
                    <span class="filter-text">IAS Hindi</span>
                </button>
                <button data-filter=".CATMBA">
                    <span class="filter-text">CAT & MBA</span>
                </button>
                <button data-filter=".CTETStateTETExams">
                    <span class="filter-text">CTET & State TET Exams</span>
                </button>
                <button data-filter=".PRTTGTPGTExams">
                    <span class="filter-text">PRT, TGT & PGT Exams</span>
                </button>
                <button data-filter=".UGCNETSET">
                    <span class="filter-text">UGC NET & SET</span>
                </button>
                <button data-filter=".CSIRNETSET">
                    <span class="filter-text">CSIR NET & SET</span>
                </button>
                <button data-filter=".CLATUG">
                    <span class="filter-text">CLAT UG</span>
                </button> --}}
            </div>
            <div class="isotope-list gallery-grid-wrap">
                <div id="animated-thumbnials">

                 <div class="row g-5">

                   @foreach ($subcategory as $item)
                   <div class="col-lg-4 col-md-6 edu-gallery-grid isotope-item ESEGATEEC" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                     <div class="categorie-grid categorie-style-2 color-primary-style edublink-svg-animate">
                        <div class="icon">
                            <i class="icon-9"></i>
                        </div>
                        <div class="content">
                            <h5 class="title">{{$item->subcategory}}</h5>
                        </div>
                     </div>
                   </div>
                   @endforeach
                 </div>
                 

                    {{-- <div class="col-lg-4 col-md-6 edu-gallery-grid isotope-item IAS" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-2 color-secondary-style">
                            <div class="icon">
                                <i class="icon-10 art-design"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">Arts & Design</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 edu-gallery-grid isotope-item IASHindi" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-2 color-extra01-style">
                            <div class="icon">
                                <i class="icon-11 personal-development"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">Personal Development</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 edu-gallery-grid isotope-item CATMBA" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-2 color-tertiary-style">
                            <div class="icon">
                                <i class="icon-12 health-fitness"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">Health & Fitness</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 edu-gallery-grid isotope-item CTETStateTETExams" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-2 color-extra02-style">
                            <div class="icon">
                                <i class="icon-13 data-science"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">Data Science</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 edu-gallery-grid isotope-item PRTTGTPGTExams" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-2 color-extra03-style">
                            <div class="icon">
                                <i class="icon-14"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">Marketing</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 edu-gallery-grid isotope-item UGCNETSET" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-2 color-extra04-style">
                            <div class="icon">
                                <i class="icon-15"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">Business & Finance</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 edu-gallery-grid isotope-item CSIRNETSET" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-2 color-extra05-style">
                            <div class="icon">
                                <i class="icon-16 computer-science"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">Computer Science</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 edu-gallery-grid isotope-item CLATUG" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-2 color-extra06-style">
                            <div class="icon">
                                <i class="icon-17 video-photography"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">Video & Photography</h5>
                            </div>
                        </div>
                    </div> --}}
                </div>

             
            </div>
        </div>
    </div>
</div>

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


