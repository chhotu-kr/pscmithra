

@extends('user.dashboard')
@section('pscmithra')
<div class="education-breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">Blog</h1>
            </div>
            <ul class="education-breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('view.home')}}">Home</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ul>
        </div>
    </div>
    <ul class="shape-group">
        <li class="shape-1"><img src="{{asset('nassets/images/about/shape-22.png" alt="shape')}}"></li>
        <li class="shape-2 scene"><img data-depth="2" src="{{asset('nassets/images/about/shape-13.png')}}" alt="shape"></li>
        <li class="shape-3 scene"><img data-depth="-2" src="{{asset('nassets/images/about/shape-15.png')}}" alt="shape"></li>
        <li class="shape-4"><img src="{{asset('nassets/images/about/shape-22.png')}}" alt="shape"></li>
        <li class="shape-5 scene"><img data-depth="2" src="{{asset('nassets/images/about/shape-07.png')}}" alt="shape"></li>
    </ul>
</div>



<div class="education-blog-area blog-area-1 education-section-gap" style="background:transparent;">
    <div class="container">
        <div class="section-title section-center" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
            <span class="pre-title">Latest Articles</span>
            <h2 class="title">Get News with Education</h2>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 col-md-6 col-12" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-blog blog-style-1">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.blogdetails')}}">
                                <img src="{{asset('nassets/img/blog-01.jpg')}}" alt="Blog Images">
                            </a>
                        </div>
                        <div class="content position-top">
                            <div class="read-more-btn">
                                <a class="btn-icon-round" href="{{route('view.blogdetails')}}"><i class="icon-4"></i></a>
                            </div>
                            <div class="category-wrap">
                                <a href="#" class="blog-category">ONLINE</a>
                            </div>
                            <h5 class="title"><a href="{{route('view.blogdetails')}}">Become a Better Blogger: Content Planning</a></h5>
                            <ul class="blog-meta">
                                <li><i class="icon-27"></i>Oct 10, 2021</li>
                                <li><i class="icon-28"></i>Com 09</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet cons tetur adipisicing sed.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-blog blog-style-1">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.blogdetails')}}">
                                <img src="{{asset('nassets/img/blog-01.jpg')}}" alt="Blog Images">
                            </a>
                        </div>
                        <div class="content position-top">
                            <div class="read-more-btn">
                                <a class="btn-icon-round" href="{{route('view.blogdetails')}}"><i class="icon-4"></i></a>
                            </div>
                            <div class="category-wrap">
                                <a href="#" class="blog-category">ONLINE</a>
                            </div>
                            <h5 class="title"><a href="{{route('view.blogdetails')}}">Become a Better Blogger: Content Planning</a></h5>
                            <ul class="blog-meta">
                                <li><i class="icon-27"></i>Oct 10, 2021</li>
                                <li><i class="icon-28"></i>Com 09</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet cons tetur adipisicing sed.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-blog blog-style-1">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.blogdetails')}}">
                                <img src="{{asset('nassets/img/blog-01.jpg')}}" alt="Blog Images">
                            </a>
                        </div>
                        <div class="content position-top">
                            <div class="read-more-btn">
                                <a class="btn-icon-round" href="{{route('view.blogdetails')}}"><i class="icon-4"></i></a>
                            </div>
                            <div class="category-wrap">
                                <a href="#" class="blog-category">ONLINE</a>
                            </div>
                            <h5 class="title"><a href="{{route('view.blogdetails')}}">Become a Better Blogger: Content Planning</a></h5>
                            <ul class="blog-meta">
                                <li><i class="icon-27"></i>Oct 10, 2021</li>
                                <li><i class="icon-28"></i>Com 09</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet cons tetur adipisicing sed.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-blog blog-style-1">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.blogdetails')}}">
                                <img src="{{asset('nassets/img/blog-01.jpg')}}" alt="Blog Images">
                            </a>
                        </div>
                        <div class="content position-top">
                            <div class="read-more-btn">
                                <a class="btn-icon-round" href="{{route('view.blogdetails')}}"><i class="icon-4"></i></a>
                            </div>
                            <div class="category-wrap">
                                <a href="#" class="blog-category">ONLINE</a>
                            </div>
                            <h5 class="title"><a href="{{route('view.blogdetails')}}">Become a Better Blogger: Content Planning</a></h5>
                            <ul class="blog-meta">
                                <li><i class="icon-27"></i>Oct 10, 2021</li>
                                <li><i class="icon-28"></i>Com 09</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet cons tetur adipisicing sed.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-blog blog-style-1">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.blogdetails')}}">
                                <img src="{{asset('nassets/img/blog-01.jpg')}}" alt="Blog Images">
                            </a>
                        </div>
                        <div class="content position-top">
                            <div class="read-more-btn">
                                <a class="btn-icon-round" href="{{route('view.blogdetails')}}"><i class="icon-4"></i></a>
                            </div>
                            <div class="category-wrap">
                                <a href="#" class="blog-category">ONLINE</a>
                            </div>
                            <h5 class="title"><a href="{{route('view.blogdetails')}}">Become a Better Blogger: Content Planning</a></h5>
                            <ul class="blog-meta">
                                <li><i class="icon-27"></i>Oct 10, 2021</li>
                                <li><i class="icon-28"></i>Com 09</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet cons tetur adipisicing sed.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-blog blog-style-1">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.blogdetails')}}">
                                <img src="{{asset('nassets/img/blog-01.jpg')}}" alt="Blog Images">
                            </a>
                        </div>
                        <div class="content position-top">
                            <div class="read-more-btn">
                                <a class="btn-icon-round" href="{{route('view.blogdetails')}}"><i class="icon-4"></i></a>
                            </div>
                            <div class="category-wrap">
                                <a href="#" class="blog-category">ONLINE</a>
                            </div>
                            <h5 class="title"><a href="{{route('view.blogdetails')}}">Become a Better Blogger: Content Planning</a></h5>
                            <ul class="blog-meta">
                                <li><i class="icon-27"></i>Oct 10, 2021</li>
                                <li><i class="icon-28"></i>Com 09</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet cons tetur adipisicing sed.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="shape-group">
        <li class="shape-1 scene">
            <img data-depth="-1.4" src="{{asset('nassets/images/about/shape-02.png')}}" alt="Shape">
        </li>
        <li class="shape-2 scene">
            <span data-depth="2.5"></span>
        </li>
        <li class="shape-3 scene">
            <img data-depth="-2.3" src="{{asset('nassets/images/counterup/shape-05.png')}}" alt="Shape">
        </li>
    </ul>
</div>
 
@endsection