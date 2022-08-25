@extends('admin.base')
@section('content')
@include('admin.side')
   <main id="main" class="main">
    <div class="container">
        <div class="row">
           
                
            
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12 mb-3">
                      <a href="{{route('quizexamination.create')}}" class="btn btn-primary">Add QuizExamination</a> 
                    </div>
              
                </div>
                <section class="section">
                    <div class="row">
                      <div class="col-lg-12">
                
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Manage QuizExamination</h5>
                            {{--  --}}
                            <div class = "table-responsive" style="white-space: nowrap;"> 
                            <!-- Table with stripped rows -->
                            <table  id="with" style="width:100%">
                              <thead>
                                <tr>
                                  <th >id</th>
                               
                                  <th >QuizCategory Name</th>
                                  <th >QuizSubCategory Name</th>
                                  <th >QuizChapter Name</th>
                                  <th >QuizCTopic Name</th>
                                  
                                  <th scope="col"> Exam Name</th>
                                  <th scope="col"> Language</th>
                                  <th scope="col">Right Marks</th>
                                  <th scope="col">Wrong Marks</th>
                                  <th scope="col">No Of Question</th>
                                  <th scope="col">Type</th>
                                  <th scope="col">IsFree</th>
                                  <th scope="col">Time</th>
                                  
                                  {{-- <th scope="col">Start<br>At</th>
                                  <th scope="col"> Exam<br>Name</th>
                                  <th scope="col">Right<br>Marks</th>
                                  <th scope="col">Wrong<br>Marks</th>
                                  <th scope="col">Time</th> --}}
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($quiz_exami as $cour)
                                      <tr>
                                          <td>{{$cour->id}}</td>
                                          <td>{{$cour->quizCat->name}}</td>

                                          @if(!empty($cour->quiz_sub_categories_id ))
                                          <td>{{$cour->quizsubcat->name}}</td>
                                          @else
                                          <td> - </td>
                                          @endif

                                          @if(!empty($cour->quiz_chapters_id ))
                                          <td>{{$cour->quizChat->name}}</td>
                                          @else
                                          <td> - </td>
                                          @endif

                                          @if(!empty($cour->quiz_topics_id))
                                          <td>{{$cour->quiztopic->name}}</td>
                                         @else
                                          <td>-</td>
                                          @endif
                                          
                                          <td>{{$cour->exam_name}}</td>
                                          <td>@foreach($cour->lang as $val)
                                            {{$val->language->languagename}},
                                            @endforeach</td> 
                                          <td>{{$cour->rightmarks}}</td>
                                          <td>{{$cour->wrongmarks}}</td>
                                          <td>{{$cour->noquizques}}</td>
                                          <td>{{$cour->type}}</td>
                                          <td>{{$cour->isFree}}</td>
                                          {{-- <td>{{$cour->time_duration}}</td>
                                          <td>{{$cour->time_duration}}</td> --}}
                                          <td>{{$cour->time_duration}}</td>
                                          

                                          {{-- <td>{{$cour->startat}}</td>
                                          <td>{{$cour->exam_name}}</td>
                                          <td>{{$cour->rightmarks}}</td>
                                          <td>{{$cour->wrongmarks}}</td>
                                          <td>{{$cour->time_duration}}</td> --}}
                                          
                                          <td>
                                            <a href="{{route('quizexamination.update',['id'=>$cour->id])}}" class="btn btn-outline-secondary">Edit</a>
                                            <a href="{{route('quizexamination.remove',['id'=> $cour->slugid])}}" class="btn btn-outline-warning">Delete</a>
                                            <a href="{{route('manage.quizquestion',['id'=>$cour->id])}}" class="btn btn-outline-warning">ManageQuestion</a>
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