@extends('admin.base')
@section('content')

<main id="main" class="main">
<div class="container mt-3">
    <div class="row">
        <div class="col-3">
        @include('admin.side')
        </div>
        <h2 class="text-theme ps-2 mt-2 h4">Edit Exam</h2>
        <div class="col-7">
         <div class="card">
           <div class="card-header"><h6 class="text-theme h5 ps-2">Edit Exam</h6></div>
           <div class="card-body">
            <form action="{{ route('exam.Update',$exam)}}" method="POST">
              @csrf
                 <div class="mb-3">
                   <label for="">ExamName</label>
                   <input type="text" name="examname" class="form-control" value="{{ $exam->examname}}" required>
               </div>
              
               <div class="mb-3">
                 <button type="submit" class="btn btn-primary w-100">submit</button>
               </div>
             </form>  
           </div>
         </div>
            
          </div>
        </div>
        
    </div>
</div>
</main>
@endsection

