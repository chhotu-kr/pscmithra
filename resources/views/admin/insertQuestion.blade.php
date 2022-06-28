@extends('admin/base')
@section('content')
   <main id="main" class="main">
       @include('admin.side')
       <div class="container">
         <div class="row">
           
             <h6 class="text-theme h4 text-danger  ps-2">Manage Question</h6>
           
           <div class="col-12">
                    <div class="card">
                      <div class="card-header h4">
                        Insert Question
                      </div>
                      <div class="card-body">
                        <form action="{{ route('insertquestion.store') }}" id="button" class="row g-3 needs-validation" method="POST" novalidate>
                      
                          @csrf
                          
                            <livewire:subjects />
                            
                            <div class="col-md-12">
                              <label for="validationCustom04" class="form-label">RightAns</label>
                              <select class="form-select" name="rightans" id="validationCustom04" required>
                                <option selected disabled value="">select your answer</option>
                                <option value="option1">option1</option>
                                <option value="option2">option2</option>
                                <option value="option3">option3</option>
                                <option value="option4">option4</option>
                              </select>
                              <div class="invalid-feedback">
                                Please select a valid state.
                              </div>
                            </div>
                            <div id="viewww" class="row g-3 needs-validation"></div>
                     <div class="row">
                      <div class="col-6" id="addbutton">
                        <a  id="addbutton" class="btn btn-primary mt-5">Add question</a>
                       </div>
                       
                       <div class="col-6">
                        <button class="btn btn-primary float-end mt-5"  type="submit">Create</button>
                      </div>   
                    </div>     
                    </div>
                          
                          
                        </form>
                      </div>
                    </div>
                 
            </div>
      
           </div>
         </div>
       </div>

       <script type="text/javascript">
 
        $(document).ready(function(){
            $('#addbutton').click(function(){
             add_row();               
            });
        });
        function remove(id){
          console.log(id);
        }
    
        function add_row(){
          var index = $('input[name="question_add_id[]"]').length+1;
          
var id ="Divv"+index;


            var html =  '<div id="'+id+'"> <a href="" id="" onclick="remove('+id+');" class="btn btn-danger"></a>'+ 
                   ` 
                     <div class="col-md-12 position-relative">
                      <label for="addbutton" class="form-label">Language_id</label>
                      <select class="form-select" name="language_id[]" id="addbutton" required>
                        <option selected disabled value="0">Choose your correct ans</option>
                         @foreach ($language as $item)
                             <option value="{{$item->id}}">{{$item->languagename}}</option>
                         @endforeach
                        
                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid language.
                      </div>
                    </div>
                      <div class="col-md-12 position-relative">
                        <label for="validationTooltip01" class="form-label">Question</label>
                        <input type="text" class="tinymce-editor form-control" name="question_add_id[]" id="validationTooltip01"  required>
                        
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip01" class="form-label">Option1</label>
                        <input type="text" class="form-control" name="option1[]" id="validationTooltip01"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip01" class="form-label">Option2</label>
                        <input type="text" class="form-control" name="option2[]" id="validationTooltip01"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip01" class="form-label">Option3</label>
                        <input type="text" class="form-control" name="option3[]" id="validationTooltip01"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip01" class="form-label">Option4</label>
                        <input type="text" class="form-control" name="option4[]" id="validationTooltip01"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    </div>`;
            $("#viewww").append(html);
             
        }
    </script>
     
       
      
   </main>
   
@endsection



