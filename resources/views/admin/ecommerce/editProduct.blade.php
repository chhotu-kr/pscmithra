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
                <form action="{{ route('product.update',$product) }}" class="row g-3 needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                      
                    @csrf
                   @method("put")
                    
                   <div class="row">
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="validationTooltip01" value="{{$product->title}}"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">PDF</label>
                        <input type="file" class="form-control" name="pdf" id="validationTooltip01" value="{{$product->pdf}}"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                   </div>
                   <div class="row">
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" id="validationTooltip01" value="{{$product->price}}"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Bycount</label>
                        <input type="text" class="form-control" name="bycount" id="validationTooltip01" value="{{$product->bycount}}"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                   </div>
                  
                    <div class="col-md-12 position-relative">
                      <label for="validationTooltip01" class="form-label">Description</label>
                     <textarea name="description" id="validationTooltip01" cols="30" rows="5" class="form-control" value="{{$product->description}}"></textarea>
                      <div class="valid-tooltip">
                        Looks good!
                      </div>
                  </div>
                  <div class="col-md-12 position-relative">
                    <label for="validationTooltip01" class="form-label">Image</label>
                    <input type="file" class="form-control" name="bannerimage" id="validationTooltip01" value="{{$product->bannerimage}}"  required>
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
