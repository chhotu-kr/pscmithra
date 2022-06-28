@extends('admin.base')
@section('content')
@include('admin.side')
   <main id="main" class="main">
    <div class="container">
        <div class="row">
           
                
            
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8 mb-3">
                        <h4 class="text-theme ps-2">Manage Course</h4>
                    </div>
                    <div class="col-4">
                      <a href="{{route('course.create')}}" class="btn btn-outline-success">Add Modules</a> 
                    </div>
                </div>
                <section class="section">
                    <div class="row">
                      <div class="col-lg-12">
                
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>
                
                            <!-- Table with stripped rows -->
                            <table class="table ">
                              <thead>
                                <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">CourseUrl</th>
                                  <th scope="col"> Type</th>
                                  <th scope="col">Text</th>
                                  <th scope="col">QuizId</th>
                                  <th scope="col">IsFree</th>
                                  <th scope="col">Index</th>
                                  
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($course as $cour)
                                      <tr>
                                          <td>{{$cour->id}}</td>
                                          <td>{{$cour->product->title}}</td>
                                          <td>{{$cour->name}}</td>
                                          <td>{{$cour->course_url}}</td>
                                          <td>{{$cour->type}}</td>
                                          <td>{{$cour->text}}</td>
                                          <td>{{$cour->quiz_id}}</td>
                                          <td>{{$cour->is_free}}</td>
                                          <td>{{$cour->index}}</td>
                                          
                                          <td>
                                            <a href="{{route('course.create')}}" class="btn btn-outline-success">Add Modules</a>
                                              {{-- <form action="{{route('course.destroy',[$cour])}}" method="POST">
                                                @method('delete')
                                              @csrf
                                              <input type="submit" value="X" class="btn btn-outline-danger">
                                              <a href="{{route('course.edit',[$cour])}}" class="btn btn-outline-primary">Edit</a>
                                              </form> --}}
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