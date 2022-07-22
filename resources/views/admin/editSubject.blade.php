@extends('admin.base')
@section('content')
<main id="main" class="main">
<div class="container mt-3">
    <div class="row">
        <div class="col-3">
            @include('admin.side')
        </div>
          <h6 class="text-theme ps-2 h4">Edit subject</h6>
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">Edit Subject</div>
                    <div class="card-body">
                      <form action="{{route('subject.Update',$subject)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       <div class="mb-3">
                          <label for="">SubjectName</label>
                          <input type="text" name="sub_name" class="form-control" value="{{ $subject->sub_name}}" required>
                      </div>
                      <div class="mb-3">
                          <label for="">Image</label>
                          <input type="file" name="image" class="form-control"  required>
                      </div>
                     
                      <div class="mb-3">
                       <button type="submit" class="btn btn-primary w-100">Update</button>
                     
                      </div>
                    </form>
                    </div>
                  </div>
              </div>
            </div>
</main>
@endsection