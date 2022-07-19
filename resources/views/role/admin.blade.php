@extends('admin/base')
@section('content')
    <main class="main" id="main">
      <div class="container">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>
            <div class="col-12">
              <section class="section">
                <div class="row">
                  <div class="col-lg-12">
                   <a href="{{route('add.admin')}}" class="btn btn-outline-primary mb-2">Add Admin</a>
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Manage Role</h5>
                        
            
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                          <thead>
                            <tr>
                              <th scope="col">id</th>
                              <th scope="col">Role</th>
                             
                              <th scope="col">Email</th>
                              <th scope="col">Contact</th>
                              
                            
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($admin as $req)
                                  <tr>
                                      <td>{{$req->id}}</td>
                            
                                      <td>{{$req->name}}</td>
                                      {{-- <td>{{$req->Name}}</td> --}}
                                      <td>{{$req->email}}</td>
                                      <td>{{$req->contact}}</td>
                                      
                                      
                                      <td>
                                          <a href="" class="btn btn-outline-primary" disabled>Edit</a>
                                          <a href="" class="btn btn-outline-danger">Delete</a>
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
            </div>
        </div>
      </div>
    </main>
@endsection