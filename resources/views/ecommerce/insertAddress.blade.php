@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">

  <div class="pagetitle">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">Insert Address</div>
          <div class="card-body">
            <form action="{{route('address.store')}}" method="POST">
              @csrf
             <div class="mb-3">
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
             </div>
            <div class="mb-3">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="">State</label>
              <input type="text" name="state" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="">City</label>
              <input type="text" name="city" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="">pincode</label>
              <input type="text" name="pincode" class="form-control" required>
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