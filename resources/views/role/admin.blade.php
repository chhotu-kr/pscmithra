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
                <div class="card-header">Add Admin</div>
                <div class="card-body">
                    <form action="{{route('store.admin')}}" method="POST" class="needs validation">
                        @csrf
                      
                        <div class="mb-3">
                            <label>name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Contact</label>
                            <input type="text" name="contact" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <select name="role" id="" class="form-control" required>
                                <label for="" class="form-label">Role</label>
                                <option value="0">Select role</option>
                                @foreach ($role as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="submit" class="btn btn-primary w-100">
                        </div>
                    </form>
                </div>
               </div>
            </div>
        </div>
      </div>
    </main>
@endsection