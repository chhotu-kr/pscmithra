@extends('admin.base')
@section('content')
    <main class="main" id="main">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    @include('admin.side')
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Edit Study</div>
                        <div class="card-body">
                            <form action="{{route('study.update',$study)}}" class="row g-3 needs-validation" method="post" novalidate>
                          
                                @csrf
                                @method('put')
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
                                  <input type="text" class="form-control" name="content" id="validationTooltip05" value="{{$study->content}}" required>
                                  <div class="invalid-tooltip">
                                    Please provide a valid content.
                                  </div>
                                </div>
                                <div class="col-12">
                                  <button class="btn btn-primary w-100" type="submit">Create</button>
                                </div>
                              </form><!-
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </main>
@endsection