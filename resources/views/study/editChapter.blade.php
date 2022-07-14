@extends('admin.base')
@section('content')
<main id="main" class="main">
<div class="container mt-3">
    <div class="row">
        <div class="col-3">
            @include('admin.side')
        </div>
          <h6 class="text-theme ps-2 h4">Edit StudyMetrialCategory</h6>
                <div class="col-9">
                  <div class="card">
                    <div class="card-header">Edit StudyMetrialCategory</div>
                    <div class="card-body">
                      <form action="{{route('studychapter.Update',$studymetrialchapter)}}" method="POST">
                        @csrf
                       <div class="mb-3">
                          <label for="">Name</label>
                          <input type="text" name="name" class="form-control" value="{{ $studymetrialchapter->name}}" required>
                      </div>
                      <div class="mb-3">
                        <label for="">StudyMetrialCategoryName</label>
                        <select name="studymetrialcategory_id" id="" class="form-select" required>
                        <option value="0">Main Subject</option>
                        @foreach ($studymetrialcategory as $new)
                            <option value="{{$new->id}}">{{$new->name}}</option>
                        @endforeach
                        </select>
                      </div>
                     
                      <div class="mb-3">
                       <button type="submit" class="btn btn-primary w-100">submit</button>
                     
                      </div>
                    </form>
                    </div>
                  </div>
              </div>
            </div>
</main>
@endsection