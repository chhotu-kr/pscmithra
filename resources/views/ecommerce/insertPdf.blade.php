@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">

  <div class="pagetitle">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">Insert PDF</div>
          <div class="card-body">
            <form action="{{route('pdf.store')}}"  enctype="multipart/form-data"  method="POST">
              @csrf
             <div class="mb-3">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" required>
             </div>
             <div class="col mt-3">
                  <label>Select Pdf</label>
                  <input type="file" accept="application/pdf" name="url" class="form-control" required>
                </div>
                <div class="col-md-12">
                  <button class="btn btn-primary w-100 mt-3" type="submit">Create</button>
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