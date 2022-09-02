@extends('admin/base')
@section('content')
    <main id="main" class="main">
      @include('admin.side')
        <div class="container">
            <div class="row">
                <div class="col-12">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                    Add QuizCategory
                   </button>
                </div>
                
          
                 
    
                  <div class="modal fade" id="largeModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Insert QuizCategory</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                         <!-- Custom Styled Validation with Tooltips -->
                         <form action="{{route('quizcat.store')}}" class="row g-3 needs-validation" enctype="multipart/form-data" method="post" novalidate>
                            
                          @csrf
                          
                       
                          <div class=" position-relative">
                            <label for="validationTooltip05" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="validationTooltip05" required>
                            <div class="invalid-tooltip">
                              Please provide a valid quizcategory.
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
                                <input class="form-check-input" type="checkbox" id="ifnested" value="false"  name="ifnested" >
                                <label class="form-check-label" for="checkbox1">IfNested</label>
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
          
          
                              
                             </div>
                        </div>
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
                  <h5 class="card-title">Manage QuizCategory</h5>
                  

                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                     
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Ifnested</th>
                        <th scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ($quizcategory as $item)
                              <tr>
                                  <td>{{$item->id}}</td>
                                  <td>{{$item->name}}</td>
                                  
                                  <td>
@livewire('imageview', ['image' => ['image' => $item->image,'w'=>'200','h'=>'200']], key($item->id))

                                    
                                </td>
                                <td>{{$item->ifnested}}</td>
                                  <td>
                                     <a href="{{route('quizcategory.update',['id'=>$item->id])}}" class="btn btn-outline-success">Edit</a>
                                    
                                    
                                      <a href="{{route('quizcategory.remove',['id'=>$item->slugid])}}" class="btn btn-outline-danger">Delete</a>

                                      @if ($item->ifnested=='true')
                                      <a href="{{route('quiz.Subcategory',['id'=>$item->id])}}" class="btn btn-outline-secondary">ManageQuizSubCategory</a>
                                       

                                      
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