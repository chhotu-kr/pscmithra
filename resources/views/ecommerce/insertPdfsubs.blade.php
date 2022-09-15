@extends('admin.base')
@section('content')

   <main class="main" id="main">
     <div class="container">
        <div class="col-3">
            @include('admin.side')
        </div>
        <div class="col-12">
           <div class="card">
            <div class="card-header ps-2 h4">Insert PdfSubscription</div>
            <div class="card-body">
                <form action="{{route('pdfsubs.store')}}" class="row g-3 needs-validation" method="POST"  novalidate>
                      
                    @csrf
                    
                    
                   
                    <div class="col-md-12 position-relative">
                        <label for="validationTooltip01" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="validationTooltip01"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-12 position-relative">
                        <label for="validationTooltipsa" class="form-label">Type</label>
                        <select name="type" id="choosed" class="form-select"  id="validationTooltipsa" required>
                          <option >Select Type</option>
                          <option value="weekly">Weekly</option>
                          <option value="monthly">Monthly</option>
                         
                      </select>
                          <div class="valid-tooltip">
                            Looks good!
                          </div>
                      </div>
                     
                     
                <div class="col-md-12 position-relative">
                  <div class="mb-3">
                    <label for="validationTooltipss" class="form-label">Select Date</label>
                    
                    <input type="number" class="form-control" min="1" max="31" step="1" name="date" id="validationTooltipss"  required>
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
