@extends('admin/base')
@section('content')
    <main id="main" class="main">
      @include('admin.side')
        <div class="container">
            <div class="row">
                <div class="col-12">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                    Add Category
                   </button>
                </div>
                
          
                 
    
                  <div class="modal fade" id="largeModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Insert Category</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                         <!-- Custom Styled Validation with Tooltips -->
                         <form action="{{route('category.store')}}" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                            
                          @csrf
                          
                         
                          <div class=" position-relative">
                            <label for="validationTooltip05" class="form-label">Category</label>
                            <input type="text" class="form-control" name="category" id="validationTooltip05" required>
                            <div class="invalid-tooltip">
                              Please provide a valid category.
                            </div>
                          </div>
                          <div class=" position-relative">
                            <label for="validationTooltip05" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" id="validationTooltip05" required>
                            <div class="invalid-tooltip">
                              Please provide a valid image.
                            </div>
                          </div>
                          <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Create</button>
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
                  <h5 class="card-title">Manage Category</h5>
                  

                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        
                        <th scope="col">category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ($category as $item)
                              <tr>
                                  <td>{{$item->id}}</td>
                               
                                  <td><a href="{{route('insert.subcategory',['id'=>$item->id])}}">{{$item->category}}</a></td>
                                  <td>
                                    <img src="{{asset("images/".$item->image)}}" width="40" height="40" alt="">
                                </td>
                                  <td>
                                     <a href="{{route('category.Update',['id'=>$item->id])}}" class="btn btn-outline-success">Edit</a>
                                    
                                    
                                      <a href="{{route('removecategory',['id'=>$item->slugid])}}" class="btn btn-outline-danger">Delete</a>
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