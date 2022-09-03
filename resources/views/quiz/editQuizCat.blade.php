@extends('admin.base')
@section('content')

<main id="main" class="main">
<div class="container mt-3">
    <div class="row">
        <div class="col-3">
        @include('admin.side')
        </div>
        <h2 class="text-theme ps-2 mt-2 h4">Edit QuizCategory</h2>
        <div class="col-12">
         <div class="card">
           <div class="card-header"><h6 class="text-theme h5 ps-2">Edit QuizCategory</h6></div>
           <div class="card-body">
            <form action="{{ route('quizcategory.update',$quizcategory)}}" enctype="multipart/form-data" method="POST">
              @csrf
                    {{-- <div class=" position-relative">
                        <label for="validationTooltip04" class="form-label">Exam_Id</label>
                        <select class="form-select" name="exam_id" id="validationTooltip04" required>
                          <option selected disabled value="">Select Your Category</option>
                          @foreach ($exam as $item)
                          <option value="{{ $item->id }}"
                            @if ($item->id==$category->exam_id)
                                selected="selected"
                            @endif
                          >{{ $item->examname}}</option>
                          @endforeach
                        </select>
                        <div class="invalid-tooltip">
                          Please select a valid id.
                        </div>
                      </div>
                 </div>
                --}}
              
                  <div class="position-relative">
                    <label for="validationTooltip04" class="ps-2">name</label>
                    <input type="text" name="name" class="form-control" id="validationTooltip04" value="{{ $quizcategory->name}}" required>
                </div>
                  <div class="position-relative">
                    <label for="validationTooltip04" class="ps-2">Image</label>
                    <input type="file" name="image" class="form-control mb-3" id="validationTooltip04" value="{{ $quizcategory->image}}" required>
                </div>
                @livewire('imageview', ['image' => ['image' => $quizcategory->image,'w'=>'80','h'=>'80']], key($item->id))
                <div class="m-3 row">
                  <div class="form-check form-switch col-sm-auto">
                      <input class="form-check-input" type="checkbox" id="ifnested" value="false"  name="ifnested">
                      <label class="form-check-label" for="checkbox1">IfNested</label>
                    </div>
                    <script>
                      $("#ifnested").on('change', function() {
                         if ($(this).is(':checked')) {
                          $(this).attr('value', 'true');
                            } else {
                               $(this).attr('value', 'false');
                                }

                        });
                        VirtualSelect.init({
                          ele: '.ss',
                           search: false,
                            required: true
                        });
                        document.querySelector('#assaa').validate();
                    </script>


                    
                   </div>
              </div>
              
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

