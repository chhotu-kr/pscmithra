@extends('admin.base')
@section('content')

<main id="main" class="main">
<div class="container mt-3">
    <div class="row">
        <div class="col-3">
        @include('admin.side')
        </div>
        <h2 class="text-theme ps-2 mt-2 h4">Edit BlogCategory</h2>
        <div class="col-12">
         <div class="card">
           <div class="card-header"><h6 class="text-theme h5 ps-2">Edit BlogCategory</h6></div>
           <div class="card-body">
            <form action="{{ route('blogcategory.update',$blogcat)}}" method="POST">
              @csrf
                 <div class="mb-3">
                   <label for="">BookName</label>
                   <input type="text" name="name" class="form-control" value="{{ $blogcat->name}}" required>
               </div>
              
               <div class="mb-3">
                 <button type="submit" class="btn btn-outline-primary float-end">Update</button>
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

