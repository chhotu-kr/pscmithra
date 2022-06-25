@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">

  <div class="pagetitle">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">Edit Course</div>
          <div class="card-body">
            <form action="{{route('course.update',$course)}}" method="POST">
              @csrf
              @method("put")
             <div class="mb-3">
              <label for="">ProductName</label>
              <select name="product_id" id="" class="form-select"  required>
              <option value="">select productName</option>
              @foreach ($product as $pro)
                  <option value="{{$pro->id}}">{{$pro->title}}</option>
              @endforeach
              </select>
             </div>
            <div class="mb-3">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" value="{{$course->name}}" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" id="" cols="30" rows="5" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
              <label for="">Url</label>
              <input type="text" name="course_url" class="form-control" value="{{$course->course_url}}" required>
            </div>
            <div class="mb-3">
              <label for="">Free Course</label>
              <input type="text" name="free_course" class="form-control" value="{{$course->free_course}}" required>
            </div>
            <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100">Update</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>

  </div>
      
  </div><!-- End Page Title -->


</main><!-- End #main -->

@endsection