@extends('admin.base')
@section('content')

   <main class="main" id="main">
     <div class="container">
        <div class="col-3">
            @include('admin.side')
        </div>
        <div class="col-12">
           <div class="card">
            <div class="card-header ps-2 h4">Edit PdfSubscription</div>
            <div class="card-body">
                <form action="{{route('pdfsubs.update',$pdf_subs)}}" class="row g-3 needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                      
                    @csrf
                    
                    
                   <div class="row">
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="validationTooltip01" value="{{$pdf_subs->name}}"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-12 position-relative">
                        <label for="" class="form-label">Type</label>
                        <select name="type" id="selected" class="form-select" value="{{$pdf_subs->type}}" required>
                          <option value="0">Select Type</option>
                          <option value="weekly">Weekly</option>
                          <option value="monthly">Monthly</option>
                         
                      </select>
                          <div class="valid-tooltip">
                            Looks good!
                          </div>
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
