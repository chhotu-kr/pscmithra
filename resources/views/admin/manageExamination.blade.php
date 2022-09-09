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
                            <div class = "table-responsive" style="white-space: nowrap;"> 
                            <!-- Table with stripped rows -->
                            <table id="with" class="display" style="width:100%">
                              <thead>
                                <tr>
                                  <th >id</th>
                                
                                  <th >Category Name</th>
                                  <th >SubCategory Name</th>                                                           
                                  <th scope="col"> Exam Name</th>
                                  <th scope="col">Marks</th>
                                  <th scope="col">Time (in Mints)</th>
                                  <th scope="col">Right Marks</th>
                                  <th scope="col">Wrong Marks</th>
                                  <th scope="col">No Of Questions</th>
                                  <th scope="col">Is Free</th>
                                  <th scope="col">Langauge</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($examination as $cour)
                                      <tr>
                                          <td scope="col">{{$cour->id}}</td>
                                       
                                          <td scope="col">{{$cour->category->category}}</td>
                                          <td scope="col">{{$cour->subcategory->subcategory}}</td>
                                          {{-- <td>{{$cour->secondquestion->question}}</td> --}}
                                      
                                          <td scope="col">{{$cour->exam_name}}</td>
                                        
                                          <td>{{$cour->marks}}</td>
                                          <td>{{$cour->time_duration}}</td>
                                          

                                          
                                          
                                          <td>{{$cour->rightmarks}}</td>
                                          <td>{{$cour->wrongmarks}}</td>
                                          <td>{{$cour->noQues}}</td> 
                                          <td>{{$cour->isFree}}</td> 

                                          <td>@foreach($cour->lang as $val)
                                          {{$val->language->languagename}},
                                          @endforeach</td> 
                                          
                                          
                                          <td>
                                            <a href="{{route('examination.edit',['id'=>$cour->id])}}" class="btn btn-outline-secondary">Edit</a>
                                            <a href="{{route('examination.remove',['id'=>$cour->id])}}" class="btn btn-outline-warning">Delete</a>
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
                    </div>
                  </section>   
            </div>
        </div>
       </div>
   </main>
   

@endsection