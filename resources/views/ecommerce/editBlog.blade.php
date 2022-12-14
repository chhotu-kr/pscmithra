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
                <form action="{{route('blog.update',$blog)}}" class="row g-3 needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                      
                    @csrf
                    
                    
                   <div class="row">
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="validationTooltip01" value="{{$blog->title}}"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                      <label for="" class="form-label">Categoryt</label>
                      <select   name="category_id" class=" form-select" id="validationTooltip01"  required>
                          <option >select</option>
                          @foreach ($category as $item)
                          <option value="{{ $item->id }}"
                            @if ($item->id==$blog->category_id)
                                selected="selected"
                            @endif
                          >{{ $item->category}}</option>
                          @endforeach
                          
                      </select>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    
                
                   
                  
                    <div class="col-md-12 position-relative">
                      <label for="validationTooltip01" class="form-label">Description</label>
                      <textarea class="editor" id="validationTooltip05" name="description"  class="form-control" required>{!!$blog->description!!}</textarea>
                      <div class="valid-tooltip">
                        Looks good!
                      </div>
                  </div>
                  <div class="col-md-12 position-relative">
                    <label for="validationTooltip01" class="form-label">RightBy</label>
                    <input type="text" class="form-control" name="rightby" id="validationTooltip01" value="{{$blog->rightby}}"  required>
                    <div class="valid-tooltip">
                      Looks good!
                    </div>
                </div>
                 
                    
                    <div class="col-md-12">
                      <button class="btn btn-primary w-100" type="submit">Update</button>
                    </div>
                  </form>
            </div>
           </div>
        </div>
     </div>
     
   </main>
 
@endsection
