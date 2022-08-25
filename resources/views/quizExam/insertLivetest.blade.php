@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>
            <h6 class="text-theme h4 ps-2 text-danger">Add Livetest</h6>
            <div class="col-12">
               <div class="card">
                   <div class="card-header text-warning text-theme ps-2 shadow h5">Insert Livetest </div>
                   <div class="card-body">
                    <form action="{{route('livetest.store')}}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="form-label">User Name</label>
                            <select name="user_id" class="form-select">
                                <option value="">select your user</option>
                                @foreach ($user as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                       
                        <div class="mb-3">
                            <label for="form-label">Examination Name</label>
                            <select name="examination_id" class="form-control">
                                <option value="0">select your examination</option>
                                @foreach ($examination as $item)
                                    <option value="{{$item->id}}">{{$item->exam_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="form-select">Language Name</label>
                            <select name="language_id" class="form-control">
                                <option value="0">select your language</option>
                                @foreach ($language as $lang)
                                    <option value="{{$lang->id}}">{{$lang->languagename}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="form-select">Type</label>
                            <select name="type" class="form-control">
                                <option value="0">select your type</option>
                                <option value="1">resume</option>
                                <option value="2">result</option>
                               
                            </select>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="">Exam_name</label>
                            <input type="text" name="exam_name" class="form-control" required>
                        </div> --}}
                        <div class="mb-3">
                            <label for="">StartAt</label>
                            <input type="text" name="startat" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Exam_name</label>
                            <input type="text" name="exam_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">RightMarks</label>
                            <input type="text" name="rightmarks" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">WrongMarks</label>
                            <input type="text" name="wrongmarks" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">TimeDuration</label>
                            <input type="text" name="time_duration" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">RemainTime</label>
                            <input type="text" name="remain_time" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">TotalMarks</label>
                            <input type="text" name="totalmarks" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-outline-primary w-100">Create</button>
                        </div>
                    </form>
                   </div>
               </div>
            </div>
        </div>
    </div>
</main>
@endsection