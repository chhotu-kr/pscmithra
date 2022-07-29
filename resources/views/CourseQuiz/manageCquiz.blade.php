@extends('admin.base')
@section('content')
    <main class="main" id="main">
        @include('admin.side')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('course.quiz')}}" class="btn btn-primary">Add CourseQuiz</a>
                    <section class="section">
                        <div class="row">
                          <div class="col-lg-12 py-3">
                    
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">Manage CourseQuizQuestion</h5>
                                
              
                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                  <thead>
                                    <tr>
                                      <th scope="col">Id</th>
                                   
                                      <th scope="col">Name</th>
                                 
                                      <th scope="col">Action</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                     @foreach ($cq as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->CQname}}</td>
                                                
                                                <td>
                                                   <a href="{{route('coursequiz.update',['id'=>$item->id])}}" class="btn btn-outline-success">Edit</a>
                                                  
                                                  
                                                    <a href="{{route('coursequiz.remove',['id'=>$item->slugid])}}" class="btn btn-outline-danger">Delete</a>
                                                    <a href="{{route('manage.Cquizquestion',['id'=>$item->id])}}" class="btn btn-outline-warning">ManageQuestion</a>
                                                    
                                                    
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