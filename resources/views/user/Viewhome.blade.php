@extends('user/dashboard')
@section('pscmithra')

{!! Session::get('error') !!}
{!! Session::get('success') !!}
@if (Session::get('success'))
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
         
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-success">
         Ordered Successfully
        </div>
        
      </div>
    </div>
  </div>
@endif
@if (Session::get('error'))
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
         
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-danger">
        Payment Error
        </div>
        
      </div>
    </div>
  </div>
@endif
<div class="main-home-slider">
    @foreach ($img as $item)
    <div class="item">
        {{-- <img src="{{asset("upload/".$item->image)}}"> --}}
        @livewire('imageview', ['image' => ['image' => $item->image,'w'=>'1779','h'=>'500']], key($item->id))
    </div>
    @endforeach

</div>
@livewire('user.categoryslider')
<div class="features-area-2">
    <div class="container">
        <div class="features-grid-wrap">
            <div class="features-box features-style-2 edublink-svg-animate">
                <div class="icon">
                    <img class="svgInject" src="{{asset('nassets/images/animated-svg-icons/online-class.svg')}}" alt="animated icon">
                </div>
                <div class="content">
                    <h5 class="title"><span>2K</span> Important Question</h5>
                </div>
            </div>
            <div class="features-box features-style-2 edublink-svg-animate">
                <div class="icon">
                    <img class="svgInject" src="{{asset('nassets/images/animated-svg-icons/instructor.svg')}}" alt="animated icon">
                </div>
                <div class="content">
                    <h5 class="title"><span>150 M+</span>Mock Test Attempted</h5>
                </div>
            </div>
            <div class="features-box features-style-2 edublink-svg-animate">
                <div class="icon certificate">
                    <img class="svgInject" src="{{asset('nassets/images/animated-svg-icons/certificate.svg')}}" alt="animated icon">
                </div>
                <div class="content">
                    <h5 class="title"><span>500+</span>E-Books</h5>
                </div>
            </div>
            <div class="features-box features-style-2 edublink-svg-animate">
                <div class="icon">
                    <img class="svgInject" src="{{asset('nassets/images/animated-svg-icons/user.svg')}}" alt="animated icon">
                </div>
                <div class="content">
                    <h5 class="title"><span>6M+</span>Happy Students</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="education-section-gap about-style-1" style="background:transparent;">
    <div class="container edublink-animated-shape">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="about-image-gallery">
                    <img data-sal-delay="150" data-sal="slide-right" data-sal-duration="800" class="main-img-1" src="{{asset('nassets/img/app-img.png')}}" alt="About Image">

                </div>
            </div>
            <div class="col-lg-7" data-sal-delay="150" data-sal="slide-left" data-sal-duration="800">
                <div class="about-content">
                    <div class="section-title section-left">
                        <span class="pre-title">About Us</span>
                        <h2 class="title">Learn & Grow Your Skills From <span class="color-secondary">Anywhere</span></h2>
                        <span class="shape-line"><i class="icon-19"></i></span>
                        <p>Lorem ipsum dolor sit amet consectur adipiscing elit sed eiusmod ex tempor incididunt labore dolore magna aliquaenim minim veniam quis nostrud exercitation ullamco laboris.</p>
                    </div>
                    <ul class="features-list">
                        <li>Expert Trainers</li>
                        <li>Online Remote Learning</li>
                        <li>Lifetime Access</li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="shape-group">
            <li class="shape-1 scene" data-sal-delay="500" data-sal="fade" data-sal-duration="200">
                <span data-depth="-2.3"></span>
            </li>
        </ul>
    </div>
</div>








<section class="shop-page-area shop-page-area-home">
    <div class="container">
        <div class="education-sorting-area">
            <div class="sorting-left">
                <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <h2 class="title">Courses Available <span class="color-primary">for You</span></h2>
                </div>
            </div>
            <div class="sorting-right">
                <div class="education-sorting">
                    <a href="">View All</a>
                </div>
            </div>
        </div>
        <div class="row g-5">
            @foreach ($product as $item)
            <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-product">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.coursedetails',$item->id)}}">
                                @livewire('imageview', ['image' => ['image' => $item->bannerimage,'w'=>'210','h'=>'210']], key($item->id))
                            </a>
                            <div class="ebook-box">
                                <p>{{$item->type}}</p>
                            </div>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="{{route('view.coursedetails',$item->id)}}">{{$item->title}}</a></h6>
                            <div class="price">Rs/-{{$item->price}}</div>
                        </div>
                        <div class="product-hover-info">
                            <ul>
                                <li><a href="#">Buy Now <i class="icon-4"></i></a></li>
                                <li><a href="{{ route('addtocart',['p_id'=>$item->id]) }}"><i class="icon-3"></i> Add to Cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
           

        </div>
       
    </div>
</section>

<div class="testimonial-area-1 section-gap-equal">
    <div class="container">
        <div class="row g-lg-5">
            <div class="col-lg-5">
                <div class="testimonial-heading-area">
                    <div class="section-title section-left" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                        <span class="pre-title">Testimonials</span>
                        <h2 class="title">What Our Students Have To Say</h2>
                        <p>Lorem ipsum dolor sit amet consectur adipiscing elit sed eiusmod tempor incididunt labore dolore magna aliquaenim ad minim.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="home-one-testimonial-activator slide-with-shadow">
                   @foreach ($testimonials as $item)
                   <div class="testimonial-grid">
                    <div class="thumbnail">
                        @livewire('imageview', ['image' => ['image' => $item->subuser->image,'w'=>'50','h'=>'50']], key($item->id))
                        <span class="qoute-icon"><i class="icon-26"></i></span>

                    </div>
                    <div class="content">
                        <p>{{$item->message}}</p>
                        <div class="rating-icon">
                            <i class="icon-23"></i>
                            <i class="icon-23"></i>
                            <i class="icon-23"></i>
                            <i class="icon-23"></i>
                            <i class="icon-23"></i>
                        </div>
                        <h5 class="title">{{$item->subuser->name}}</h5>
                        <span class="subtitle">Student</span>
                    </div>
                </div>
                   @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#successModal").modal('show');
    $("#errorModal").modal('show');
</script>

@endsection