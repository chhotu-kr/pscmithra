@extends('admin.base')
@section('content')
@include('admin.side')
   <main id="main" class="main">
    <div class="container">
        <div class="row">
           
                
            
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8 mb-3">
                        <h4 class="text-theme ps-2">Manage Product</h4>
                    </div>
                    <div class="col-4">
                        <a href="{{route('product.create')}}" class="btn btn-outline-primary">Add New Product</a>
                    </div>
                </div>
                <section class="section">
                    <div class="row">
                      <div class="col-lg-12">
                
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            
                
                            <!-- Table with stripped rows -->
                            <table class="table ">
                              <thead>
                                <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Description</th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Bycount</th>
                                  <th scope="col">BannerImage</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($product as $req)
                                      <tr>
                                          <td>{{$req->id}}</td>
                                          <td>{{$req->title}}</td>
                                          <td>{{$req->description}}</td>
                                          <td>{{$req->type}}</td>
                                          <td>{{$req->price}}</td>
                                          <td>{{$req->bycount}}</td>
                                          <td>{{$req->bannerimage}}</td>
                                          <td>
                                              
                                              <form action="{{route('product.destroy',[$req])}}" method="POST">
                                                @method('delete')
                                              @csrf
                                              <input type="submit" value="X" class="btn btn-outline-danger">
                                              <a href="{{route('product.edit',[$req])}}" class="btn btn-outline-primary">Edit</a>
                                              </form>
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