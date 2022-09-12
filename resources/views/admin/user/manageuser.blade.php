@extends('admin.base')
@section('content')
@include('admin.side')
   <main id="main" class="main">
    <div class="container">
        <div class="row">
           
                
            
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8 mb-3">
                        <h4 class="text-theme ps-2">Manage User</h4>
                    </div>
                    <div class="col-4">
                        <a href="{{route('insert.create')}}" class="btn btn-outline-primary">Add User</a>
                    </div>
                </div>
                <section class="section">
                    
                
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            
                
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                              <thead>
                                <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Contact</th>
                                  <th scope="col">image</th>
                                  <th scope="col">Gender</th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($subuser as $req)
                                      <tr>
                                          <td>{{$req->id}}</td>
                                          <td>{{$req->name}}</td>
                                          <td>{{$req->contact}}</td>
                                          <td>{{$req->image}}</td>
                                          <td>{{$req->gender}}</td>
                                          <td>{{$req->type}}</td>
                                          {{-- <td>{{$req->pincode}}</td> --}}
                                          <td>
                                              
                                            <a href="{{route('user.update')}}" class="btn btn-outline-primary">Edit</a>
                                            <a href="{{route('remove.user',['id'=>$req->slugid])}}" class="btn btn-outline-danger">Delete</a>
                                              
                                          </td>
                                      </tr>
                                  @endforeach
                                
                              </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                
                          </div>
                        </div>
                
                </section>  
      
            </div>
        </div>
       </div>
   </main>
   

@endsection