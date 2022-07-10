@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">
  <div class="col-9">
  <div class="pagetitle">
    
      <div class="row">
          <div class="col-8">
              <h6 class="border-5 border-start border-danger ps-1 mt-2   h4 text-theme text-warning">ManageExamQuestion</h6>
          </div>
          <div class="col-4">
              <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#basicModal">
                  Add ExamQuestion
                </button>
                <div class="modal fade" id="basicModal" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Add ExamQuestion Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="{{route('examquestion.store')}}" method="POST">
                          @csrf
                        
                      <div class="modal-body">
                        <div class="mb-3">
                            <label for="validationTooltip04" class="form-label">ExamName</label>
                            <select class="form-select" name="exam_id" id="validationTooltip04" required>
                              <option selected disabled value="0">Choose your exam</option>
                              @foreach ($exam as $item)
                                  <option value="{{$item->id}}">{{$item->examname}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="validationTooltip04" class="form-label">Question</label>
                            <select class="form-select" name="question_id" id="validationTooltip04" required>
                              <option selected disabled value="0">Choose your exam</option>
                              @foreach ($secondquestion as $item)
                                  <option value="{{$item->id}}">{{$item->question}}</option>
                              @endforeach
                            </select>
                        </div>
                       
                        <div class="mb-3">
                            <label for="" class="h6">SerialNo</label>
                            <input type="text" name="serialno" class="form-control" required>
                        </div>
                       
                        <div class="mb-3">
                      <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                      </div>
                      
                  </form>
                    </div>
                  </div>
                </div><!-- End Basic Modal-->
          </div>
      </div>
   
      
     
  </div>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Datatables</h5>
            

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">ExamName</th>
                  <th scope="col">Question</th>
                  <th scope="col">SerialNo</th>
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                 @foreach ($examquestion as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->exam->examname}}</td>
                            <td>{{$item->secondquestion->question}}</td>
                            <td>{{$item->serialno}}</td>
                           
                            <td>

                              <form action="{{route('examquestion.destroy',[$item])}}" method="POST">
                                @method('delete')
                                @csrf
                                
                              <input type="submit" value="X" class="btn btn-outline-primary">
                              <a href="{{route('examquestion.edit',[$item])}}" class="btn btn-outline-success">Edit</a>
                              </form>
                               
                              
                              
                                
                            </td>
                        </tr>
                    @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection




