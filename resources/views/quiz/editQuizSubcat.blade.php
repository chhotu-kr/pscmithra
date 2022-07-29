@extends('admin.base')
@section('content')

<main id="main" class="main">
<div class="container mt-3">
    <div class="row">
        <div class="col-3">
        @include('admin.side')
        </div>
        <h2 class="text-theme ps-2 mt-2 h4">Edit QuizSubCategory</h2>
        <div class="col-12">
         <div class="card">
           <div class="card-header"><h6 class="text-theme h5 ps-2">Edit QuizSubCategory</h6></div>
           <div class="card-body">
            <form action="{{ route('quizSubcat.update',$quizsubcat)}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class=" position-relative">
                        <label for="validationTooltip04" class="form-label">QuizCategory</label>
                        <select class="form-select" name="quiz_categories" id="validationTooltip04" required>
                          <option selected disabled value="">Select Your QuizCategory</option>
                          @foreach ($quizcategory as $item)
                          <option value="{{ $item->id }}"
                            @if ($item->id==$quizsubcat->quiz_categories)
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
                    <input type="text" name="name" class="form-control" id="validationTooltip04" value="{{ $quizsubcat->name}}" required>
                </div>
                
                  <div class="position-relative">
                    <label for="validationTooltip04" class="ps-2">Image</label>
                    <input type="text" name="image" class="form-control" id="validationTooltip04" value="{{ $quizsubcat->image}}" required>
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

