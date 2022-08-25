@extends('admin.base')
@section('content')
<main class="main" id="main">
    @include('admin.side')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('course.create')}}" class="btn btn-primary mb-3">Add Course</a>
                <section class="section">
                    <div class="row">
                      <div class="col-lg-12">
                
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Manage Course</h5>
                            
                
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                              <thead>
                                <tr>
                                  <th scope="col">Id</th>
                                  <th scope="col">Course Name</th>
                                  <th scope="col">Created By</th>
                                  <th scope="col">Action</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                 @foreach ($course as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->createdby}}</td>
                                           
                                            <td>
                                               <a href="{{route('course.update',['id'=>$item->id])}}" class="btn btn-outline-success">Edit</a>
                                              
                                              
                                                <a href="{{route('course.remove',['id'=>$item->slugid])}}" class="btn btn-outline-danger">Delete</a>
                                                <a href="{{route('manage.module',['id'=>$item->id])}}" class="btn btn-outline-primary">AddModule</a>
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