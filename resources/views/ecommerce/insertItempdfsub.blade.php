@extends('admin.base')
@section('content')
@include('admin.side')
<main class="main" id="main">



  <div class="container">
    <div class="col-12">
      <div class="card">
        <div class="card-header ps-2 h4">Insert Product</div>
        <div class="card-body">


        
          <form action="{{route('itempdf.store')}}" class="row g-3 needs-validation" method="POST" enctype="multipart/form-data" novalidate>
          @csrf
            <input name="id" type="text" value="{{$id}}" hidden >
        


              <div>
                <div class="col position-relative">
                  <label for="validationTooltip01" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="validationTooltip01" required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
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

</main>



@endsection