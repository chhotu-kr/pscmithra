@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>
           
            <div class="col-9">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                 Add Study 
                </button>
  
                <div class="modal fade" id="largeModal" tabindex="-1">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Insert Study</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                       <!-- Custom Styled Validation with Tooltips -->
                       <form action="{{route('study.store')}}" class="row g-3 needs-validation" method="post" novalidate>
                          
                        @csrf
                        
                        <div class=" position-relative">
                          <label for="validationTooltip04" class="form-label">Category_Id</label>
                          <select class="form-select" name="category_id" id="validationTooltip04" required>
                            <option selected disabled value="0">Select Category</option>
                            @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->category}}</option>
                            @endforeach
                          </select>
                          <div class="invalid-tooltip">
                            Please select a valid id.
                          </div>
                        </div>
                        <div class=" position-relative">
                          <label for="validationTooltip04" class="form-label">SubCategory_Id</label>
                          <select class="form-select" name="subcategory_id" id="validationTooltip04" required>
                            <option selected disabled value="0">Select SubCategory</option>
                            @foreach ($subcategory as $item)
                            <option value="{{$item->id}}">{{$item->subcategory}}</option>
                            @endforeach
                          </select>
                          <div class="invalid-tooltip">
                            Please select a valid subcategory.
                          </div>
                        </div>
                        <div class=" position-relative">
                          <label for="validationTooltip05" class="form-label">Content</label>
                          <input type="text" class="form-control" name="content" id="validationTooltip05" required>
                          <div class="invalid-tooltip">
                            Please provide a valid content.
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
              <h5 class="card-title text-theme">Manage Study</h5>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">CategoryName</th>
                    <th scope="col">SubCategoryName</th>
                    <th scope="col">Content</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                   @foreach ($study as $item)
                          <tr>
                              <td>{{$item->id}}</td>
                              <td>{{$item->category->category}}</td>
                              <td>{{$item->subcategory->subcategory}}</td>
                              <td>{{$item->content}}</td>
                              <td>

                                <form action="{{route('study.destroy',[$item])}}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value="X" class="btn btn-outline-danger">
                                <a href="{{route('study.edit',[$item])}}" class="btn btn-outline-success">Edit</a>
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
</main>
@endsection