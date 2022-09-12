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
      
         
        <form action="{{route('store.livequestion')}}" method="POST">
        
          @csrf
          @livewire('admin.liveexam.selecques',['id'=>$id])
        
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
@endsection




