@extends('admin.base')
@section('content')
@include('admin.side')
   <main id="main" class="main">
    <div class="container">
        <div class="row">
           
                
            
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12 mb-3">
                      <a href="{{route('examination.create')}}" class="btn btn-primary">Add Examination</a> 
                    </div>
              
                </div>
                <section class="section">
                    <div class="row">
                      <div class="col-lg-12">
                
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Manage Examination</h5>
                            {{--  --}}
                
                            <!-- Table with stripped rows -->
                           <div class="table-responsive">
                            <table class="table datatable">
                              <thead>
                                <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">Exam<br>Id</th>
                                  <th scope="col">Category<br>Name</th>
                                  <th scope="col">SubCategory<br>Name</th>
                                  {{-- <th scope="col">Question<br>Name</th> --}}
                                  <th scope="col">Start<br>At</th>
                                  <th scope="col"> Exam<br>Name</th>
                                  <th scope="col">Right<br>Marks</th>
                                  <th scope="col">Wrong<br>Marks</th>
                                  <th scope="col">Time</th>
                                  
                                  
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
                                          {{-- <td>{{$cour->secondquestion->question}}</td> --}}
                                          <td>{{$cour->startat}}</td>
                                          <td>{{$cour->exam_name}}</td>
                                          <td>{{$cour->rightmarks}}</td>
                                          <td>{{$cour->wrongmarks}}</td>
                                          <td>{{$cour->time_duration}}</td>
                                          
                                          
                                          <td>
                                            <a href="" class="btn btn-outline-secondary">Edit</a>
                                            <a href="" class="btn btn-outline-warning">Delete</a>
                                            <a href="{{route('check.index',['id'=>$cour->id])}}" class="btn btn-outline-warning">ManageQuestion</a>
                                          </td>
                                      </tr>
                                  @endforeach
                                
                              </tbody>
                            </table>
                           </div>
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