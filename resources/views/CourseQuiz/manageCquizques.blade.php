@extends('admin.base')
@section('content')
    <main class="main" id="main">
        
        @include('admin.side')
      <div class="container">
        <a href="{{route('coursequizquestion.create',['id'=>$data['id']])}}" class="btn btn-outline-primary mb-3">Add CourseQuizQuestion</a>   
        <div class="row">
          {{-- <p>{{$data}}</p> --}}
        
            <div class="col-12">
               
                <section class="section">
                    <div class="row">
                      <div class="col-lg-12">
                
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">ManageCourseQuizQuestion</h5>
                            <table class="table datatable">
                              <thead>
                                <tr>
                                 
                                  <th scope="col">Id</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Language Name</th>
                                  
                                  <th scope="col">Action</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                 @foreach ($data['cqq'] as $item)
                                        <tr>
                                        
                                       
                                           
                                          <td>{{$item->id}}</td>
                                            <td>{{$item->question->name}}</td>
                                            <td>
                                              @foreach ($item->question->secondquestion as $itema)
                                                  {{$itema->language->languagename.", "}}
                                              @endforeach
                                            </td>
                                            {{-- <td>{{$item->question->secondquestion->language->name}}</td> --}}
                                            
                                           
                                            <td>
                                              <a href="{{route('examquestion.edit',['id'=>$item->id])}}" class="btn btn-outline-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                              </tbody>
                            </table>
                            {{-- <input type="submit" class="btn btn-primary" id="btn"> --}}
                      
                             
                            
                             
                              
                
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

