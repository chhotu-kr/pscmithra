@extends('admin.base')
@section('content')
@include('admin.side')
   <main id="main" class="main">
    <div class="container">
        <div class="row">
           
                
            
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8 mb-3">
                        <h4 class="text-theme ps-2">Manage Address</h4>
                    </div>
                    <div class="col-4">
                        <a href="{{route('membership.create')}}" class="btn btn-outline-primary">Add New Membership</a>
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
                                  <th scope="col">Price</th>
                                  <th scope="col">Validity</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">No of Test</th>
                                  <th scope="col">Details</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($membership as $req)
                                      <tr>
                                          <td>{{$req->id}}</td>
                                          <td>{{$req->price}}</td>
                                          <td>{{$req->validity}}</td>
                                          <td>{{$req->name}}</td>
                                          <td>{{$req->nooftest}}</td>
                                          <td>{{$req->details}}</td>
                                          <td>
                                              
                                              <form action="{{route('membership.destroy',[$req])}}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <input type="submit" value="X" class="btn btn-outline-danger">
                                                <a href="{{route('membership.edit',[$req])}}" class="btn btn-outline-primary">Edit</a>
                                                </form>

                                               
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