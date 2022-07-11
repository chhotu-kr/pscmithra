@extends('admin.base')
@section('content')
    <main class="main" id="main">
        
        @include('admin.side')
      <div class="container">
        <a href="{{route('examquestion.create')}}" class="btn btn-outline-primary mb-3">Add ExamQuestion</a>   
        <div class="row">
          
            <div class="col-12">
               
                <section class="section">
                    <div class="row">
                      <div class="col-lg-12">
                
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">ManageExamQuestion</h5>
                            <form action="{{route('submit.check')}}" method="POST">
                                @csrf
                                <th><input class="" name="exam" value="question_id" ></th>
                                <table class="table datatable">
                                    <thead>
                                      <tr>
                                        <th scope="col">Checkbox</th>
                                        <th scope="col">Id</th>
                                        <th scope="col">ExamName</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">SerialNo</th>
                                        <th scope="col">Action</th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($examquestion as $item)
                                              <tr>
                                                <td><input type="checkbox"  name="az[]" value="question_id"></td>
                                             
                                                  <td>{{$item->id}}</td>
                                                  <td>{{$item->exam->examname}}</td>
                                                  <td>{{$item->secondquestion->question}}</td>
                                                  <td>{{$item->serialno}}</td>
                                                 
                                                  <td>
                                                    <a href="{{route('examquestion.edit',['id'=>$item->id])}}" class="btn btn-outline-success">Edit</a>
                                                  </td>
                                              </tr>
                                          @endforeach
                                    </tbody>
                                  </table>
                                  <input type="submit" class="btn btn-primary">
                            </form>
                
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
