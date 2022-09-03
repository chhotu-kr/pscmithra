@extends('admin.base')
@section('content')

<main id="main" class="main">
<div class="container mt-3">
    <div class="row">
        <div class="col-3">
        @include('admin.side')
        </div>
        <h2 class="text-theme ps-2 mt-2 h4">Edit QuizTopic</h2>
        <div class="col-12">
         <div class="card">
           <div class="card-header"><h6 class="text-theme h5 ps-2">Edit QuizTopic</h6></div>
           <div class="card-body">
            <form action="{{ route('quiztopic.update', $quiztop)}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class=" position-relative">
                        <label for="validationTooltip04" class="form-label">QuizChapter</label>
                        <select class="form-select" name="quiz_chapters" id="validationTooltip04" required>
                          <option selected disabled value="">Select Your QuizChapter</option>
                          @foreach ($quizchapter as $item)
                          <option value="{{ $item->id }}"
                            @if ($item->id==$quiztop->quiz_chapters)
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
                    <label for="validationTooltip04" class="ps-2">name</label>
                    <input type="text" name="name" class="form-control" id="validationTooltip04" value="{{ $quiztop->name}}" required>
                </div>
                <div class="position-relative">
                  <label for="validationTooltip04" class="ps-2">Image</label>
                  <input type="file" name="image" class="form-control mb-3" id="validationTooltip04" value="{{ $quiztop->image}}" required>
                </div>

                @livewire('imageview', ['image' => ['image' => $quiztop->image,'w'=>'80','h'=>'80']], key($item->id))


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

