@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">

  <div class="pagetitle">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">Insert Address</div>
          <div class="card-body">
            <form action="{{route('address.store')}}" method="POST">
              @csrf
             <div class="mb-3">
              <label for="">ProductName</label>
              <select name="product_id" id="" class="form-select" required>
              <option value="0">select productName</option>
              @foreach ($product as $pro)
                  <option value="{{$pro->id}}">{{$pro->title}}</option>
              @endforeach
              </select>
             </div>
            <div class="mb-3">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="">State</label>
              <input type="text" name="state" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="">City</label>
              <input type="text" name="city" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="">pincode</label>
              <input type="text" name="pincode" class="form-control" required>
            </div>
            <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100">Create</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>

  </div>
      
  </div><!-- End Page Title -->

   {{-- <section class="section">
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
                  <th scope="col">id</th>
                  <th scope="col">ProductName</th>
                  <th scope="col">Name</th>
                  <th scope="col">State</th>
                  <th scope="col">City</th>
                  <th scope="col">Pincode</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($address as $req)
                      <tr>
                          <td>{{$req->id}}</td>
                          <td>{{$req->product->title}}</td>
                          <td>{{$req->name}}</td>
                          <td>{{$req->state}}</td>
                          <td>{{$req->city}}</td>
                          <td>{{$req->pincode}}</td>
                          <td>
                              <a href="{{route('address.edit',[$req])}}" class="btn btn-outline-primary" disabled>Edit</a>
                              <form action="{{route('address.destroy',[$req])}}" method="POST">
                              @method('delete')
                              @csrf
                              <input type="submit" value="Delete" class="btn btn-outline-danger">
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
  </section>   --}}

</main><!-- End #main -->

@endsection