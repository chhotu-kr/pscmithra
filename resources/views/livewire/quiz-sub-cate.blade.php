<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div>
        {{-- In work, do what you enjoy. --}}
        <div class="row">
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
                  
                        @foreach ($quizchapters as $item)
                          
                           
                              <li class="list-group list-group-item">{{$item->name}}</li>
              
                              
                         
                        @endforeach
                    
                       </div>
                     </div>
                   
                   </div>
                </div>
                
            
            </div>
    
         
        </div>
    </div>
    
</div>
