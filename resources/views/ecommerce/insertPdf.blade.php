@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">

  <div class="pagetitle">
    <div class="row">
      <div class="col-9">
        <div class="card">
          <div class="card-header">Insert PDF</div>
          <div class="card-body">
            <form action="{{route('pdf.store')}}" method="POST">
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
              <label for="">PDF Url</label>
              <input type="text" name="pdf_url" class="form-control" required>
            </div>
            <div class="mb-3">
            <button type="submit" class="btn btn-primary">Create</button>
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