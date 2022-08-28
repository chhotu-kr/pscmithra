@extends('user.footer')
@section('psc')
    
@endsection
@extends('user.dashboard')
@section('pscmithra')
<div class="education-breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">Course</h1>
            </div>
            <ul class="education-breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item active" aria-current="page">Course</li>
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

<section class="shop-page-area section-gap-equal">
    <div class="container">
        <div class="education-sorting-area">
            <div class="sorting-left">
                <h6 class="showing-text">We found <span>71</span> courses available for you</h6>
            </div>
            <div class="sorting-right">
                <div class="education-sorting">
                    <div class="icon"><i class="icon-55"></i></div>
                    <select class="education-select">
                        <option>Filters</option>
                        <option>Low To High</option>
                        <option>High Low To</option>
                        <option>Last Viewed</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-product">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.coursedetails')}}">
                                <img src="{{asset('newlms\assets\img\desk-top-publishing.jpg')}}" alt="Shop Images">
                            </a>
                            <div class="product-hover-info">
                                <ul>
                                    <li><a href="#">Buy Now <i class="icon-4"></i></a></li>
                                    <li><a href="cart.php"><i class="icon-3"></i> Add to Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="{{route('view.coursedetails')}}">Desk Top Publishing Video</a></h6>
                            <div class="price">Rs 70.00</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-product">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.coursedetails')}}">
                                <img src="{{asset('newlms\assets\img\desk-top-publishing.jpg')}}" alt="Shop Images">
                            </a>
                            <div class="product-hover-info">
                                <ul>
                                    <li><a href="#">Buy Now <i class="icon-4"></i></a></li>
                                    <li><a href="cart.php"><i class="icon-3"></i> Add to Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="{{route('view.coursedetails')}}">Desk Top Publishing Video</a></h6>
                            <div class="price">Rs 70.00</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-product">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.coursedetails')}}">
                                <img src="{{asset('newlms\assets\img\the-magic-book-cover-img.png')}}" alt="Shop Images">
                            </a>
                            <div class="product-hover-info">
                                <ul>
                                    <li><a href="#">Buy Now <i class="icon-4"></i></a></li>
                                    <li><a href="cart.php"><i class="icon-3"></i> Add to Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="{{route('view.coursedetails')}}">Desk Top Publishing Video</a></h6>
                            <div class="price">Rs 70.00</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-product">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.coursedetails')}}">
                                <img src="{{asset('newlms\assets\img\the-magic-book-cover-img.png')}}" alt="Shop Images">
                            </a>
                            <div class="product-hover-info">
                                <ul>
                                    <li><a href="#">Buy Now <i class="icon-4"></i></a></li>
                                    <li><a href="cart.php"><i class="icon-3"></i> Add to Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="{{route('view.coursedetails')}}">Desk Top Publishing Video</a></h6>
                            <div class="price">Rs 70.00</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-product">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.coursedetails')}}">
                                <img src="{{asset('newlms\assets\img\desk-top-publishing.jpg')}}" alt="Shop Images">
                            </a>
                            <div class="product-hover-info">
                                <ul>
                                    <li><a href="#">Buy Now <i class="icon-4"></i></a></li>
                                    <li><a href="cart.php"><i class="icon-3"></i> Add to Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="{{route('view.coursedetails')}}">Desk Top Publishing Video</a></h6>
                            <div class="price">Rs 70.00</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-product">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.coursedetails')}}">
                                <img src="{{asset('newlms\assets\img\desk-top-publishing.jpg')}}" alt="Shop Images">
                            </a>
                            <div class="product-hover-info">
                                <ul>
                                    <li><a href="#">Buy Now <i class="icon-4"></i></a></li>
                                    <li><a href="cart.php"><i class="icon-3"></i> Add to Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="{{route('view.coursedetails')}}">Desk Top Publishing Video</a></h6>
                            <div class="price">Rs 70.00</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-product">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.coursedetails')}}">
                                <img src="{{asset('newlms\assets\img\desk-top-publishing.jpg')}}" alt="Shop Images">
                            </a>
                            <div class="product-hover-info">
                                <ul>
                                    <li><a href="#">Buy Now <i class="icon-4"></i></a></li>
                                    <li><a href="cart.php"><i class="icon-3"></i> Add to Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="{{route('view.coursedetails')}}">Desk Top Publishing Video</a></h6>
                            <div class="price">Rs 70.00</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-product">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.coursedetails')}}">
                                <img src="{{asset('newlms\assets\img\desk-top-publishing.jpg')}}" alt="Shop Images">
                            </a>
                            <div class="product-hover-info">
                                <ul>
                                    <li><a href="#">Buy Now <i class="icon-4"></i></a></li>
                                    <li><a href="cart.php"><i class="icon-3"></i> Add to Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="{{route('view.coursedetails')}}">Desk Top Publishing Video</a></h6>
                            <div class="price">Rs 70.00</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-product">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.coursedetails')}}">
                                <img src="{{asset('newlms\assets\img\desk-top-publishing.jpg')}}" alt="Shop Images">
                            </a>
                            <div class="product-hover-info">
                                <ul>
                                    <li><a href="#">Buy Now <i class="icon-4"></i></a></li>
                                    <li><a href="cart.php"><i class="icon-3"></i> Add to Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="{{route('view.coursedetails')}}">Desk Top Publishing Video</a></h6>
                            <div class="price">Rs 70.00</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-product">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.coursedetails')}}">
                                <img src="{{asset('newlms\assets\img\desk-top-publishing.jpg')}}" alt="Shop Images">
                            </a>
                            <div class="product-hover-info">
                                <ul>
                                    <li><a href="#">Buy Now <i class="icon-4"></i></a></li>
                                    <li><a href="cart.php"><i class="icon-3"></i> Add to Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="{{route('view.coursedetails')}}">Desk Top Publishing Video</a></h6>
                            <div class="price">Rs 70.00</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-product">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.coursedetails')}}">
                                <img src="{{asset('newlms\assets\img\the-magic-book-cover-img.png')}}" alt="Shop Images">
                            </a>
                            <div class="product-hover-info">
                                <ul>
                                    <li><a href="#">Buy Now <i class="icon-4"></i></a></li>
                                    <li><a href="cart.php"><i class="icon-3"></i> Add to Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="{{route('view.coursedetails')}}">Desk Top Publishing Video</a></h6>
                            <div class="price">Rs 70.00</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-product">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.coursedetails')}}">
                                <img src="{{asset('newlms\assets\img\the-magic-book-cover-img.png')}}" alt="Shop Images">
                            </a>
                            <div class="product-hover-info">
                                <ul>
                                    <li><a href="#">Buy Now <i class="icon-4"></i></a></li>
                                    <li><a href="cart.php"><i class="icon-3"></i> Add to Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="{{route('view.coursedetails')}}">Desk Top Publishing Video</a></h6>
                            <div class="price">Rs 70.00</div>
                        </div>
                    </div>
                </div>
            </div>
        
     
        </div>

    </div>
</section>  
@endsection