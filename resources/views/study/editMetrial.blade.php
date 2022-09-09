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
                      <form action="{{route('studymetrial.Update',$studymetrialcategory)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       <div class="mb-3">
                          <label for="">Name</label>
                          <input type="text" name="name" class="form-control" value="{{ $studymetrialcategory->name}}" required>
                      </div>
                      <div class="mb-3">
                          <label for="">Image</label>
                          <input type="file" name="image" class="form-control mb-3"  required>
                      </div>
                      @livewire('imageview', ['image' => ['image' => $studymetrialcategory->image,'w'=>'100','h'=>'100']], key($new->id))
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