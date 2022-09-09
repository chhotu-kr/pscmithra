@extends('admin/base')
@section('content')
    <main id="main" class="main">
        @include('admin.side')
        <div class="container">
          <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                  Add Subcategory
                 </button>
              </div>
              
       
                
  
                <div class="modal fade" id="largeModal" tabindex="-1">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Insert SubCategory</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('subcategory.store')}}" class=" row g-3 needs-validation" enctype="multipart/form-data" method="post" novalidate>
              
                          @csrf
                        {{-- <div class=" position-relative">
                        <label for="validationTooltip04" class="form-label">Category_Id</label>
                        <select class="form-select" name="category_id" id="validationTooltip04" required>
                          <option selected disabled value="">Choose Your Category</option>
                          @foreach ($category as $item)
                          <option value="{{$item->id}}">{{$item->category}}</option>
                          @endforeach
                        </select>
                        <div class="invalid-tooltip">
                          Please select a valid id.
                        </div>
                        </div> --}}

                        <input type="hidden" value="{{$id}}" name="category_id">
                        <div class=" position-relative">
                        <label for="validationTooltip05" class="form-label">SubCategory</label>
                        <input type="text" class="form-control" name="subcategory" id="validationTooltip05" required>
                        <div class="invalid-tooltip">
                          Please provide a valid subcategory.
                        </div>
                        </div>
                        <div class=" position-relative">
                        <label for="validationTooltip05" class="form-label">image</label>
                        <input type="file" class="form-control" name="image" id="validationTooltip05" required>
                        <div class="invalid-tooltip">
                          Please provide a valid image.
                        </div>
                        </div>

                        {{-- <input type="file" name="image[]" multiple class="form-control" accept="image/*"> --}}
                        
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
                <h5 class="card-title">Manage Subcategory</h5>
                
    
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Category</th>
                      <th scope="col">Subcategory</th>
                      <th scope="col">Image</th>
                      <th scope="col">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($subcategory as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->category->category}}</td>
                                <td>{{$item->subcategory}}</td>
                                <td>
                                  <img src="{{asset("upload/".$item->image)}}" width="100" height="100" alt="">
                              </td>
                                <td>
                                   <a href="{{route('subcategory.Update',['id'=>$item->id])}}" class="btn btn-outline-success">Edit</a>
                                  
                                  
                                    <a href="{{route('removesubcategory',['id'=>$item->slugid])}}" class="btn btn-outline-danger">Delete</a>
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
