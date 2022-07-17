@extends('admin.base')
@section('content')
<main id="main" class="main">
 <div class="container">
     <div class="row">
         <div class="col-3">
            @include('admin.side')
         </div>
         <div class="col-12">
           <div class="card">
               <div class="card-header">
                  <h6 class="text-theme h5 ps-2 mt-2"> Edit Question</h6>
               </div>
               <div class="card-body">
                <form action="{{route('question.Update',$question)}}" method="POST" >
                    @csrf
                
                    <div class="row">
                        <div class="col-md-6 position-relative">
                            <label for="validationTooltip04" class="form-label">Subject</label>
                            <select class="form-select" name="subject_id" id="validationTooltip04" required>
                              <option selected disabled value="0">Select your subject</option>
                             
                              @foreach ($subject as $item)
                                  <option value="{{$item->id}}">{{$item->sub_name}}</option>
                              @endforeach
                            </select>
                            <div class="invalid-tooltip">
                              Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="validationTooltip04" class="form-label">Topic</label>
                            <select class="form-select" name="topic_id" id="validationTooltip04" required>
                              <option selected disabled value="0">Select your Topic</option>
                              @foreach ($topic as $req)
                                <option value="{{$req->id}}">{{$req->topic_name}}</option>  
                              @endforeach
                            </select>
                            <div class="invalid-tooltip">
                              Please select a valid state.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" value="{{$question->name}} required">
                    </div>
                 <div class="row">
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">RightAns</label>
                        <select class="form-select" name="rightans" id="validationTooltip04" required>
                          <option selected disabled value="">Select your correct ans</option>
                          <option>option1</option>
                          <option>option2</option>
                          <option>option3</option>
                          <option>option4</option>
                        </select>
                        <div class="invalid-tooltip">
                          Please select a valid answer.
                        </div>
                      </div>
                      
                    <div class="mb-3 mt-4">
                        <button type="submit" class="btn btn-primary w-100">submit</button>
                    </div>
                
                </form>
               </div>
           </div>
         </div>
       </div>
    </div>
</main>
@endsection