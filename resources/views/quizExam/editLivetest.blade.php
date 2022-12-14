@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>
            <h6 class="text-theme h4 ps-2 text-danger">Add LiveTest</h6>
            <div class="col-12">
               <div class="card">
                   <div class="card-header text-warning text-theme ps-2 shadow h5">Insert LiveTest Type</div>
                   <div class="card-body">
                    <form action="{{route('livetest.update',$live)}}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="">StartAt</label>
                            <input type="text" name="startat" class="form-control" value="{{$live->startat}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Exam_name</label>
                            <input type="text" name="exam_name" class="form-control" value="{{$live->exam_name}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">RightMarks</label>
                            <input type="text" name="rightmarks" class="form-control" value="{{$live->rightmarks}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">WrongMarks</label>
                            <input type="text" name="wrongmarks" class="form-control" value="{{$live->wrongmarks}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">TimeDuration</label>
                            <input type="text" name="time_duration" class="form-control" value="{{$live->time_duration}}" required>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-outline-primary w-100">Update</button>
                        </div>
                    </form>
                   </div>
               </div>
            </div>
        </div>
    </div>
</main>
@endsection