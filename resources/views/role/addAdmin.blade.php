@extends('admin/base')
@section('content')
    <main class="main" id="main">
      <div class="container">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Add Role</div>
                    <div class="card-body">
                        <form action="{{route('store.role')}}" class="needs validation" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Slug</label>
                                <input type="text" name="slug" class="form-control" required>
                            </div>
                           
                            <div class="mb-3">
                                <input type="submit" value="submit" class="btn btn-primary btn-lg float-end">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </main>
@endsection