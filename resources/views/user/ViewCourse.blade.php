
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

{{-- <div class="sorting-left mt-5 ps-5">
    <h6 class="showing-text">We found <span>71</span> courses available for you</h6>
</div> --}}

<div class="row">
    <div class="col-lg-12">

      <div class="card mt-5">
        <div class="card-body">
          {{-- <h5 class="card-title">Default Tabs</h5> --}}
          <h6 class="showing-text">We found <span>71</span> courses available for you</h6>
      
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            {{-- {{print($product)}} --}}
        

          
           <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pdf-tab" data-bs-toggle="tab" data-bs-target="#pdf" type="button" role="tab" aria-controls="pdf" aria-selected="true"> PDF </button>
          </li>

           
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="course-tab" data-bs-toggle="tab" data-bs-target="#course" type="button" role="tab" aria-controls="course" aria-selected="false">Course</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="book-tab" data-bs-toggle="tab" data-bs-target="#book" type="button" role="tab" aria-controls="book" aria-selected="false">Book</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ebook-tab" data-bs-toggle="tab" data-bs-target="#ebook" type="button" role="tab" aria-controls="book" aria-selected="false">Ebook</button>
            </li>
          </ul>
          <div class="tab-content pt-2" id="myTabContent">
            <div class="tab-pane fade show active" id="pdf" role="tabpanel" aria-labelledby="home-tab">
                @livewire('user.book.bookproduct',["item"=>'pdf'])
            </div>
            <div class="tab-pane fade" id="course" role="tabpanel" aria-labelledby="profile-tab">
                @livewire('user.book.bookproduct',["item"=>'course'])
            </div>
            <div class="tab-pane fade" id="book" role="tabpanel" aria-labelledby="contact-tab">
                @livewire('user.book.bookproduct',["item"=>'book'])
            </div>
            <div class="tab-pane fade" id="ebook" role="tabpanel" aria-labelledby="book-tab">
                @livewire('user.book.bookproduct',["item"=>'ebook'])
            </div>
          </div><!-- End Default Tabs -->
        </div>
      </div>
      
    
        
    

     
</div>

{{-- <section class="shop-page-area section-gap-equal">
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
</section>   --}}
@endsection