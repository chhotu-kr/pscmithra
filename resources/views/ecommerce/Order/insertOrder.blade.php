@extends('admin.base')
@section('content')
<main id="main" class="">
    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>
            <div class="col-12">
                <h3>Insert Order here</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route("order.store")}}" method="post" enctype="multipart/form-data">
                            @csrf
                               <div class="row">
                                    <div class="mb-3 col">
                                        <label for=""> user_id</label>
                                        <select name="user_id" id="" class="form-select">
                                            @foreach ($user as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <p class="small text-danger">{{$message}}</p>
                                        @enderror
                                   </div>
                                   <div class="mb-3 col">
                                        <label for="">Address_id</label>
                                        <select name="address_id" id="" class="form-select">
                                            @foreach ($address as $item)
                                                <option value="{{$item->id}}">{{$item->street}}</option>
                                            @endforeach
                                        </select>
                                        @error('address_id')
                                            <p class="small text-danger">{{$message}}</p>
                                        @enderror
                                  </div>
                                  <div class="mb-3 col">
                                      <label for="">Coupon_id</label>
                                      <select name="coupon_id" id="" class="form-select">
                                          @foreach ($coupon as $item)
                                              <option value="{{$item->id}}">{{$item->code}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                               </div>
                               <div class="row">
                                   <div class="mb-3 col">
                                       <label for="">Is Delivered</label>
                                       <input type="text" class="form-control" name="isDeliverd" value="{{old('isDeliverd')}}">
                                       @error('isDeliverd')
                                           <p class="small text-danger">{{$message}}</p>
                                       @enderror
                                   </div>
                                   <div class="mb-3 col">
                                        <label for="">Is Processing</label>
                                        <input type="text" class="form-control" name="isProcessing" value="{{old('isProcessing')}}">
                                        @error('isProcessing')
                                            <p class="small text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="">Is Shipped</label>
                                        <input type="text" class="form-control" name="isShipped" value="{{old('isShipped')}}">
                                        @error('isShipped')
                                            <p class="small text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                               </div>
                               <div class="row">
                                   <div class="mb-3 col">
                                       <label for="">Date of Order</label>
                                       <input type="date" class="form-control" name="dateofordered" value="{{old('dateofordered)')}}">
                                       @error('dateOfOrderd')
                                           <p class="small text-danger">{{$message}}</p>
                                       @enderror
                                   </div>
                                   <div class="mb-3 col">
                                    <label for="">Ordered</label>
                                    <input type="text" class="form-control" name="ordered" value="{{old('ordered)')}}">
                                    @error('ordered')
                                        <p class="small text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                               </div>
                            <input type="submit" value="Insert order" class="btn btn-success w-100">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection