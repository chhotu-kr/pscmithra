@extends('admin.base')
@section('content')
@include('admin.side')
   <main id="main" class="main">
    <div class="container">
        <div class="row">
           
                
            
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8 mb-3">
                        <h4 class="text-theme ps-2">Manage Question</h4>
                    </div>
                    <div class="col-4">
                        <a href="{{route('question.create')}}" class="btn btn-outline-primary">Add New Question</a>
                    </div>
                </div>
                <section class="section">
                    
                
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>
                
                            <!-- Table with stripped rows -->
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">SubjectName</th>
                                  <th scope="col">question_id</th>
                                  <th scope="col">Question</th>
                                  <th scope="col">Option1</th>
                                  <th scope="col">Option2</th>
                                  <th scope="col">Option3</th>
                                  <th scope="col">Option4</th>
                                  <th scope="col">Action</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($secondquestion as $req)
                                      <tr>
                                          <td>{{$req->id}}</td>
                                          <td>{{$req->language->languagename}}</td>
                                          <td>{{$req->question_id}}</td>
                                          <td>{{$req->question}}</td>
                                          <td>{{$req->option1}}</td>
                                          <td>{{$req->option2}}</td>
                                          <td>{{$req->option3}}</td>
                                          <td>{{$req->option4}}</td>
                                          
                                          <td>
                                            <a href="{{route('secondquestionedit',['id'=>$req->id])}}" class="btn btn-outline-success">Edit</a>
                                            <a href="{{route('removesecondquestion',['id'=>$req->slugid])}}" class="btn btn-outline-danger">Delete</a>   
{{--                                           
                                              <form action="{{route('membership.destroy',[$req])}}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <input type="submit" value="X" class="btn btn-outline-danger">
                                                <a href="{{route('membership.edit',[$req])}}" class="btn btn-outline-primary">Edit</a>
                                                </form> --}}

                                               
                                          </td>
                                          
                                      </tr>
                                  @endforeach
                                
                              </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                
                          </div>
                        </div>
                
                  </section>  
      
            </div>
        </div>
       </div>
   </main>
   

@endsection