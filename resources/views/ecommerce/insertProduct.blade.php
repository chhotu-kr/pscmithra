@extends('admin.base')
@section('content')

   <main class="main" id="main">
     <div class="container">
        <div class="col-3">
            @include('admin.side')
        </div>
        <div class="col-12">
           <div class="card">
            <div class="card-header ps-2 h4">Insert Product</div>
            <div class="card-body">
                <form action="{{route('product.store')}}" class="row g-3 needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                      
                    @csrf
                    
                    
                   <div class="row">
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="validationTooltip01"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                      <label for="" class="form-label">Subject</label>
                      <select   name="subject_id" class=" form-select" id="validationTooltip01"  required>
                          <option >select</option>
                          @foreach ($subject as $item)
                              <option value="{{$item->id}}">{{$item->sub_name}}</option>
                          @endforeach
                          
                      </select>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-12 position-relative">
                      <label for="" class="form-label">Type</label>
                      <select name="type" id="selected" class="form-select" required>
                        <option value="0">Select Type</option>
                        <option value="book">Book</option>
                        <option value="course">Course</option>
                        <option value="pdf">Pdf</option>
                        <option value="plan">Plan</option>
                        <option value="ebook">Ebook</option>
                    </select>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                   </div>
                   {{-- <div id ="extend"></div> --}}
                   <div class="row">
                    <div class="col-6">
                      <a href="" class="btn btn-outline-dark mt-3">AddMock Test</a>
                    </div>
                    <div class="col-6">
                      <a href="" class="btn btn-outline-dark mt-3 float-end">Add LiveExam</a>
                    </div>
                   </div>
                   <div class="row">
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" id="validationTooltip01"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Bycount</label>
                        <input type="text" class="form-control" name="bycount" id="validationTooltip01"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                   </div>
                  
                    <div class="col-md-12 position-relative">
                      <label for="validationTooltip01" class="form-label">Description</label>
                     <textarea name="description" id="validationTooltip01" cols="30" rows="5" class="tinymce-editor form-control"></textarea>
                      <div class="valid-tooltip">
                        Looks good!
                      </div>
                  </div>
                  <div class="col-md-12 position-relative">
                    <label for="validationTooltip01" class="form-label">Image</label>
                    <input type="file" class="form-control" name="bannerimage" id="validationTooltip01"  required>
                    <div class="valid-tooltip">
                      Looks good!
                    </div>
                </div>
                <div id ="extend"></div>
                    
                    <div class="col-md-12">
                      <button class="btn btn-primary w-100" type="submit">Create</button>
                    </div>
                  </form>
            </div>
           </div>
        </div>
     </div>
     
   </main>
  <script>
    $('#selected').change(function(){
      var responseID = $(this).val();
       console.log(responseID);
      if(responseID=="book"){
        // console.log("hgfhjfjvjhhnbnm");
        $.ajax({
          type:'get',
         dataType:'json',
         contentType:'application/json',
          url:"{{ route('addproductbook.show') }}",
         data:{},
         success:function(data){
         console.log(data);
         Html=`<table class="table datatable">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                              
                                <th scope="col">id</th>
                                <th scope="col">Name</th>
                          
                                
                                </tr>
                              </thead>
                              <tbody>`;
                                $.each(data, function(index, value){
                                  Html+=`<tr>
                                    <td><input type='checkbox' value='${value.id}'name='data'></td>
                                    <td>${value.id}</td>
                                    <td>${value.bookname}</td>


                                    </tr>`;
                                });Html+=`</tbody>
                                
                                       </table>`;

                                       $("#extend").html(Html);


         }
        });
      }
      else if(responseID =="course"){
        $.ajax({
          type:'get',
         dataType:'json',
         contentType:'application/json',
         url:"{{ route('CourseProduct.show') }}",
         data:{},
         success:function(data){
         console.log(data);
         Html=`<table class="table datatable">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">id</th>
                                <th scope="col">Name</th>
                             
                                
                                </tr>
                              </thead>
                              <tbody>`;
                                $.each(data, function(index, value){
                                  Html+=`<tr>
                                    <td><input type='checkbox' value='${value.id}'name='data'></td>
                                    <td>${value.id}</td>
                                    <td>${value.name}</td>


                                    </tr>`;
                                });Html+=`</tbody>
                                
                                       </table>`;

                                       $("#extend").html(Html);


         }
        });
      }
      else if(responseID=="pdf"){
        $.ajax({
          type:'get',
         dataType:'json',
         contentType:'application/json',
        url:"{{ route('Pdf.Product.show') }}",
         data:{},
         success:function(data){
        //  console.log(data);
         Html=`<table class="table datatable">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">id</th>
                                <th scope="col">Name</th>
                                
                                
                                </tr>
                              </thead>
                              <tbody>`;
                                $.each(data, function(index, value){
                                   //console.log(data);
                                  Html+=`<tr>
                                    <td><input type='checkbox' value='${value.id}'name='data'></td>
                                    <td>${value.id}</td>
                                    <td>${value.name}</td>


                                    </tr>`;
                                });Html+=`</tbody>
                                
                                       </table>`;

                                       $("#extend").html(Html);


         }
        });
      }
      else if(responseID == "ebook"){
        $.ajax({
          type:'get',
         dataType:'json',
         contentType:'application/json',
        url:"{{route('pdf.subscription')}}",
         data:{},
         success:function(data){
          console.log(data);
         Html=`<table class="table datatable">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">id</th>
                                <th scope="col">Name</th>
                                
                                
                                </tr>
                              </thead>
                              <tbody>`;
                                $.each(data, function(index, value){
                                   console.log(data);
                                  Html+=`<tr>
                                    <td><input type='checkbox' value='${value.id}'name='data'></td>
                                    <td>${value.id}</td>
                                    <td>${value.name}</td>
                                    


                                    </tr>`;
                                });Html+=`</tbody>
                                
                                       </table>`;

                                       $("#extend").html(Html);


         }
        });
      }
       
    });
  </script>
@endsection
