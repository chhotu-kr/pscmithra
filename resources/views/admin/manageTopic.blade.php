@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">

  <div class="pagetitle">
    <div class="col-9">
      <div class="row">
          <div class="col-12">
            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#basicModal">
              Add Topic
            </button>
          </div>
         
              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Subject Type</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('topictstore')}}" method="POST">
                        @csrf
                      
                    <div class="modal-body">
                      <div class="mb-3">
                          <label for="">TopicName</label>
                          <input type="text" name="topic_name" class="form-control" required>
                      </div>
                   
                      <div class="mb-3">
                        <label for="">SubjectName</label>
                        <select name="subject_id" id="" class="form-select" required>
                        <option value="0">Main Subject</option>
                        @foreach ($subject as $new)
                            <option value="{{$new->id}}">{{$new->sub_name}}</option>
                        @endforeach
                        </select>
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

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Manage Topic</h5>
            

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
  </section>

</main><!-- End #main -->

@endsection