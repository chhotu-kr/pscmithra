@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">
  @include('admin.side')
 <div class="row">
   
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h6 class="border-5 border-start border-danger ps-1 mt-2   h4 text-theme text-warning">Add Quizquestion</h6>
        </div>
        <div class="card-body">
          <input type="hidden"  id="idd" value="{{$id}}">
         
        <form action="{{route('Cquizquestion.store')}}" method="POST">
          @csrf
          <livewire:subjects/>
        
          {{-- <th><input class="hidden" name="exam" value="question_id" ></th> --}}
          <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Checkbox</th>
                  <th scope="col">Id</th>
                 
                  <th scope="col">Name</th>
                  <th scope="col"> Language</th>
                 
                  
                </tr>
              </thead>
              <tbody  id="tablebody">
               
                
                  </tbody>
            </table>
            <input type="hidden" value="{{$id}}" name="quiz_examinations_id">
            <input type="submit" class="btn btn-primary" id="btn">
      </form>
        </div>
      </div>
    </div>
         
  </div>
   
      
     


 

</main>
<script>


$(function() {
    $("#ikkkkk").change(function() {

      var Id = $(this).val();
      
      
      var examid=document.getElementById("idd").value;  
   
      console.log(Id + "and " + examid)
      $.ajax({
         type:'get',
         dataType:'json',
        contentType:'application/json',
         url:"{{ route('CquizQues.submit') }}",
         data:{'id':Id ,'eID':examid },
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
   
  
</script>
@endsection




