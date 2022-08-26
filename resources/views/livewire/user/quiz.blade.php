<div>
    {{-- The Master doesn't talk, he acts. --}}

    <div class="card-body">
        {{-- <h5 class="card-title">Vertical Pills Tabs</h5> --}}
  
      
        <div class="d-flex align-items-start">
          <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @foreach ($quizcategory as $item)
                   <button  id="{{$item->slugid}}" data-bs-toggle="pill" data-bs-target="#tab-{{$item->slugid}}" type="button" role="tab" aria-controls="tab-{{$item->slugid}}"
                                  @if($item->id==$idasd)
                                   class="nav-link active"
  
                                   @else
                                   class="nav-link"
                                      @endif
                                   >{{$item->name}}</button> 
            @endforeach
  
           
          </div>
          <div class="tab-content" id="v-pills-tabContent">
         
              @foreach ($quizcategory as $item)
                <div 
                  @if($item->id==$idasd)
                     class="tab-pane fade show active"
                     @else
                    class="tab-pane fade"
                  @endif
                    id="tab-{{$item->slugid}}" role="tabpanel" aria-labelledby="{{$item->slugid}}">
                 {{-- @foreach ($item->quizcat as $sub)
                 <div class="card-body py-0">
                    {{$sub->name}}
                </div>
                  @endforeach --}}
                </div>
              @endforeach
          </div>
        </div>
  
  
      </div> 

      {{-- <div class="container">
        <div class="row">
          <div class="col-6">
            @foreach ($quizcategory as $item)
                <div class="card-body">{{$item->name}}</div>
            @endforeach
          </div>
          <div class="col-6">
            @foreach ($item->quizcat as $sub)
                <div class="card-body py-0">{{$sub->name}}</div>
            @endforeach
          </div>
        </div>
      </div> --}}
</div>
