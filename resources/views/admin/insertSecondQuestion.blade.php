@extends('admin.base')
@section('content')
   <main class="main" id="main">
     <div class="container">
        <div class="col-3">
            @include('admin.side')
        </div>
        <div class="col-12">
           <div class="card">
            <div class="card-header ps-2 h4">InsertQuestion</div>
            <div class="card-body">
              {{-- <input  id="idd" value="{{$id}}"> --}}
                <form action="{{ route('insertsecondquestion.store') }}" class="row g-3 needs-validation" method="POST" novalidate>
                      
                    @csrf
                    
                    <div class="col-md-12 position-relative">
                      <label for="validationTooltip04" class="form-label">Language_id</label>
                      <select class="form-select" name="language_id" id="validationTooltip04" required>
                        <option selected disabled value="0">Choose your correct ans</option>
                         @foreach ($language as $item)
                             <option value="{{$item->id}}">{{$item->languagename}}</option>
                         @endforeach
                        
                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid language.
                      </div>
                    </div>
                    
                      <input class="form-select" name="question_id" value="{{$secondquestion}}" type="hidden" required>
                       
                   
                    <div class="col-md-12 position-relative">
                        <label for="validationTooltip01" class="form-label">Question</label>
                        <input type="text" class="form-control" name="question" id="validationTooltip01"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip01" class="form-label">Option1</label>
                        <input type="text" class="form-control" name="option1" id="validationTooltip01"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip01" class="form-label">Option2</label>
                        <input type="text" class="form-control" name="option2" id="validationTooltip01"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip01" class="form-label">Option3</label>
                        <input type="text" class="form-control" name="option3" id="validationTooltip01"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-3 position-relative">
                        <label for="validationTooltip01" class="form-label">Option4</label>
                        <input type="text" class="form-control" name="option4" id="validationTooltip01"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    
                    
                    <div class="col-md-12">
                      <button class="btn btn-primary w-100" type="submit">Create</button>
                    </div>
                  </form>

           
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
            
               <script type="text/javascript">
            
                $('#questionForm').on('submit',function(e){
                    e.preventDefault();
            
                    let name = $('#language').val();
                    let name = $('#question').val();
                    let email = $('#option1').val();
                    let mobile_number = $('#option2').val();
                    let subject = $('#option3').val();
                    let message = $('#option4').val();

                    var questionid=document.getElementById("idd").value;  
            
                    $.ajax({
                      url: "/secondquestion",
                      data:{'id':Id ,'eID':questionid},
                      type:"POST",
                      data:{
                        "_token": "{{ csrf_token() }}",
                        language_id:language_id,
                        question:question,
                        option1:option1,
                        option2:option2,
                        option3:option3,
                        option4:option4,
                        
                      },
                      success:function(response){
                        console.log(response);
                        if (response) {
                          $('#success-message').text(response.success); 
                          $("#contactForm")[0].reset(); 
                        }
                      },
                      error: function(response) {
                        $('#language-error').text(response.responseJSON.errors.language);
                        $('#question-error').text(response.responseJSON.errors.question);
                        $('#option1-error').text(response.responseJSON.errors.option1);
                        $('#option2-error').text(response.responseJSON.errors.option2);
                        $('#option3-error').text(response.responseJSON.errors.option3);
                        $('#option4-error').text(response.responseJSON.errors.option4);
                       }
                     });
                    });
                  </script>
            </div>
           </div>
        </div>
     </div>
     
   </main>
@endsection