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
                    {{-- @method('put') --}}
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
                        <textarea class="question" id="validationTooltip05" name="question" class="form-control" value="{{$secondquestion->question}}" required></textarea>
                       
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Option1</label>
                        <textarea class="opt" id="validationTooltip01" name="option1" class="form-control" value="{{$secondquestion->option1}}" required></textarea>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Option2</label>
                        <textarea class="opt" id="validationTooltip01" name="option2" class="form-control" value="{{$secondquestion->option2}}" required></textarea>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Option3</label>
                        <textarea class="opt" id="validationTooltip01" name="option3" class="form-control" value="{{$secondquestion->option3}}" required></textarea>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Option4</label>
                        <textarea class="opt" id="validationTooltip01" name="option4" class="form-control" value="{{$secondquestion->option4}}" required></textarea>                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>

            
                    
                    
                    
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