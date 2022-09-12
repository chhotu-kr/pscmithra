@extends('admin/base')
@section('content')
    <main id="main" class="main">

        <div class="container mt-3">
            <div class="row">
                <div class="col-3">
                    @include('admin.side')
                </div>
                  <h6 class="text-theme ps-2 h4">Edit Extra</h6>
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">Edit Extra</div>
                            <div class="card-body">
                                <form action="{{route('update.extra',$extra)}}" class=" row g-3 needs-validation" enctype="multipart/form-data" method="post" novalidate>
              
                                    @csrf
                                 
          
                                  <div class=" position-relative">
                                  <label for="validationTooltip05" class="form-label">Name</label>
                                  <input type="text" class="form-control" name="name" id="validationTooltip05" value="{{$extra->name}}" required>
                                  <div class="invalid-tooltip">
                                    Please provide a valid name.
                                  </div>
                                  </div>
                                  <div class=" position-relative">
                                      <label for="validationTooltip05" class="form-label">Type</label>
                                      <div class=" position-relative">
                                        <label for="validationTooltip05" class="form-label">Type</label>
                                       <select name="type" class="form-control" vlaue={{$extra->type}}>
                                        <option value="0">false</option>
                                        <option value="1">true</option>
                                       </select>
                                        <div class="invalid-tooltip">
                                          Please provide a valid type.
                                        </div>
                                        </div>
                                      <div class="invalid-tooltip">
                                        Please provide a valid type.
                                      </div>
                                      </div>
          
                                 
                                  
                                  <div class="col-12">
                                  <button class="btn btn-primary mt-3 w-100" type="submit">Update</button>
                                  </div>
                                  
                                  </form>
                                  
                            </div> 
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
     
    </main>
@endsection
