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
                    <div class="card-header">Insert Modules</div>
                    <div class="card-body">
                        <input  id="idd" value="{{$id}}"  type ="text" readonly hidden> 
                        <form action="{{route('module.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                       <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label>Course_id</label>
                                <select name="course_id" id="" class="form-select" required>
                                    <option value="0">Select Course</option>
                                 
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label>Is_Free</label>
                                <select name="isfree" class="form-select" required>
                                    <option>Select</option>
                                    <option value="true">True</option>
                                    <option value="false">False</option>
                                  
                                </select>
                            </div>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label>Type</label>
                                <select name="type" id="selected" class="form-select">
                                    <option value="0">Select Type</option>
                                    <option value="voice">voice</option>
                                    <option value="text">text</option>
                                    <option value="quiz">quiz</option>
                                    <option value="video">video</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label>Index</label>
                                <input type="number" name="index" class="form-control" required>
                            </div>
                        </div>
                       </div>
                       <div id ="extend"></div>
                      
                        {{-- <div class="col-6">
                            <div class="mb-3" id="bc">
                                <label>QuizId</label>
                                <input type="text" name="quiz_id" class="form-control">
                            </div>
                        </div>
                       </div> --}}
                        {{-- <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-success mb-3" id="divv">Hide</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-dark text-white mb-3" id="sonu">Show</button>
                            </div>
                        </div> --}}
                        {{-- <div class="mb-3" id="ac">
                            <label>Text</label>
                            <textarea name="text" id="validationTooltip01" cols="30" rows="5" class="tinymce-editor form-control"></textarea>
                        </div> --}}
                       
                        
                        
                       
                        <div class="mb-3">
                            <input type="submit" value="Create" class="btn btn-primary w-100">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <form action="" method="post">
        @csrf
       
      
        
          <input type="submit" class="btn btn-primary" id="btn">
    </form> --}}
</main>
<script>
    $('#selected').change(function(){
        var responseID = $(this).val();
        console.log(responseID);
 if(responseID=="video"|| responseID=="voice"){
    // console.log("hgfhjfjvjhhnbnm");

    html=` <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label>Url</label>
                                <input type="text" name="url" class="form-control">
                            </div>
                        </div>`;
                        $("#extend").html(html);

   }  else if(responseID=="quiz"){
    $.ajax({
         type:'get',
         dataType:'json',
         contentType:'application/json',
         url:"{{ route('show.examination') }}",
         data:{},
         success:function(data){
         console.log(data);
          Html=`<table class="table datatable">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                              
                                <th scope="col">Name</th>
                                <th scope="col">Count</th>
                                
                                </tr>
                              </thead>
                              <tbody>`;
          $.each(data, function(index, value) {

            Html+=`<tr>
              <td><input type='checkbox' value='${value.id}' name='quiz_id'></td>
              
              <td>${value.exam_name}</td>
              <td>${value.exam_q.length}</td>
              
              
              </tr>`;
                // lang='';
               
                // Html+=lang+`</td>
              
          });
          Html+=` </tbody>
                            </table>`;
          $("#extend").html(Html);
         }
      });
    }


    
        // var examid=document.getElementById("idd").value;  
      //  alert( examid );
    //   console.log(Id + "and " + examid)
     

 });                                                        
       
    
</script>  
@endsection

