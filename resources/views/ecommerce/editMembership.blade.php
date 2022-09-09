@extends('admin.base')
@section('content')
    <div class="container" style="margin-top: 7%;">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>
            <div class="col-9">
                
                <div class="card">
                    <div class="card-header h3">Edit Here</div>
                    <div class="card-body">
                        <form action="{{route('membership.update',$membership)}}" method="POST">
                            @method("put")
                            @csrf
   
                            <div class="mb-3">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" value="{{$membership->price}}" required>
                            </div>
                            <div class="mb-3">
                                <label>Validity</label>
                                <input type="text" name="validity" class="form-control" value="{{$membership->validity}}" required>
                            </div>
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{$membership->name}}" required>
                            </div> 
                            <div class="mb-3">
                                <label>No Of Test</label>
                                <input type="number" name="nooftest" class="form-control" value="{{$membership->nooftest}}" required>
                            </div>
                            <div class="mb-3">
                                <label>Details</label>
                                <textarea name="details" id=""  class="editor form-control">{!!$membership->destails!!}</textarea>
                            </div>
                            <div class="mb-3">
                               <input type="submit" value="Update" class="btn btn-primary w-100">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection