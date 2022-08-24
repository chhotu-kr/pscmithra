@extends('admin.base')
@section('content')
@include('admin.side')
   <main id="main" class="main">
    <div class="container">
        <div class="row">
           
                
            
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12 mb-3">
                      <a href="{{route('livetest.create')}}" class="btn btn-primary">Add Livetest</a> 
                    </div>
              
                </div>
                <section class="section">
                    <div class="row">
                      <div class="col-lg-12">
                
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Manage LiveTest</h5>
                            {{--  --}}
                           
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                              <thead>
                                <tr>
                                  <th scope="col" >id</th>
                                 
                                  
                                  <th scope="col"> ExaminationName</th>
                                  <th scope="col"> Language Name</th>
                                  <th scope="col"> Exam Name</th>
                                  <th scope="col">Start At</th>
                                 
                                  <th scope="col">Right Marks</th>
                                  <th scope="col">Wrong Marks</th>
                                  <th scope="col">Time</th>
                                  
                                  
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($live as $cour)
                                      <tr>
                                          <td>{{$cour->id}}</td>
                                        
                                          <td>{{$cour->examination->exam_name}}</td>
                                          <td>{{$cour->language->languagename}}</td>
                                          <td>{{$cour->exam_name}}</td>
                                          <td>{{$cour->startat}}</td>
                                         
                                          <td>{{$cour->rightmarks}}</td>
                                          <td>{{$cour->wrongmarks}}</td>
                                          <td>{{$cour->time_duration}}</td>
                                          

                                         
                                          
                                          <td>
                                            <a href="{{route('livetest.update',['id'=>$cour->id])}}" class="btn btn-outline-secondary">Edit</a>
                                            <a href="{{route('livetest.remove',['id'=>$cour->slugid])}}" class="btn btn-outline-danger">Delete</a>
                                            <a href="{{route('manage.question',['id'=>$cour->id])}}" class=" btn btn-outline-info rounded-pill">Manage Question</a>
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
                    </div>
                  </section>   
            </div>
        </div>
       </div>
   </main>
   

@endsection