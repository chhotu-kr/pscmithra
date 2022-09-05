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
                        <input  id="idd" value="{{$id}}" name="course_id"  type ="text" readonly hidden> 
                        <form action="{{route('module.store')}}" method="POST">
                            @csrf
                           

                       <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label>Index</label>
                                <input type="number" name="index" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4 mt-4">
                            <div class="form-check form-switch col-sm-auto">
                                <input class="form-check-input" type="checkbox" id="isFree" value="false" name="isfree" >
                                <label class="form-check-label" for="checkbox1">Is Free</label>
                              </div>
          
          
                              
                            </div>
                        </div>
                         <script>



                            $("#isFree").on('change', function() {
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
                       <div class="col-md-12 position-relative">
                        <label for="validationTooltip01" class="form-label">Description</label>
                        <textarea class="editor" id="validationTooltip05" name="description"  class="form-control" required></textarea>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>

                  <livewire:course-module.module/>
                       {{-- <div class="row">
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
                        
                       </div> --}}
                       {{-- <div id ="extend"></div> --}}
                      
                       
                        
                        
                       
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
{{-- <script>
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
       
    
</script>   --}}
@endsection

