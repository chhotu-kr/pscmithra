@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">

  <div class="pagetitle">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">Edit PDF</div>
          <div class="card-body">
            <form action="{{route('pdf.update',$pdf)}}" method="POST">
                @method('put')
              @csrf
             
             <div class="mb-3">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" value="{{$pdf->name}}"  required>
             </div>
            <div class="mb-3">
              <label for="">PDF Url</label>
              <input type="text" name="pdf_url" class="form-control" value="{{$pdf->pdf_url}}" required>
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