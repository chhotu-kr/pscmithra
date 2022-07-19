@extends('admin.base')
@section('content')
   <main class="main" id="main">
     <div class="container">
        <div class="col-3">
            @include('admin.side')
        </div>
        <div class="col-12">
           <div class="card">
            <div class="card-header ps-2 h4">Edit SecondQuestion</div>
            <div class="card-body">
                <form action="{{ route('secondquestion.Update', $secondquestion) }}" class="row g-3 needs-validation" method="POST" novalidate>
                      
                    @csrf
                    
                    <div class="col-md-6 position-relative">
                      <label for="validationTooltip04" class="form-label">Language_id</label>
                      <select class="form-select" name="language_id" id="validationTooltip04" required>
                        
                         @foreach ($language as $item)

                         <option value="{{ $item->id }}"
    @if ($item->id==$secondquestion->language_id)
        selected="selected"
    @endif
  >{{ $item->languagename}}</option>
                           
                         @endforeach
                        
                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid language.
                      </div>
                    </div>
                    <div class="col-md-6 position-relative">
                      <label for="validationTooltip04" class="form-label">Question_id</label>
                      <select class="form-select" name="question_id" id="validationTooltip04" required>
                        <option selected disabled value="0">Select your correct question</option>
                         @foreach ($question as $sub)
                             <option value="{{$sub->id}}">{{$sub->id}}</option>
                         @endforeach
                        
                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid language.
                      </div>
                    </div>
                    <div class="col-md-12 position-relative">
                        <label for="validationTooltip01" class="form-label">Question</label>
                        <input type="text" class="form-control" name="question" id="validationTooltip01" value="{{$secondquestion->question}}"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip01" class="form-label">Option1</label>
                        <input type="text" class="form-control" name="option1" id="validationTooltip01" value="{{$secondquestion->option1}}"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip01" class="form-label">Option2</label>
                        <input type="text" class="form-control" name="option2" id="validationTooltip01" value="{{$secondquestion->option2}}"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip01" class="form-label">Option3</label>
                        <input type="text" class="form-control" name="option3" id="validationTooltip01" value="{{$secondquestion->option3}}"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip01" class="form-label">Option4</label>
                        <input type="text" class="form-control" name="option4" id="validationTooltip01" value="{{$secondquestion->option4}}" required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    {{-- <div class="col-md-12 position-relative">
                        <label for="validationTooltip04" class="form-label">RightAns</label>
                        <select class="form-select" name="rightans" id="validationTooltip04" value="{{$secondquestion->rightans}}" required>
                          <option selected  value="0">Choose your correct ans</option>
                               <option value="1">option1</option>
                               <option value="2">option2</option>
                               <option value="3">option3</option>
                               <option value="4">option4</option>
                          
                          
                        </select>
                        <div class="invalid-tooltip">
                          Please select a valid answer.
                        </div>
                      </div> --}}
                    
                    
                    <div class="col-md-12">
                      <button class="btn btn-primary w-100" type="submit">Update</button>
                    </div>
                  </form>
            </div>
           </div>
        </div>
     </div>
   </main>
@endsection