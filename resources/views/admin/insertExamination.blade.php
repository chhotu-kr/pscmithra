@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>
            <h6 class="text-theme h4 ps-2 text-danger">Add Examination</h6>
            <div class="col-12">
               <div class="card">
                   <div class="card-header text-warning text-theme ps-2 shadow h5">Insert Examination Type</div>
                   <div class="card-body">
                    <form action="{{route('examination.store')}}" method="POST">
                        @csrf
                       <livewire:category.categories/>
                       
                        <div class="row">
                          <div class="col-6">
                            <div class="mb-3">
                              <label for="">Exam_name</label>
                              <input type="text" name="exam_name" class="form-control" required>
                          </div>
                          </div>
                          <div class="col-6">
                            <div class="mb-3">
                              <label for="">Type</label>
                              <select  name="type" id="" class="form-select">
                                  <option value="">Select Type</option>
                                  <option value="live">live</option>
                                  <option value="not">not</option>
                                 
                              </select>
                              <div class="valid-tooltip">
                                  Looks good!
                              </div>
                            </div>
                          </div>
                        </div>
                       <div class="row">
                        <div class="col-6">
                           
                          <div class="mb-3">
                           <label for="">Marks</label>
                           <input type="text" name="marks" class="form-control ms-2" required>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="mb-3">
                            <label for="">TimeDuration</label>
                            <input type="number" name="time_duration" class="form-control" required>
                        </div>
                        </div>
                       </div>
                       
                        <div class="mb-3">
                            <button class="btn btn-outline-primary w-100">Create</button>
                        </div>
                    </form>
                   </div>
               </div>
            </div>
        </div>
    </div>
</main>
@endsection