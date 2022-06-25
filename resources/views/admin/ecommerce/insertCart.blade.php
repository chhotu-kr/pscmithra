@extends('admin.base')
@section('content')
    <div class="container" style="margin-top: 7%">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>
          
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">Insert Cart</div>
                        <div class="card-body">
                            <form action="{{route('cart.store')}}" method="POST">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="" >ProductName</label>
                                   <select name="product_id" id="" class="form-select"  required>
                                   <option value="0">select productname</option>
                                   @foreach ($product as $item)
                                       <option value="{{$item->id}}">{{$item->title}}</option>
                                   @endforeach
            
                                   </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" >UserName</label>
                                   <select name="address_id" id="" class="form-select" required>
                                   <option value="0">select username</option>
                                   @foreach ($address as $new)
                                       <option value="{{$new->id}}">{{$new->name}}</option>
                                   @endforeach
            
                                   </select>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" value="Create" class="btn btn-success w-100">
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
           
        </div>
    </div>

@endsection