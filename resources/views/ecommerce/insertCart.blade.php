@extends('admin.base')
@section('content')
    <main class="main" id="main">
        @include('admin.side')
        <div class="container">
            <div class="row">
                {{-- <div class="col-3">
                  
                </div> --}}
              
                    <div class="col-12">
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
                                        <label for="" >UserId</label>
                                       <select name="user_id" id="" class="form-select" required>
                                       <option value="0">select userid</option>
                                       @foreach ($user as $new)
                                           <option value="{{$new->id}}">{{$new->name}}</option>
                                       @endforeach
                
                                       </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="submit" value="Create" class="btn btn-primary w-100">
                                    </div>
                                    </form>
                            </div>
                        </div>
                    </div>
               
            </div>
        </div>
    </main>

@endsection