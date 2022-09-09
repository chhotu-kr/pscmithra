@extends('admin.base')
@section('content')

<main id="main" class="main">
<div class="container mt-3">
    <div class="row">
        <div class="col-3">
        @include('admin.side')
        </div>
        <h2 class="text-theme ps-2 mt-2 h4">Edit Testmonials</h2>
        <div class="col-12">
         <div class="card">
           <div class="card-header"><h6 class="text-theme h5 ps-2">Edit Testmonials</h6></div>
           <div class="card-body">
            <form action="{{ route('Testmonials.update',$testimonials)}}" method="POST">
              @csrf
                <div class=" position-relative">
                        <label for="validationTooltip04" class="form-label">UserName</label>
                        <select class="form-select" name="user_id" id="validationTooltip04" required>
                          <option selected disabled value="0">Select Your username</option>
                          @foreach ($user as $item)
                          <option value="{{$item->id}}"
                            @if ($item->id==$testimonials->user_id)
                                selected="selected"
                            @endif
                          >{{ $item->name}}</option>
                          @endforeach
                        </select>
                        <div class="invalid-tooltip">
                          Please select a valid id.
                        </div>
                      </div>
                 </div>
               
              
                  <div class="position-relative">
                    <label for="validationTooltip04" class="ps-2">Message</label>
                    <textarea class="editor" name="message" id="validationTooltip05" class="form-control" required>{!!$testimonials->message!!}</textarea>                </div>
                
                  
                
              
              
               <div class="mb-3">
                 <button type="submit" class="btn btn-primary mt-3 w-100">Update</button>
               </div>
             </form>  
           </div>
         </div>
            
          </div>
        </div>
        
    </div>
</div>
</main>
@endsection

