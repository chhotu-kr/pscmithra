<div>
  {{-- {{json_encode($product)}} --}}
    
 

  <div class="row g-5">
    @foreach ($product as $item)
    <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
      <div class="education-product">
          <div class="inner">
              <div class="thumbnail">
                  <a href="course-details.php">
                      @livewire('imageview', ['image' => ['image' => $item->bannerimage,'w'=>'210','h'=>'210']], key($item->id))
                  </a>

                  <div class="ebook-box">
                    <p>{{$item->type}}</p>
                </div>
                 {{-- @if (!empty($item))
                 <div class="ebook-box">
                    <p>{{$item->type}}</p>
                </div>  

                    
                 @else
                
                 @endif --}}
              </div>
              <div class="content">
                  <h6 class="title"><a href="course-details.php">{{$item->title}}</a></h6>
                  <div class="price">Rs {{$item->price}}</div>
              </div>
              <div class="product-hover-info">
                      <ul>
                          <li><a href="#">Buy Now <i class="icon-4"></i></a></li>
                          <li><a href="cart.php"><i class="icon-3"></i> Add to Cart</a></li>
                      </ul>
                  </div>
          </div>
      </div>
    </div>
    @endforeach
  </div>
   
      
 
</div>
