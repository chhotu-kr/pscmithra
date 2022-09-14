
@extends('user.dashboard')
@section('pscmithra')
<div class="education-breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">Course Details</h1>
            </div>
            <ul class="education-breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item active" aria-current="page">Course Details</li>
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

<div class="product-details-area gap-top-equal">
    <div class="container">
        <div class="row g-5 row--25">
              <div class="col-12 col-sm-4 col-lg-3 fillter-category">
                   <div class="card">
                     <form method="post" class="p-1">
                       <section>
                         <span class="text-muted font-weight-bold">Exam Search</span>
                         <div class="col-12">
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="" id="categorya">
                             <label class="form-check-label" for="categorya">Category A</label>
                           </div>
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="" id="categoryb">
                             <label class="form-check-label" for="categoryb">Category B</label>
                           </div>
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="" id="categoryc">
                             <label class="form-check-label" for="categoryc">Category C</label>
                           </div>
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="" id="categoryd">
                             <label class="form-check-label" for="categoryd">Category d</label>
                           </div>
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="" id="categorye">
                             <label class="form-check-label" for="categorye">Category e</label>
                           </div>
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="" id="categoryf">
                             <label class="form-check-label" for="categoryf">Category f</label>
                           </div>
                         </div>
                       </section>

                       <span class="text-muted font-weight-bold">Category</span>
                         <div class="col-12">
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="" id="category1">
                             <label class="form-check-label" for="category1">Category A</label>
                           </div>
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="" id="category2">
                             <label class="form-check-label" for="category2">Category B</label>
                           </div>
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="" id="category3">
                             <label class="form-check-label" for="category3">Category C</label>
                           </div>
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="" id="category4">
                             <label class="form-check-label" for="category4">Category d</label>
                           </div>
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="" id="category5">
                             <label class="form-check-label" for="category5">Category e</label>
                           </div>
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="" id="category6">
                             <label class="form-check-label" for="category6">Category f</label>
                           </div>
                         </div>
                       </section>
                       

                       <section class="mt-2">
                          <button class="btn btn-primary btn-sm btn-block">Apply</button>
                         </section>
                     </form>
                  </div>
                </div>

           {{-- @foreach ($product as $item)
         
           @endforeach --}}
           <div class="col-lg-4">
            <div class="thumbnail">
                {{-- <img src="{{asset('nassets\img\the-magic-book-cover-img.png')}}" alt="Product Images"> --}}
                @livewire('imageview', ['image' => ['image' => $product->bannerimage,'w'=>'210','h'=>'210']], key($item->id))
            </div>
        </div>
        <div class="col-lg-5">
            <div class="content">
                <h3 class="title">{{$product->title}}</h3>
                <div class="product-rating">
                    <div class="rating">
                        <i class="icon-23"></i>
                        <i class="icon-23"></i>
                        <i class="icon-23"></i>
                        <i class="icon-23"></i>
                        <i class="icon-23"></i>
                    </div>
                    <span class="rating-count">(3)</span>
                </div>
                <div style="margin-top:10px;"><strong>Subject: </strong><a style="font-weight:bold">&nbsp;&nbsp;{{$product->subject->sub_name}}</a></div>
                <div style="margin-top:10px;"><strong>Language:</strong>{{$language->languagename}}</div>
                <div style="margin-top:10px;"><strong>Publisher:</strong>Ram Kumer</div>
                <div class="price">Rs/-{{$product->price}}</div>
                <p>{{$product->content}}</p>
                <div class="product-action">
                    <div class="education-quantity-btn">
                        <div class="pro-qty"><input type="text" value="1"></div>
                    </div>
                    <div class="add-to-cart-btn">
                        <a class="education-btn btn-medium" href="{{ route('addtocart',['p_id'=>$product->id]) }}">Add To Cart</a>
                    </div>
                </div>
              
            </div>
        </div>
        </div>
    </div>
</div>

{{-- <section class="shop-page-area section-gap-equal" style="padding-top: 0;">
    <div class="container">
        <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
            <h2 class="title">RELATED STUDY <span class="color-primary">MATERIAL</span></h2>
        </div>
        <div class="row g-5">
            <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="education-product">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{route('view.coursedetails',$product)}}">
                                <img src="{{asset('nassets\img\desk-top-publishing.jpg')}}" alt="Shop Images">
                            </a>
                            <div class="product-hover-info">
                                <ul>
                                    <li><a href="#">Buy Now <i class="icon-4"></i></a></li>
                                    <li><a href="cart.php"><i class="icon-3"></i> Add to Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="{{route('view.coursedetails',$product)}}">Desk Top Publishing Video</a></h6>
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
                                <img src="{{asset('nassets\img\the-magic-book-cover-img.png')}}" alt="Shop Images">
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
                                <img src="{{asset('nassets\img\desk-top-publishing.jpg')}}" alt="Shop Images">
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
                                <img src="{{asset('nassets\img\the-magic-book-cover-img.png')}}" alt="Shop Images">
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
</section> --}}
@endsection