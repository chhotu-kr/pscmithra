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
               <div class="card-header"><span class="fw-bold text-dark">Add Admin</span></div>
               <div class="card-body">
                <form action="{{route('admin.update',$role)}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>name</label>
                        <input type="text" name="name" class="form-control" value="{{$role->name}}" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="{{$role->email}}" required>
                    </div>
                    <div class="mb-3">
                        <label>Contact</label>
                        <input type="text" name="contact" class="form-control" value="{{$role->contact}}" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" value="{{$role->contact}}" required>
                    </div>
                    <div class="mb-3">
                        <select name="role" id="" class="form-control">
                            <label for="" class="form-label">Role</label>
                            <option value="0">Select role</option>
                            @foreach ($role as $item)
                            <option value="{{ $item->id }}"
                                @if ($item->id==$role->role)
                                    selected="selected"
                                @endif
                              >{{ $item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </form>
               </div>

                </div>
            </div>
        </div>
      </div>
    </main>
@endsection