<div>
    {{-- The whole world belongs to you. --}}
    {{-- <div class="row">
        <div class="col-6">
            <div class="education-blog-sidebar">
            <div class="education-blog-widget widget-categories"  wire:model="categoryId" name="category_id">
                <div class="inner">
                    <h4 class="widget-title">Categories</h4>
                    <div class="content">
                        <ul class="category-list">
                            <li><a href="#">ESE & GATE EC</a></li>
                            <li><a href="#">IAS</a></li>
                            <li><a href="#">IAS Hindi</a></li>
                            <li><a href="#">CAT & MBA</a></li>
                            <li><a href="#">CTET & State TET Exams</a></li>
                            <li><a href="#">PRT, TGT & PGT Exams</a></li>
                            <li><a href="#">UGC NET & SET </a></li>
                            <li><a href="#">CSIR NET & SET </a></li>
                            @foreach ($category as $item)
                            <li><a href="">{{$item->category}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="education-blog-widget widget-action">
                <div class="inner">
                    <h4 class="title">Get Online Courses From <span>Education</span></h4>
                    <span class="shape-line"><i class="icon-19"></i></span>
                    <p>Nostrud exer ciation laboris aliqup</p>
                    <a href="#" class="education-btn btn-medium">Start Now <i class="icon-4"></i></a>
                </div>
            </div>
        </div>
        </div>
        <div class="col-6">
            <div class="card" wire:model="subcategory_id"   name="subcategory_id">
            @foreach ($subcategories as $item)
            
                <div class="card-body">
                    
                        <li class="">{{$item->subcategory}}</li>
                    
                </div>
            </div>
            @endforeach
        </div>
    </div> --}}
    <div class="row">
        <div class="col-lg-12">

            
            <div class="card">
             {{-- <div class="card-body"> --}}
               {{-- <h5 class="card-title">Accordion without outline borders</h5> --}}
     
               <!-- Accordion without outline borders -->
               <div class="accordion accordion-flush" id="accordionFlushExample" >
                 <div class="accordion-item">
                   <h2 class="accordion-header" id="flush-headingOne">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <h6>{{$Name}}</h6>
                     </button>
                   </h2>
                   <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="accordionFlushExample">
                    {{-- <ul class="list-group"> --}}
                    @foreach ($subcategories as $item)
                        {{-- {{$item->subcategory}} --}}
                       
                          <li class="list-group list-group-item">{{$item->subcategory}}</li>
          
                          
                     
                    @endforeach
                  {{-- </ul> --}}
                   </div>
                 </div>
               
               </div><!-- End Accordion without outline borders -->
     
             {{-- </div>--}}
            </div>
            
        
        </div>

     
    </div>
</div>
