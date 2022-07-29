@extends('admin/base')
@section('content')
    <main id="main" class="main">
        @include('admin.side')
        <div class="container">
          <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                  Add PageProduct
                 </button>
              </div>
              
       
                
  
                <div class="modal fade" id="largeModal" tabindex="-1">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Insert PageProduct</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('page.store')}}" class=" row g-3 needs-validation"  method="post" novalidate>
              
                          @csrf

                           <div class=" position-relative">
                        <label for="validationTooltip04" class="form-label">Product_Id</label>
                        <select class="form-select" name="products_id" id="validationTooltip04" required>
                          <option selected disabled value="">select Your product</option>
                          @foreach ($product as $item)
                          <option value="{{$item->id}}">{{$item->title}}</option>
                          @endforeach
                        </select>
                        <div class="invalid-tooltip">
                          Please select a valid id.
                        </div>
                        </div>
                       

                        {{-- <input type="hidden" value="{{$id}}" name="products_id"> --}}
                        <div class=" position-relative">
                        <label for="validationTooltip05" class="form-label">PageName</label>
                        <input type="text" class="form-control" name="pagename" id="validationTooltip05" required>
                        <div class="invalid-tooltip">
                          Please provide a valid pagename.
                        </div>
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
                <h5 class="card-title">Manage PageProduct</h5>
                
    
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">ProductName</th>
                      <th scope="col">Pagename</th>
                     
                      <th scope="col">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($page as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->pro->title}}</td>
                                <td>{{$item->pagename}}</td>
                                
                                <td>
                                   <a href="{{route('page.update',['id'=>$item->id])}}" class="btn btn-outline-success">Edit</a>
                                  
                                  
                                    <a href="{{route('page.remove',['id'=>$item->slugid])}}" class="btn btn-outline-danger">Delete</a>
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
    </main>
@endsection
