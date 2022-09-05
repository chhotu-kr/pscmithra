@extends('admin.base')
@section('content')

   <main class="main" id="main">
     <div class="container">
        <div class="col-3">
            @include('admin.side')
        </div>
        <div class="col-12">
           <div class="card">
            <div class="card-header ps-2 h4">Edit Product</div>
            <div class="card-body">
                <form action="{{ route('product.update',$product) }}" class="row g-3 needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                      
                    @csrf
                   @method("put")
                    
                   <div class="row">
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="validationTooltip01" value="{{$product->title}}"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                      <label for="" class="form-label">Subject</label>
                      <select   name="subject_id" class=" form-select" id="validationTooltip01"  required>
                          <option >select</option>
                          @foreach ($subject as $item)
                              {{-- <option value="{{$item->id}}">{{$item->sub_name}}</option> --}}
                              <option value="{{ $item->id }}"
                                @if ($item->id==$product->subject_id)
                                    selected="selected"
                                @endif
                              >{{ $item->sub_name}}</option>
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
                    </select>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                   </div>
                   <div id ="append"></div>
                   <div class="row">
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" id="validationTooltip01" value="{{$product->price}}"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip01" class="form-label">Bycount</label>
                        <input type="text" class="form-control" name="bycount" id="validationTooltip01" value="{{$product->bycount}}"  required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                    </div>
                   </div>
                  
                    <div class="col-md-12 position-relative">
                      <label for="validationTooltip01" class="form-label">Description</label>
                      <textarea class="editor" id="validationTooltip05" name="description"  class="form-control" required>{!!$product->description!!}</textarea>
                      <div class="valid-tooltip">
                        Looks good!
                      </div>
                  </div>
                  <div class="col-md-12 position-relative">
                    <label for="validationTooltip01" class="form-label">Image</label>
                    <input type="file" class="form-control" name="bannerimage" id="validationTooltip01" value="{{$product->bannerimage}}"  required>
                    <div class="valid-tooltip">
                      Looks good!
                    </div>
                </div>

                @livewire('imageview', ['image' => ['image' => $product->image,'w'=>'100','h'=>'100']], key($new->id))
                 
                    
                    <div class="col-md-12">
                      <button class="btn btn-primary w-100" type="submit">Update</button>
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
                              
                                <th scope="col">Name</th>
                                <th scope="col">Count</th>
                                
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

                                       $("#append").html(Html);


         }
        });
      }
      else if(responseID=="course"){
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

                                       $("#append").html(Html);


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

                                       $("#append").html(Html);


         }
        });
      }
       
    });
  </script>
@endsection
