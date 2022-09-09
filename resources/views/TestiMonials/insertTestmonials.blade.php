@extends('admin.base')
@section('content')
<main id="main" class="main">
    @include('admin.side')
      <div class="container">
          <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                  Add Testmonials
                 </button>
              </div>
              
        
               
  
                <div class="modal fade" id="largeModal" tabindex="-1">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Insert Testmonials</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                       <!-- Custom Styled Validation with Tooltips -->
                       <form action="{{route('Testmonials.store')}}" class="row g-3 needs-validation"" method="post" novalidate>
                          
                        @csrf
                      
                        <div class=" position-relative">
                          <label for="validationTooltip04" class="form-label">UserName</label>
                          <select class="form-select" name="user_id" id="validationTooltip04" required>
                            <option selected disabled value="0">Choose Your username</option>
                            @foreach ($user as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                          </select>
                          <div class="invalid-tooltip">
                            Please select a valid id.
                          </div>
                        </div>

                      
                        <div class=" position-relative">
                          <label for="validationTooltip05" class="form-label">Message</label>
                          <textarea class="editor" name="message" id="validationTooltip05" class="form-control" required></textarea>
                          <div class="invalid-tooltip">
                            Please provide a valid message.
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
                <h5 class="card-title">Manage TestiMonials</h5>
                

                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                   
                      <th scope="col">UserName</th>
                      <th scope="col">Message</th>
                     
                      <th scope="col">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($testimonials as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->subuser->name}}</td>
                                <td>{{$item->message}}</td>
                              
                                  <td> <a href="{{route('Testmonials.update',['id'=>$item->id])}}" class="btn btn-outline-success">Edit</a>
                                  
                                  
                                    <a href="{{route('Testmonials.remove',['id'=>$item->id])}}" class="btn btn-outline-danger">Delete</a>
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
  </main>
    
@endsection