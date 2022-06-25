@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">

  <div class="pagetitle">
    <div class="col-9">
      <div class="row">
          <div class="col-8">
              <h6 class="border-5 border-start border-danger ps-1 fw-bold">ManageTopic</h6>
          </div>
          <div class="col-4">
            <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#basicModal">
                Add screenshot
              </button>
              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Insert Screenshot</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('screenshot.store')}}" method="POST">
                        @csrf
                      
                    <div class="modal-body">
                      
                   
                      <div class="mb-3">
                        <label for="">Screenshot</label>
                        <select name="product_id" id="" class="form-select" required>
                        <option value="0">select Product_id</option>
                        @foreach ($product as $new)
                            <option value="{{$new->id}}">{{$new->title}}</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="">scr_Url</label>
                        <input type="text" name="scr_url" class="form-control" required>
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
      
  </div><!-- End Page Title -->

  {{-- <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Datatables</h5>
            <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">TopicName</th>
                  <th scope="col">SubjectName</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($topic as $req)
                      <tr>
                          <td>{{$req->id}}</td>
                          <td>{{$req->topic_name}}</td>
                          <td>{{$req->subject->sub_name}}</td>
                          <td>
                              <a href="{{route('topicedit',['id'=>$req->id])}}" class="btn btn-outline-primary" disabled>Edit</a>
                              <a href="{{route('topicdelete',['id'=>$req->id])}}" class="btn btn-outline-danger">Delete</a>
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
  </section> --}}

</main><!-- End #main -->

@endsection