@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">

  <div class="pagetitle">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">Edit User</div>
          <div class="card-body">
            <form action="{{route('user.update',$subuser)}}" method="post">
              @csrf
          
            <div class="mb-3">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" value={{$subuser->name}} required>
            </div>
            <div class="mb-3">
              <label for="">Contact</label>
              <input type="text" name="contact" class="form-control" value={{$subuser->contact}} required>
            </div>
            <div class="mb-3">
              <label for="">Email</label>
              <input type="text" name="email" class="form-control" value={{$subuser->email}} required>
            </div>
            <div class="mb-3">
              <label for="">Password</label>
              <input type="text" name="password" class="form-control" value={{$subuser->password}} required>
            </div>
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control" value={{$subuser->image}} required>
            </div>
              <div class="mb-3">
                <label for="">Gender</label>
                <input type="text" name="gender" class="form-control" value={{$subuser->gender}} required>
              </div>
            <div class="mb-3">
                <label for="">Amount</label>
                <input type="text" name="amount" class="form-control" value={{$subuser->amount}}>
              </div>
              <div class="mb-3">
                <label for="">Type</label>
                <select name="type" id="" class="form-control" value={{$subuser->type}}>
                    <option value="0">bot</option>
                    <option value="1">user</option>
                </select>
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

   
</main><!-- End #main -->

@endsection