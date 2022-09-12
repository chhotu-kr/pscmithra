@extends('admin/base')
@section('content')
    <main id="main" class="main">
        @include('admin.side')
        <div class="container">
          <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                  Add Extra
                 </button>
              </div>
              
       
                
  
                <div class="modal fade" id="largeModal" tabindex="-1">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Insert Extra</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('extra.store')}}" class=" row g-3 needs-validation" enctype="multipart/form-data" method="post" novalidate>
              
                          @csrf
                       

                        <div class=" position-relative">
                        <label for="validationTooltip05" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="validationTooltip05" required>
                        <div class="invalid-tooltip">
                          Please provide a valid name.
                        </div>
                        </div>
                        <div class=" position-relative">
                            <label for="validationTooltip05" class="form-label">Type</label>
                           <select name="type" class="form-control" >
                            <option value="0">false</option>
                            <option value="1">true</option>
                           </select>
                            <div class="invalid-tooltip">
                              Please provide a valid type.
                            </div>
                            </div>

                       
                        
                        <div class="col-12">
                        <button class="btn btn-primary mt-3 w-100" type="submit">Create</button>
                        </div>
                        
                        </form><!-- End Custom Styled Validation with Tooltips -->
                        
    
                      </div>
                     
                    </div>
                  </div>
                </div><!-- End Large Modal-->
              </div>
          </div>
      </div>
      <section class="section">
        <div class="row">
          <div class="col-lg-12 py-3">
    
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Manage Extra</h5>
                
    
                
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Name</th>
                      <th scope="col">Type</th>
                    
                      <th scope="col">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($extra as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->type}}</td>
                               
                                <td>
                                   <a href="{{route('update.extra',['id'=>$item->id])}}" class="btn btn-outline-success">Edit</a>
                                  
                                  
                                    <a href="{{route('remove.extra',['id'=>$item->slugid])}}" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
            
    
              </div>
            </div>
    
          </div>
        </div>
      </section>
    </main>
@endsection
