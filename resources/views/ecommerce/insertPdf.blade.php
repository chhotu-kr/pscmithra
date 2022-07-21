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
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" required>
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