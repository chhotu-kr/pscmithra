@extends('admin.base')
@section('content')
    @include('admin.side')
   <main class="main" id="main">
    <div class="col-12 mb-3">
      <a href="{{route('question.create')}}" class="btn btn-primary">Add New Question</a>
    </div>
    <section class="section">
                    
                
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Datatables</h5>
            

            <!-- Table with stripped rows -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">SubjectName</th>
                  <th scope="col">TopicName</th>
                 
                  <th scope="col">Language</th>
                  <th scope="col">name</th>
                  <th scope="col">rightans</th>
                  <th scope="col">Action</th>
                 
                  
                </tr>
              </thead>
              <tbody>
                  @foreach ($question as $req)
                      <tr>

                       
                          <td>{{$req->id}}</td>
                         
                          <td>{{$req->subject->sub_name}}</td>
                          <td>{{$req->topic->topic_name}}</td>
                          <td>
                            @foreach ($req->secondquestion as $value)
                            {{ $value->language->languagename.", "}}
                            @endforeach


                          </td>
                          <td>{{$req->name}}</td>
                          {{-- <td><a href="{{route('manage.question',['id'=>$req->id])}}" class="nav-link">{{$req->name}}</a></td> --}}
                          <td>{{$req->rightans}}</td>
                          
                          
                          <td>
                            {{-- <a href="{{route('secondquestionedit',['id'=>$req->id])}}" class="btn btn-outline-success">Edit</a>
                            <a href="{{route('removequestion',['id'=>$req->slugid])}}" class="btn btn-outline-danger">Delete</a>    --}}
                       
                        <a href="{{route('manage.question',['id'=>$req->id])}}" class=" btn btn-outline-info rounded-pill">Manage Question</a>
                               
                          </td>
                          
                      </tr>
                  @endforeach
                
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

  </section>  
   </main>
@endsection