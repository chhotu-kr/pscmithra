@extends('admin/base')
@section('content')
<main id="main" class="main">
    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
            @include('admin.side')
            </div>
            <h2 class="text-theme ps-2 mt-2 h4">Edit Image</h2>
            <div class="col-12">
             <div class="card">
               <div class="card-header"><h6 class="text-theme h5 ps-2">Edit Image</h6></div>
               <div class="card-body">
                <form action="{{ route('image.update',$img)}}" enctype="multipart/form-data" method="POST">
                  @csrf
                      
                  
                      <div class="position-relative">
                        <label for="validationTooltip04" class="ps-2">Name</label>
                        <input type="text" name="name" class="form-control" id="validationTooltip04" value="{{ $img->name}}" required>
                    </div>
                    <div class="position-relative">
                        <label for="validationTooltip04" class="ps-2">Image</label>
                        <input type="file" name="image" class="form-control" id="validationTooltip04" value="{{ $img->image}}" required>
                    </div>
                    <div class="position-relative">
                        <label for="validationTooltip04" class="ps-2">AltName</label>
                        <input type="text" name="altname" class="form-control mb-3" id="validationTooltip04" value="{{ $img->altname}}" required>
                    </div>
                    
                    @livewire('imageview', ['image' => ['image' => $img->image,'w'=>'100','h'=>'100']], key($item->id))
                   <div class="mb-3">
                     <button type="submit" class="btn btn-primary mt-3 w-100">Update</button>
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