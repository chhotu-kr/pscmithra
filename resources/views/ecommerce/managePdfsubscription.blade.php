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
                        <a href="{{route('pdfsubs.create')}}" class="btn btn-primary mb-3">Add pdfSubscription</a>
                    </div>
                </div>
                <section class="section">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Manage PFS</h5>
                            
                
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                              <thead>
                                <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Day of Month</th> 
                                  
                                 
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($pdf_subs as $req)
                                      <tr>
                                          <td>{{$req->id}}</td>
                                          <td>{{$req->name}}</td>
                                          
                                          <td>{{$req->Date}}</td>
                                          <td>
                                             <a href="{{route('pdfsubs.update',['id'=>$req->id])}}" class="btn btn-outline-primary">Edit</a>
                                             <a href="{{route('pdfsubs.destroy',['id'=>$req->slugid])}}" class="btn btn-outline-danger">Delete</a>
                                             <a href="{{route('manage.item',$req->id)}}" class="btn btn-outline-secondary">Manage PdSubProduct</a>

                                               
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