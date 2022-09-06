@extends('user/dashboard')
@section('pscmithra')

<div class="container-fluid bg-success  p-2 shadow sticky-top">
    <div class="container">
        <h4 class="h2 fw-lighter">Your cart</h4>
    </div>
</div>
    <div class="container mt-3">
      @auth
      @if ($order)
      <div class="row">
        <div class="col-8">
            <h1 class="text-secondary">My Cart</h1>
            @foreach ($order->orderItem as $item)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-3">
                                <img src="{{asset('images/'.$item->product->bannerimage)}}" class="w-100" alt="">
                            </div>
                           
                            <div class="col-9 card-body">
                                <h5>{{$item->product->title}}</h5>
                                <p>{{$item->product->subject->sub_name}}</p>
                                <h6>{{$item->product->price}}</h6>
                                <a href="{{route('removefromcart',['p_id'=>$item->product->id])}}" class="btn btn-danger">-</a>
                                <span class="lead fw-bolder">{{$item->qty}}</span>
                                <a href="{{route('addtocart',['p_id'=>$item->product->id])}}" class="btn btn-success">+</a>
                                <a href="{{route('removeitemfromCart',['p_id'=>$item->product->id])}}" class="btn btn-dark float-end">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-4">
            <div class="list-group">
                <div class="list-group-item list-group-item-action">Total Amount <span  class="float-end">Rs. {{total_amount()}}/-</span></div>
                <div class="list-group-item list-group-item-action bg-success text-white">Total  Discount Amount<span  class="float-end">Rs.{{total_saving_amount()}}/-</span></div>
                <div class="list-group-item list-group-item-action ">Tax (18%) <span  class="float-end">Rs. {{get_tax()}}</span></div>
                {{-- @if ($order->coupon_id != null)
                
                <div class="list-group-item list-group-item-action  bg-warning text-dark">Coupon discount <span  class="float-end">Rs. {{$order->coupon->amount}}/- <a href="{{route('removecoupon')}}" class="text-danger fw-bold text-decoration-none" title="Remove Coupon Code">X</a></span></div>

                @endif --}}

                <div class="list-group-item list-group-item-action">Payable Amount <span class="float-end">Rs. {{get_payable_amount()}}/-</span> </div>
            </div>
            <div class="row mt-3 px-2">
                <a href="" class="btn btn-success col">Continue Shopping</a>
                <a href="" class="btn btn-danger col ms-2">checkout</a>
            </div>

            @if ($order->coupon_id == null)
            <div class="card mt-4">
                <div class="card-body">
                    <h6 class="lead">Have any Coupon?</h6>
                    <form action="{{ route('applycoupon') }}" method="post" class="d-flex">
                        @csrf
                        <input type="text" placeholder="Enter Code" name="code" value="{{old('code')}}" class="form-control">
                        @error('code')
                            <p class="small text-danger">{{$message}}</p>
                        @enderror
                        <input type="submit" class="btn btn-dark" value="Apply">
                    </form>

                    @if (($msg = Session::get("msg")))
                    <div class="alert alert-danger mt-3 p-1">
                            {{$msg}}
                    </div>
                @endif
                </div>
            </div>
            @endif
        </div>
    </div>
      @else
          <h1>Cart is empty please buy more save more</h1>
      @endif
      @endauth

      @guest
          <H1>Sorry Cart is Empty Please Login for Access </H1>
      @endguest
    </div>

@endsection