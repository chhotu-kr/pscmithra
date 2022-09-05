@extends('admin.base')
@section('content')
@include('admin.side')
   <main id="main" class="main">
    <div class="container">
        <div class="row">
           
                
            
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8 mb-3">
                      <a href="{{route('module.create',$id)}}" class="btn btn-outline-success">Add Modules</a> 
                    </div>
                   
                </div>
                <section class="section">
                    <div class="row">
                      <div class="col-lg-12">
                
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">ManageModule</h5>
                            
                
                            <!-- Table with stripped rows -->
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Name</th>
                                   <th scope="col">Url</th> 
                                  <th scope="col"> Type</th>
                                  <th scope="col">Text</th>
                                  <th scope="col">QuizId</th> 
                                  <th scope="col">IsFree</th>
                                  <th scope="col">Index</th>
                                  
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($module as $cour)
                                      <tr>
                                          <td>{{$cour->id}}</td>
                                          <td>{{$cour->course->name}}</td>
                                          <td>{{$cour->name}}</td>
                                          <td>{{$cour->url}}</td>
                                          <td>{{$cour->type}}</td>
                                           <td>{{$cour->text}}</td>
                                          <td>{{$cour->quiz_id}}</td>
                                          <td>{{$cour->isfree}}</td>
                                          <td>{{$cour->index}}</td>
                                          
                                          <td>
                                            {{-- <a href="{{route('course.create')}}" class="btn btn-outline-success">Add Modules</a> --}}
                                            <a href="{{route('update.module',['id'=>$cour->id])}}" class="btn btn-outline-success">Edit</a>
                                              
                                              
                                            <a href="{{route('module.remove',['id'=>$cour->slugid])}}" class="btn btn-outline-danger">Delete</a>
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