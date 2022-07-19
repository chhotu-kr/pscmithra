@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">

  <div class="pagetitle">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">Edit Module</div>
          <div class="card-body">
            <form action="{{route('update.module',$module)}}" method="POST">
              @csrf
             
             <div class="mb-3">
              <label for="">CourseName</label>
              <select name="course_id" id="" class="form-select"  required>
              <option value="">select CourseName</option>
              @foreach ($course as $pro)
                  <option value="{{$pro->id}}">{{$pro->name}}</option>
              @endforeach
              </select>
             </div>
             <div class="mb-3">
              <label>Type</label>
                  <select name="type" id="" class="form-select">
                     <option value="0">Select Type</option>
                      <option value="voice">voice</option>
                      <option value="text">text</option>
                       <option value="test">test</option>
                 </select>
             </div>
            <div class="mb-3">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" value="{{$module->name}}" required>
            </div>
            {{-- <div class="mb-3">
                <label>Description</label>
                <textarea name="text" id="" cols="30" rows="5" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
              <label for="">Url</label>
              <input type="text" name="url" class="form-control" value="{{$module->url}}" required>
            </div>
            <div class="mb-3">
              <label for="">QuizId</label>
              <input type="text" name="quiz_id" class="form-control" value="{{$module->quiz_id}}" required>
            </div> --}}
            <div class="mb-3">
              <label>Is_Free</label>
            <select name="isfree" id="" class="form-select">
                <option value="0">IsFree</option>
                <option value="true">true</option>
                <option value="false">false</option>
                              
            </select>
            </div>
            <div class="mb-3">
              <label for="">Index</label>
              <input type="text" name="index" class="form-control" value="{{$module->index}}" required>
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