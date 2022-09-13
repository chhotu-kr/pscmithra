@extends('admin.base')
@section('content')
    <main class="main" id="main">
        @include('admin.side')
        <div class="container">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header text-theme ps-2">Insert Course</div>
                    <div class="card-body">
                        <form action="{{route('course.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <input type="submit" value="Create" class="btn btn-primary w-100">
                           </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </main>
@endsection