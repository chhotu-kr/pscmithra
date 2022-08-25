<div>
    
   {{-- <div class="row">
        <div class="col-lg-12">

            
            <div class="card">
             
               <div class="accordion accordion-flush" id="accordionFlushExample" >
                 <div class="accordion-item">
                   <h2 class="accordion-header" id="flush-headingOne">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <h6>{{$Name}}</h6>
                     </button>
                   </h2>
                   <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="accordionFlushExample">
                    
                    @foreach ($subcategories as $item)
                       
                       
                          <li class="list-group list-group-item">{{$item->subcategory}}</li>
          
                          
                     
                    @endforeach
                 
                   </div>
                 </div>
               
               </div>
     
             
            </div>
            
        
        </div>

     
    </div>  --}}

    <div class="card">
        <div class="card-body">
          {{-- <h5 class="card-title">Vertical Pills Tabs</h5> --}}

          <!-- Vertical Pills Tabs -->
          <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">{{$Name}}</button>
              {{-- <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
              <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button> --}}
            </div>
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
               @foreach ($subcategories as $item)
               {{$item->subcategory}}
               @endforeach
              </div>
              {{-- <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
              </div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
              </div> --}}
            </div>
          </div>
          <!-- End Vertical Pills Tabs -->

        </div>
      </div>
</div>
