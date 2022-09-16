@extends('user.dashboard')
@section('pscmithra')
{{-- <div class="conatiner">
    <div class="card">
        <div class="title">Purchase Reciept</div>
        <div class="info">
            <div class="row">
                <div class="col-7">
                    <span id="heading">Date</span><br>
                    <span id="details">10 October 2018</span>
                </div>
                <div class="col-5 pull-right">
                    <span id="heading">Order No.</span><br>
                    <span id="details">012j1gvs356c</span>
                </div>
            </div>      
        </div>      
        <div class="pricing">
            <div class="row">
                <div class="col-9">
                    <span id="name">BEATS Solo 3 Wireless Headphones</span>  
                </div>
                <div class="col-3">
                    <span id="price">&pound;299.99</span>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <span id="name">Shipping</span>
                </div>
                <div class="col-3">
                    <span id="price">&pound;33.00</span>
                </div>
            </div>
        </div>
        <div class="total">
            <div class="row">
                <div class="col-9"></div>
                <div class="col-3"><big>&pound;262.99</big></div>
            </div>
        </div>
        <div class="tracking">
            <div class="title">Tracking Order</div>
        </div>
        <div class="progress-track">
            <ul id="progressbar">
                <li class="step0 active " id="step1">Ordered</li>
                <li class="step0 active text-center" id="step2">Shipped</li>
                <li class="step0 active text-right" id="step3">On the way</li>
                <li class="step0 text-right" id="step4">Delivered</li>
            </ul>
        </div>
        
    
        <div class="footer">
            <div class="row">
                <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/YBWc55P.png"></div>
                <div class="col-10">Want any help? Please &nbsp;<a> contact us</a></div>
            </div>
            
           
        </div>
    </div>
</div> --}}
<div class="product-details-area gap-top-equal">
    <div class="container">
        <div class="row g-5 row--25">
              

            <div class="col-lg-4">
                <div class="thumbnail">
                    <img src="{{asset('nassets/img/the-magic-book-cover-img.png')}}" alt="Product Images">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="content">
                    <h3 class="title">Desk Top Publishing Video </h3>
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
                    <div style="margin-top:10px;"><strong>Category: </strong><a style="font-weight:bold">&nbsp;&nbsp;Elearning Courses</a></div>
                    <div style="margin-top:10px;"><strong>Language:</strong>Hindi</div>
                    <div style="margin-top:10px;"><strong>Publisher:</strong>Ram Kumer</div>
                    <div class="price">Rs/$70.30</div>
                    <h5 class="">Product Details</h5>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspic atis unde omnis iste natus.</p>
                    <div class="product-action">
                        <div class="education-quantity-btn">
                            <div class="pro-qty"><input type="text" value="1"></div>
                        </div>
                        <div class="add-to-cart-btn">
                            <a class="education-btn btn-medium" href="">Add To Cart</a>
                            <a class="education-btn btn-medium ms-5" href="">By Now</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action">Name<span  class="float-end">Lorrence</span></div>
                    <div class="list-group-item list-group-item-action">Product Type<span  class="float-end">pdf/plan/book</span></div>
                    <div class="list-group-item list-group-item-action ">Status<span  class="float-end">True/false</span></div>
                   
    
                    
                </div>
               
    
               
               
            </div>
        </div>
    </div>
</div>
@endsection