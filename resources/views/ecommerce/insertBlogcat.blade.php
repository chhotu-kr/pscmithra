@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">
  <div class="col-9">
  <div class="pagetitle">
    
      <div class="row">
          <div class="col-12">
            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#basicModal">
              Add BlogCategory
            </button>
          </div>
          
              
                <div class="modal fade" id="basicModal" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Add Book Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="{{route('blogcategory.store')}}" method="POST">
                          @csrf
                        
                      <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="h6">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                       
                        <div class="mb-3">
                      <button type="submit" class="btn btn-outline-primary">Create</button>
                        </div>
                      </div>
                      
                  </form>
                    </div>
                  </div>
                </div><!-- End Basic Modal-->
          </div>
      </div>
   
      
     
  </div>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Manage BlogCategory</h5>
            

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col"> Name</th>
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                 @foreach ($blogcat as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                           
                            <td>
                               <a href="{{route('blogcategory.update',['id'=>$item->id])}}" class="btn btn-outline-success">Edit</a>
                              
                              
                                <a href="{{route('blogcategory.remove',['id'=>$item->slugid])}}" class="btn btn-outline-danger">Delete</a>
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



