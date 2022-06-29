@extends('admin/base')
@section('content')
@include('admin.side')
<main id="main" class="main">
  
  <div class="pagetitle">
    <div class="col-9">
      <div class="row">
          <div class="col-8">
              <h5 class="text-theme mt-3 h3">Manage Subject</h5>
          </div>
          <div class="col-4">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                  Add Subject
                </button>
                <div class="modal fade" id="basicModal" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Add Subject Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="{{route('subjectstore')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                        
                      <div class="modal-body">
                        <div class="mb-3">
                            <label for="">SubjectName</label>
                            <input type="text" name="sub_name" class="form-control" required>
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
            <h5 class="card-title">Datatables</h5>
            

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">SubjectName</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($subject as $new)
                      <tr>
                          <td>{{$new->id}}</td>
                          <td>{{$new->sub_name}}</td>
                          <td>{{$new->image}}</td>
                          <td>
                              <a href="{{route('subject.Update',['id'=>$new->id])}}" class="btn btn-outline-success">Edit</a>
                              <a href="{{route('subjectdelete',['id'=>$new->slugid])}}" class="btn btn-outline-danger">Delete</a>
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