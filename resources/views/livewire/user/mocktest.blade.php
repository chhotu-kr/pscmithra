<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
{{$idd}}
    <div class="card-body">
        <h5 class="card-title">Vertical Pills Tabs</h5>
  
      
        <div class="d-flex align-items-start">
          <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @foreach ($category as $item)
                   <button  id="{{$item->slugid}}" data-bs-toggle="pill" data-bs-target="#tab-{{$item->slugid}}" type="button" role="tab" aria-controls="tab-{{$item->slugid}}"
                                  @if($item->id==$idd)
                                   class="nav-link active"
  
                                   @else
                                   class="nav-link"
                                      @endif
                                   >{{$item->category}}</button> 
            @endforeach
  
           
          </div>

          {{print_r($category[0]->subcat[0]->subcategory)}}
          <div class="tab-content" id="v-pills-tabContent">
         
              @foreach ($category as $item)
                <div 
                  @if($item->id==$idd)
                     class="tab-pane fade show active"
                     @else
                    class="tab-pane fade"
                  @endif
                    id="tab-{{$item->slugid}}" role="tabpanel" aria-labelledby="{{$item->slugid}}">
                 @foreach ($item->subcat as $sub)
                 
                    {{print($sub)}}
                
                  @endforeach
                </div>
              @endforeach
          </div>
        </div>
  
  
      </div>
</div>












   