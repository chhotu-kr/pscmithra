@extends('admin.base')
@section('content')
@include('admin.side')
    <main class="main" id="main">
       <div class="container">
        <div class="row">
            <div class="col-3">
             
            </div>
            <div class="col-12">
                <div class="row">
                  <div class="col-2">
                    <a href="{{route('show.role')}}" class="btn btn-primary mb-3">Add Role</a>
                  </div>
                  <div class="col-12">
                    <section class="section">
                      <div class="row">
                        <div class="col-lg-12">
                  
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Manage Role</h5>
                              <div class = "table-responsive" style="white-space: nowrap;" > 
                  
                              <!-- Table with stripped rows -->
                              <table  id="with" style="width:100%">
                                <thead>
                                  <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Role</th>
                                  
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($role as $req)
                                        <tr>
                                            <td scope="col">{{$req->id}}</td>
                                  
                                            <td scope="col">{{$req->name}}</td>
                                            <td scope="col">
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
                      </div>
                    </section>
                  </div>
                </div>
            </div>
        </div>
       </div>
    </main>
@endsection