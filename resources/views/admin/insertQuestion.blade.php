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
          tinymce.execCommand('mceRemoveControl', true, "textarea"+id);
          document.getElementById("Divv"+id).remove();
        }
    
        function add_row(){
          var index = $('textarea[name="question_add_id[]"]').length+1;
          
var id ="Divv"+index;
var tinymceID= "textarea"+index;
var tinymceidd= "textareaoption1"+index;
var tinymceiddd= "textareaoption2"+index;
var tinymceadd= "textareaoption3"+index;
var tinymceaddd= "textareaoption4"+index;
                


            var html =  '<div id="'+id+'"> <a id="'+index+'" onclick="remove(this.id);" class="btn btn-danger"></a>'; 
                   
            html+=      `<div class="col-md-12 position-relative"><label for="addbutton" class="form-label">Language_id</label> <select class="form-select" name="language_id[]" id="addbutton" required>
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
                        `;
                   html+='<div><textarea  class=" tinymce-editor form-control" name="question_add_id[]" id="'+tinymceID+'"></textarea> </div>';
                        
                       html+= `
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip01" class="form-label">Option1</label>`;
                       html+='<div><textarea  class=" tinymce-editor-yy form-control" name="option1[]" id="'+tinymceidd+'"></textarea> </div>';
                        
                       html+= `
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip01" class="form-label">Option2</label>`;
                       html+='<div><textarea  class=" tinymce-editor-yy form-control" name="option2[]" id="'+tinymceiddd+'"></textarea> </div>';
                        
                       html+= `
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip01" class="form-label">Option3</label>`;
                       html+='<div><textarea  class=" tinymce-editor-yy form-control" name="option3[]" id="'+tinymceadd+'"></textarea> </div>';
                        
                       html+= `
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip01" class="form-label">Option4</label>`;
                       html+='<div><textarea  class=" tinymce-editor-yy form-control" name="option4[]" id="'+tinymceaddd+'"></textarea> </div>';
                        
                       html+= `
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>`;
            $("#viewww").append(html);
             tinymce.EditorManager.execCommand('mceAddEditor', true, tinymceID);
            tinymce.EditorManager.execCommand('mceAddEditor', true, tinymceidd);
            tinymce.EditorManager.execCommand('mceAddEditor', true, tinymceiddd);
            tinymce.EditorManager.execCommand('mceAddEditor', true, tinymceadd);
            tinymce.EditorManager.execCommand('mceAddEditor', true, tinymceaddd);
        }
           
      
    </script>
     
       
      
   </main>
   
@endsection



