@extends('admin.base')
@section('content')
    <main class="main" id="main">
        @include('admin.side')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                           Edit CourseQuiz  
                        </div>
                        <div class="card-body">
                            <form action="{{route('coursequiz.update',$cq)}}" class="row g-3 needs-validation" enctype="multipart/form-data" method="post" novalidate>
                            
                                @csrf
                                
                               
                                <div class=" position-relative">
                                  <label for="validationTooltip05" class="form-label">Name</label>
                                  <input type="text" class="form-control" name="CQname" id="validationTooltip05" value="{{$cq->CQname}}" required>
                                  <div class="invalid-tooltip">
                                    Please provide a valid quizcategory.
                                  </div>
                               
                                </div>
                                <div class="col-12">
                                  <button class="btn btn-primary w-100 mt-3" type="submit">Create</button>
                                </div>
                              </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection