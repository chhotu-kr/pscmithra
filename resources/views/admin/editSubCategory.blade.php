@extends('admin.base')
@section('content')
<main id="main" class="main">
<div class="container mt-3">
    <div class="row">
        <div class="col-3">
            @include('admin.side')
        </div>
          <h6 class="text-theme ps-2 h4">Edit subject</h6>
                <div class="col-9">
                  <div class="card">
                    <div class="card-header">Edit Subject</div>
                    <div class="card-body">
                        <form action="{{route('subcategory.update',$subcategory)}}" class=" row g-3 needs-validation" method="post" novalidate>
              
                            @csrf
                          <div class=" position-relative">
                          <label for="validationTooltip04" class="form-label">Category_Id</label>
                          <select class="form-select" name="category_id" id="validationTooltip04" required>
                            <option selected disabled value="">Choose Your Category</option>
                            @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->id}}</option>
                            @endforeach
                          </select>
                          <div class="invalid-tooltip">
                            Please select a valid id.
                          </div>
                          </div>
                          <div class=" position-relative">
                          <label for="validationTooltip05" class="form-label">SubCategory</label>
                          <input type="text" class="form-control" name="subcategory" id="validationTooltip05" value="{{$subCategory->subcategory}}" required>
                          <div class="invalid-tooltip">
                            Please provide a valid category.
                          </div>
                          </div>
                          
                          <div class="col-12">
                          <button class="btn btn-primary mt-3 w-100" type="submit">Create</button>
                          </div>
                          
                        </form>
                          
                    </div> 
                  </div>
              </div>
            </div>
        </div>
    </div>
</main>
@endsection