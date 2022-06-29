@extends('admin.base')
@section('content')
@include('admin.side')
   <main id="main" class="main">
    <div class="container">
        <div class="row">
           
                
            
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8 mb-3">
                        <h4 class="text-theme ps-2">Manage Coupon</h4>
                    </div>
                    <div class="col-4">
                        <a href="{{route('coupon.create')}}" class="btn btn-outline-success">Add New Coupon</a>
                    </div>
                </div>
                <section class="section">
                    <div class="row">
                      <div class="col-lg-12">
                
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>
                
                            <!-- Table with stripped rows -->
                            <table class="table ">
                              <thead>
                                <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">Code</th>
                                  <th scope="col">Percent</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($coupon as $pro)
                                      <tr>
                                          <td>{{$pro->id}}</td>
                                          <td>{{$pro->code}}</td>
                                          <td>{{$pro->percent}}</td>
                                         
                                          
                                          <td>
                                              
                                              <form action="{{route('coupon.destroy',[$pro])}}" method="POST">
                                                @method('delete')
                                              @csrf
                                              <input type="submit" value="X" class="btn btn-outline-danger">
                                              {{-- <a href="{{route('coupon.edit',[$pro])}}" class="btn btn-outline-primary">Edit</a> --}}
                                              </form>
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
            </div>
        </div>
       </div>
   </main>
   

@endsection