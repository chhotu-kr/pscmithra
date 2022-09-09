@extends('admin/base')
@section('content')
@include('admin.side')
<main id="main" class="main">
  
  <div class="pagetitle">
    <div class="col-9">
      <div class="row">
          <div class="col-12">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
              Add StudyMetrialCategory
            </button>
          </div>
        
  
                <div class="modal fade" id="basicModal" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Add StudyMetrialCategory Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="{{route('studymetrial.store')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                        
                      <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                       
                        <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                      </div>
                      
                  </form>
                    </div>
                  </div>
                </div><!-- End Basic Modal-->
          </div>
      </div>
      
  </div> 
      

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Manage StudyMetrialCategory</h5>
            

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($studymetrialcategory as $new)
                      <tr>
                          <td>{{$new->id}}</td>
                          <td>{{$new->name}}</td>
                          {{-- <a href="{{route('manage.topic',['id'=>$new->id])}}"></a> --}}
                          <td>{{$new->image}}</td>
                          <td>
                              <a href="{{route('studymetrial.Update',['id'=>$new->id])}}" class="btn btn-outline-success">Edit</a>
                              <a href="{{route('studymetrial.delete',['id'=>$new->id])}}" class="btn btn-outline-danger">Delete</a>
                          </td>
                      </tr>
                  @endforeach
                
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

    
@endsection