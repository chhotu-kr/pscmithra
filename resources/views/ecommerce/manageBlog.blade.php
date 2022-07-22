@extends('admin.base')
@section('content')
@include('admin.side')
   <main id="main" class="main">
    <div class="container">
        <div class="row">
           
                
            
            <div class="col-lg-12">
                <div class="row">
                    {{-- <div class="col-8 mb-3">
                        <h4 class="text-theme ps-2">Manage Address</h4>
                    </div> --}}
                    <div class="col-4">
                        <a href="{{route('blog.create')}}" class="btn btn-primary mb-3">Add Blog</a>
                    </div>
                </div>
                <section class="section">
                    
                
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Manage Blog</h5>
                            
                
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                              <thead>
                                <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Category</th>
                                  <th scope="col">Description</th>
                                  <th scope="col">RightBy</th>
                                 
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($blog as $req)
                                      <tr>
                                          <td>{{$req->id}}</td>
                                          <td>{{$req->title}}</td>
                                          <td>{{$req->categ->category}}</td>
                                          <td>{{$req->description}}</td>
                                          <td>{{$req->rightby}}</td>
                                         
                                          <td>
                                             <a href="{{route('blog.update',['id'=>$req->id])}}" class="btn btn-outline-primary">Edit</a>
                                             <a href="{{route('blog.destroy',['id'=>$req->id])}}" class="btn btn-outline-danger">Delete</a>

                                               
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