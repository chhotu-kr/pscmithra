@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">
  @include('admin.side')
 <div class="row">
   
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h6 class="border-5 border-start border-danger ps-1 mt-2   h4 text-theme text-warning">Add Examquestion</h6>
        </div>
        <div class="card-body">
          <input type="hidden"  id="idd" value="{{$id}}">
          {{-- <form action="{{route('examquestion.store')}}" method="POST">
            @csrf
          
            


       
         <div class="mb-3">
              <label for="validationTooltip04" class="form-label">ExamName</label>
              <select class="form-select" name="exam_id" id="validationTooltip04" required>
                <option selected disabled value="0">Choose your exam</option>
                @foreach ($exam as $item)
                    <option value="{{$item->id}}">{{$item->examname}}</option>
                @endforeach
              </select>
          </div>
          <div class="mb-3">
              <label for="validationTooltip04" class="form-label">Question</label>
              <select class="form-select" name="question_id" id="validationTooltip04" required>
                <option selected disabled value="0">Choose your exam</option>
                @foreach ($secondquestion as $item)
                    <option value="{{$item->id}}">{{$item->question}}</option>
                @endforeach
              </select>
          </div>
         
          <div class="mb-3">
              <label for="" class="h6">SerialNo</label>
              <input type="text" name="serialno" class="form-control" required>
          </div> 
        
         
          <div class="mb-3">
           <button type="submit" class="btn btn-primary w-100">submit</button>
         </div>
        </form> --}}
        <form action="{{route('submit.check')}}" method="POST">
          @csrf
          <livewire:subjects /> 
        
          {{-- <th><input class="hidden" name="exam" value="question_id" ></th> --}}
          <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Checkbox</th>
                  <th scope="col">Id</th>
                 
                  <th scope="col">Name</th>
                  <th scope="col"> Language</th>
                  {{-- <th scope="col">topic Name</th> --}}
                  
                  {{-- <th scope="col">Action</th> --}}
                  
                </tr>
              </thead>
              <tbody  id="tablebody">
               
                 {{-- @foreach ($examquestion as $item)
                        <tr>
                          <td><input type="checkbox"  name="az[]" value="{{$item}}"></td>
                       
                            <td>{{$item->id}}</td>
                            <td>{{$item->exam->examname}}</td>
                            <td>{{$item->question->subject->sub_name}}</td>
                            <td>{{$item->question->topic->topic_name}}</td>
                            <td>{{$item->question->name}}</td>
                           
                           
                            <td>
                             <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
               --}}
                  </tbody>
            </table>
            <input type="hidden" value="{{$id}}" name="examination_id">
            <input type="submit" class="btn btn-primary" id="btn">
      </form>
        </div>
      </div>
    </div>
         
  </div>
   
      
     

 <!-- End Page Title -->

 

</main><!-- End #main -->
<script>


$(function() {
    $("#ikkkkk").change(function() {

      var Id = $(this).val();
      
      
      var examid=document.getElementById("idd").value;  
      //  alert( examid );
      console.log(Id + "and " + examid)
      $.ajax({
         type:'get',
         dataType:'json',
        contentType:'application/json',
         url:"{{ route('submit.check') }}",
         data:{'id':Id ,'eID':examid},
         success:function(data){
         console.log(data);
          Html="";
          $.each(data, function(index, value) {

            Html+=`<tr>
              <td><input type='checkbox' value='${value.id}' name='data[]'></td>
              <td>${value.id}</td>
              <td>${value.name}</td>
              
              <td>`;
                lang='';
                $.each(value.secondquestion,function(ind,val){lang+=val.language.languagename+', ';
              });
                Html+=lang+`</td>
              </tr>`;
          });

          $("#tablebody").html(Html);
         }
      });

    });
});
   
  // $.ajaxSetup({
  //     headers: {
  //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //     }
  // });
 
  // $("#btn").click(function(e){

  //     // e.preventDefault();
 
  //     let array = $("input[name=az[]]").val();
     
 
  //     $.ajax({
  //        type:'POST',
  //        url:"{{ route('submit.check') }}",
  //        data:{data:array},
  //        success:function(data){
  //           alert(data.success);
  //        }
  //     });

  // });
</script>
@endsection




