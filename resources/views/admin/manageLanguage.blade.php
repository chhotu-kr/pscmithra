@extends('admin/base')
@section('content')
@include('admin.side')
<main id="main" class="main">
    <div class="col-9">
    <div class="pagetitle">
      
        <div class="row">
            <div class="col-8">
                <h6 class="border-5 border-start border-danger ps-1 mt-2   h4 text-theme text-warning">ManageExam</h6>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#basicModal">
                    Add Language
                  </button>
                  <div class="modal fade" id="basicModal" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Add Language Type</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('language.store')}}" method="POST">
                            @csrf
                          
                        <div class="modal-body">
                          
                          
                          
                            
                            <div class="mb-3">
                                <label for="validationTooltip04" class="form-label">LanguageName</label>
                                <input type="text" name="languagename" class="form-control" required>
                            </div>
                           
                          
                         
                          <div class="mb-3">
                        <button type="submit" class="btn btn-primary">submit</button>
                          </div>
                      </div>
                    </form>
                      </div>
                    </div>
                  </div><!-- End Basic Modal-->
            </div>
        </div>
     
        
       
    </div>
    </div><!-- End Page Title -->
  
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
  
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>
  
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                   
                    <th scope="col">LanguageName</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                   @foreach ($language as $item)
                          <tr>
                              <td>{{$item->id}}</td>
                             
                              <td>{{$item->languagename}}</td>
                              <td>
                                 <a href="{{route('languageedit',['id'=>$item->id])}}" class="btn btn-outline-success">Edit</a>
                                
                                
                                  <a href="{{route('removelanguage',['id'=>$item->slugid])}}" class="btn btn-outline-danger">Delete</a>
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
  
  </main><!-- End #main -->
@endsection