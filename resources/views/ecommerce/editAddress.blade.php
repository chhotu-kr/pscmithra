@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">

  <div class="pagetitle">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">Edit Address</div>
          <div class="card-body">
            <form action="{{route('address.update',$address)}}" method="POST">
              @csrf
              @method("put")
             <div class="mb-3">
              <label for="">ProductName</label>
              <select name="product_id" id="" class="form-select"  required>
              <option value="">select productName</option>
              @foreach ($product as $pro)
              <option value="{{ $pro->id }}"
                @if ($pro->id==$address->product_id)
                    selected="selected"
                @endif
              >{{ $pro->title}}</option>
              @endforeach
              </select>
             </div>
             <div class="mb-3">
              <label for="">UserName</label>
              <select name="user_id" id="" class="form-select"  required>
              <option value="">select UserName</option>
              @foreach ($subuser as $pro)
              <option value="{{ $pro->id }}"
                @if ($pro->id==$address->user_id)
                    selected="selected"
                @endif
              >{{ $pro->name}}</option>
              @endforeach
              </select>
             </div>
            <div class="mb-3">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" value="{{$address->name}}" required>
            </div>
            <div class="mb-3">
              <label for="">State</label>
              <input type="text" name="state" class="form-control" value="{{$address->state}}" required>
            </div>
            <div class="mb-3">
              <label for="">City</label>
              <input type="text" name="city" class="form-control" value="{{$address->city}}" required>
            </div>
            <div class="mb-3">
              <label for="">pincode</label>
              <input type="text" name="pincode" class="form-control" value="{{$address->pincode}}" required>
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