@extends('admin/base')
@section('content')

@extends('admin.base')
@section('content')
<main id="main" class="main">
<div class="container mt-3">
    <div class="row">
        <div class="col-3">
            @include('admin.side')
        </div>
          <h6 class="text-theme ps-2 h4">Edit Testimonials</h6>
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">Edit Testimonials</div>
                    <div class="card-body">
                        <form action="{{route('update.testimonials',$test_monials)}}" class=" row g-3 needs-validation" enctype="multipart/form-data" method="post" novalidate>
              
                            @csrf
                          <div class=" position-relative">
                          <label for="validationTooltip04" class="form-label">UserName</label>
                          <select class="form-select" name="user_id" id="validationTooltip04" required>
                            <option selected disabled value="">Choose Your UserName</option>
                            @foreach ($user $item)
                            <option value="{{$item->id}}" @if ($item->id==$testi_monials->user_id){
                                selected="selected"
                            }
                                
                            @endif>{{$item->name}}</option>
                            @endforeach
                          </select>
                          <div class="invalid-tooltip">
                            Please select a valid id.
                          </div>
                          </div>

                          
                          <div class=" position-relative">
                          <label for="validationTooltip05" class="form-label">Message</label>
                          <input type="text" class="form-control" name="message" id="validationTooltip05" value="{{$test_monials->message}}" required>
                          <div class="invalid-tooltip">
                            Please provide a valid message.
                          </div>
                          </div>
                         
  
                       
                          
                          <div class="col-12">
                          <button class="btn btn-primary mt-3 w-100" type="submit">Create</button>
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
    {{-- <main id="main" class="main">
        @include('admin.side')
        <div class="container">
          <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                  Add Testimonials
                 </button>
              </div>
              
       
                
  
                <div class="modal fade" id="largeModal" tabindex="-1">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Testimonials</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('testimonials.store')}}" class=" row g-3 needs-validation" enctype="multipart/form-data" method="post" novalidate>
              
                          @csrf
                        <div class=" position-relative">
                        <label for="validationTooltip04" class="form-label">UserName</label>
                        <select class="form-select" name="user_id" id="validationTooltip04" required>
                          <option selected disabled value="">Choose Your UserName</option>
                          @foreach ($user $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                        <div class="invalid-tooltip">
                          Please select a valid id.
                        </div>
                        </div>

                        <input type="hidden" value="{{$id}}" name="category_id">
                        <div class=" position-relative">
                        <label for="validationTooltip05" class="form-label">Message</label>
                        <input type="text" class="form-control" name="message" id="validationTooltip05" value="{{$test_monials->message}}" required>
                        <div class="invalid-tooltip">
                          Please provide a valid message.
                        </div>
                        </div>
                        {{-- <div class=" position-relative">
                        <label for="validationTooltip05" class="form-label">image</label>
                        <input type="file" class="form-control" name="image" id="validationTooltip05" required>
                        <div class="invalid-tooltip">
                          Please provide a valid image.
                        </div>
                        </div> --}}

                     
                        
                        <div class="col-12">
                        <button class="btn btn-primary mt-3 w-100" type="submit">Create</button>
                        </div>
                        
                        </form><!-- End Custom Styled Validation with Tooltips -->
                        
    
                      </div>
                     
                    </div>
                  </div>
                </div><!-- End Large Modal-->
              </div>
          </div>
      </div>
     
    </main> --}}
@endsection
