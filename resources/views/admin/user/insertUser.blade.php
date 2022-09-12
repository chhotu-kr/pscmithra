@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">

  <div class="pagetitle">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">Insert User</div>
          <div class="card-body">
            <form action="{{route('user.store')}}" method="POST">
              @csrf
             {{-- <div class="mb-3">
              <label for="">ProductName</label>
              <select name="product_id" id="" class="form-select" required>
              <option value="0">select productName</option>
              @foreach ($product as $pro)
                  <option value="{{$pro->id}}">{{$pro->title}}</option>
              @endforeach
              </select>
             </div>
             <div class="mb-3">
              <label for="">UserName</label>
              <select name="user_id" id="" class="form-select" required>
              <option value="0">select UserName</option>
              @foreach ($subuser as $sub)
                  <option value="{{$sub->id}}">{{$sub->name}}</option>
              @endforeach
              </select>
             </div> --}}
            <div class="mb-3">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="">Contact</label>
              <input type="text" name="contact" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="">Email</label>
              <input type="text" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="">Password</label>
              <input type="text" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
              <div class="mb-3">
                <label for="">Gender</label>
                <input type="text" name="gender" class="form-control" required>
              </div>
            <div class="mb-3">
                <label for="">Amount</label>
                <input type="text" name="amount" class="form-control">
              </div>
              <div class="mb-3">
                <label for="">Type</label>
                <select name="type" id="" class="form-control" required>
                    <option value="0">bot</option>
                    <option value="1">user</option>
                </select>
              </div>
              
            <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100">Create</button>
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