@extends('admin.base')
@section('content')
@include('admin.side')
   <main id="main" class="main">
    <div class="container">
        <div class="row">
           
                
            
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8 mb-3">
                        <h4 class="text-theme ps-2">Manage Examination</h4>
                    </div>
                    <div class="col-4">
                      <a href="{{route('examination.create')}}" class="btn btn-outline-success">Add Examination</a> 
                    </div>
                </div>
                <section class="section">
                    <div class="row">
                      <div class="col-lg-12">
                
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            {{--  --}}
                
                            <!-- Table with stripped rows -->
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">ExamId</th>
                                  <th scope="col">Category</th>
                                  <th scope="col">SubCategory</th>
                                  <th scope="col"> ExamName</th>
                                  <th scope="col">RightMarks</th>
                                  <th scope="col">WrongMarks</th>
                                  <th scope="col">TimeDuration</th>
                                  
                                  
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($examination as $cour)
                                      <tr>
                                          <td>{{$cour->id}}</td>
                                          <td>{{$cour->exam->examname}}</td>
                                          <td>{{$cour->category->category}}</td>
                                          <td>{{$cour->subcategory->subcategory}}</td>
                                          <td>{{$cour->exam_name}}</td>
                                          <td>{{$cour->rightmarks}}</td>
                                          <td>{{$cour->wrongmarks}}</td>
                                          <td>{{$cour->time_duration}}</td>
                                          <
                                          
                                          <td>
                                            <a href="" class="btn btn-outline-secondary">Edit</a>
                                            <a href="" class="btn btn-outline-warning">Delete</a>
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
            </div>
        </div>
       </div>
   </main>
   

@endsection