@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">
  
 <div class="row">
   
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h6 class="border-5 border-start border-danger ps-1 mt-2   h4 text-theme text-warning">Add Quizquestion</h6>
        </div>
        <div class="card-body">
          <input type="hidden"  id="idd" value="{{$id}}">
         
        <form action="{{route('store.livequestion')}}" method="POST">
          @csrf
          <livewire:subjects/>
        
          {{-- <th><input class="hidden" name="exam" value="question_id" ></th> --}}
          
                <div id="asdsd"></div>
                  
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
         url:"{{route('store.liveQues')}}",
         data:{'id':Id ,'eID':examid },
         success:function(data){
       
          Html=`<table id="with" class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Checkbox</th>
                  <th scope="col">Id</th>
                 
                  <th scope="col">Name</th>
                  <th scope="col"> Language</th>
                 
                  
                </tr>
              </thead>
              <tbody  id="tablebody">
               `;
          $.each(data, function(index, value) {
            console.log(data);
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

          Html+=`</tbody>
            </table>      
            
            
            
            
            
            
            
            
            
            `;
          $("#asdsd").html(Html);


          $("#with").DataTable({
      scrollX:true
  });
         }
      });

    });
   
});
   



</script>
@endsection




