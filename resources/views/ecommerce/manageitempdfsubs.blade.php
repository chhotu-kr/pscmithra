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
                        <a href="{{route('item.pdfsubs',$id)}}" class="btn btn-primary mb-3">Add ItemPdfsubscription</a>
                    </div>
                </div>
                <section class="section">
                    
                
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Manage ItemPdfsubscription</h5>
                            
                
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                              <thead>
                                <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">PdfSubscription</th>
                                  <th scope="col">url</th>
                                 
                                 
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($itempdfsubs as $re)
                                      <tr>
                                          <td>{{$re->id}}</td>
                                          <td>{{$re->name}}</td>
                                          <td>{{$re->pdf_subs->name}}</td>
                                          <td>{{$re->url}}</td>
                                     
                                         
                                          <td>
                                             <a href="{{route('itempdf.update',['id'=>$re->id])}}" class="btn btn-outline-primary">Edit</a> 
                                             <a href="{{route('itempdfsubs.destroy',['id'=>$re->slugid])}}" class="btn btn-outline-danger">Delete</a>

                                               
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