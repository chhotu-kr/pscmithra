@extends('admin/base')
@section('content')
    <main id="main" class="main">
      @include('admin.side')
        <div class="container">
            <div class="row">
                <div class="col-12">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                    Add QuizSubCategory
                   </button>
                </div>
                
          
                 
    
                  <div class="modal fade" id="largeModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Insert QuizSubCategory</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                         <!-- Custom Styled Validation with Tooltips -->
                         <form action="{{route('quizsubcat.store')}}" class="row g-3 needs-validation" enctype="multipart/form-data" method="post" novalidate>
                            
                          @csrf
                          
                          {{-- <div class=" position-relative">
                            <label for="validationTooltip04" class="form-label">QuizCategory</label>
                            <select class="form-select" name="quiz_categories" id="validationTooltip04" required>
                              <option selected disabled value="0">Choose Your QuizCategory</option>
                              @foreach ($quizcategory as $item)
                              <option value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                            </select>
                            <div class="invalid-tooltip">
                              Please select a valid id.
                            </div>
                          </div> --}}

                          <input  name="quiz_categories" value="{{$id}}" class="form-control" hidden>
                          <div class=" position-relative">
                            <label for="validationTooltip05" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="validationTooltip05" required>
                            <div class="invalid-tooltip">
                              Please provide a valid quizcategory.
                            </div>
                          </div>
                          <div class=" position-relative">
                            <label for="validationTooltip05" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" id="validationTooltip05" required>
                            <div class="invalid-tooltip">
                              Please provide a valid quizcategory.
                            </div>
                          </div>
                          <div class="m-3 row">
                            <div class="form-check form-switch col-sm-auto">
                                <input class="form-check-input" type="checkbox" id="ifnested" value="true" name="ifnested" >
                                <label class="form-check-label" for="checkbox1">IfNested</label>
                            </div>
                          </div>
                              <script>
                                $("#ifnested").on('change', function() {
                                   if ($(this).is(':checked')) {
                                    $(this).attr('value', 'true');
                                      } else {
                                         $(this).attr('value', 'false');
                                          }
    
                                  });
                                  VirtualSelect.init({
                                    ele: '.ss',
                                     search: false,
                                      required: true
                                  });
                                  document.querySelector('#assaa').validate();
                              </script>
                          <div class="col-12">
                            <button class="btn btn-primary w-100 mt-3" type="submit">Create</button>
                          </div>
                        </form><!-- End Custom Styled Validation with Tooltips -->
                        </div>
                       
                      </div>
                    </div>
                  </div><!-- End Large Modal-->
                         
            
                          
            
                      
                </div>
            </div>
        </div>
        <section class="section">
          <div class="row">
            <div class="col-lg-12 py-3">
      
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Manage QuizSubCategory</h5>
                  

                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                     
                        <th scope="col">QuizCategory</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ($quizsubcat as $item)
                              <tr>
                                  <td>{{$item->id}}</td>
                                  <td>{{$item->quizcat->name}}</td>
                                  <td>{{$item->name}}</td>
                                  <td>
                                    <img src="{{asset("images/".$item->image)}}" width="40" height="40" alt="">
                                </td>
                                <td>{{$item->ifnested}}</td>
                                  <td>
                                     <a href="{{route('quizSubcat.update',['id'=>$item->id])}}" class="btn btn-outline-success">Edit</a>
                                    
                                    
                                      <a href="{{route('quizsubcategory.remove',['id'=>$item->slugid])}}" class="btn btn-outline-danger">Delete</a>
                                     @if ($item->ifnested=='true')
                                     <a href="{{route('quiz.chapter',['id'=>$item->id])}}" class="btn btn-outline-secondary">ManageQuizChapter</a>
                                         
                                     @endif
                                      
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
    </main>
@endsection