@extends('admin.base')
@section('content')

   <main class="main" id="main">
     <div class="container">
        <div class="col-3">
            @include('admin.side')
        </div>
        <div class="col-12">
           <div class="card">
            <div class="card-header ps-2 h4">Insert Product</div>
            <div class="card-body">
                <form action="{{route('product.store')}}" class="row g-3 needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                      
                    @csrf
                    
                    
                   <div class="row">
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="validationTooltip01"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                      <label for="" class="form-label">Subject</label>
                      <select   name="subject_id" class=" form-select" id="validationTooltip01"  required>
                          <option >select</option>
                          @foreach ($subject as $item)
                              <option value="{{$item->id}}">{{$item->sub_name}}</option>
                          @endforeach
                          
                      </select>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-12 position-relative">
                      <label for="" class="form-label">Type</label>
                      <select name="type" id="validationTooltip01" class="form-select" required>
                        <option value="0">Select Type</option>
                        <option value="book">Book</option>
                        <option value="course">Course</option>
                        <option value="pdf">Pdf</option>
                    </select>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                   </div>
                   <div class="row">
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" id="validationTooltip01"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Bycount</label>
                        <input type="text" class="form-control" name="bycount" id="validationTooltip01"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                   </div>
                  
                    <div class="col-md-12 position-relative">
                      <label for="validationTooltip01" class="form-label">Description</label>
                     <textarea name="description" id="validationTooltip01" cols="30" rows="5" class="form-control"></textarea>
                      <div class="valid-tooltip">
                        Looks good!
                      </div>
                  </div>
                  <div class="col-md-12 position-relative">
                    <label for="validationTooltip01" class="form-label">Image</label>
                    <input type="file" class="form-control" name="bannerimage" id="validationTooltip01"  required>
                    <div class="valid-tooltip">
                      Looks good!
                    </div>
                </div>
                 
                    
                    <div class="col-md-12">
                      <button class="btn btn-primary w-100" type="submit">Create</button>
                    </div>
                  </form>
            </div>
           </div>
        </div>
     </div>
     
   </main>
@endsection
