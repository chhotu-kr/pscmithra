@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">

  <div class="pagetitle">
    <div class="row">
      <div class="col-9">
        <div class="card">
          <div class="card-header">Edit Screenshot</div>
          <div class="card-body">
            <form action="{{route('screenshot.update', $screenshot)}}" method="POST">
                @method('put')
              @csrf
             
             <div class="mb-3">
              <label for="">ProductName</label>
              <select name="product_id" id="" class="form-select" value="{{$screenshot->product_id}}" required>
              <option value="0">select productName</option>
              @foreach ($product as $pro)
              <option value="{{ $item->id }}"
                @if ($item->id==$screenshot->product_id)
                    selected="selected"
                @endif
              >{{ $item->title}}</option>
              @endforeach
              </select>
             </div>
            <div class="mb-3">
              <label for="">Scr_Url</label>
              <input type="text" name="scr_url" class="form-control" value="{{$screenshot->scr_url}}" required>
            </div>
            <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
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