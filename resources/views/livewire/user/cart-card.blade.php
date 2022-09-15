<div>

    <div class="row">
        <div class="col-8">
            @foreach ($order as $item)
                {{-- {{ dd($item)}} --}}
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-3">
                                    <img src="{{ asset('upload/' . $item->product->bannerimage) }}" class="w-100"
                                        alt="">
                                </div>

                                <div class="col-9 card-body">
                                    <a wire:click.prevent="removeitemfromCart('{{ $item->products_id }}')"
                                        class="btn btn-dark float-end">Delete</a>
                                    <h5>{{ $item->product->title }}</h5>
                                    <p>{{ $item->product->subject->sub_name }}</p>
                                    <h6>{{ $item->product->price }}</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="col-4">
            <div class="list-group">
                <div class="list-group-item list-group-item-action">Total Amount <span class="float-end">Rs.
                        {{ $total['totalAmount'] }}/-</span></div>
                <div class="list-group-item list-group-item-action bg-success text-white">Total Discount Amount<span
                        class="float-end">Rs. {{ $total['discount'] }}/-</span></div>
                <div class="list-group-item list-group-item-action ">Tax (18%) <span class="float-end">Rs.
                    {{ $total['gst'] }}</span></div>
                {{-- @if ($order->coupon_id != null)

                            <div class="list-group-item list-group-item-action  bg-warning text-dark">Coupon discount <span
                                    class="float-end">Rs. 7686/- <a href=""
                                        class="text-danger fw-bold text-decoration-none" title="Remove Coupon Code">X</a></span>
                            </div>

                        @endif --}}

                <div class="list-group-item list-group-item-action">Payable Amount <span class="float-end">Rs.
                    {{ $total['payableAmount'] }}/-</span> </div>
            </div>
            <div class="row mt-3 px-2">
                <a href="" class="btn btn-success col">Continue Shopping</a>
                <a href="" wire:click.prevent="checkout()" class="btn btn-danger col ms-2">checkout</a>
                <p class="text-danger mt-2"> {!! Session::get('add') !!}</p>
            </div>


            <div class="card mt-3">
                <div class="card-body">
    {{-- {{ json_encode($total) }} --}}
                    <h6 class="lead">Have any Coupon?</h6>
                    <form  class="d-flex">
                       
                        <input type="text" placeholder="Enter Code" wire:model="code" name="code" 
                            class="form-control">
                    
                    </form>
                </div>

            </div>
            {!! Session::get('coupon') !!}

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="btn btn-danger float-end" wire:click.prevent="changeStatus()">Add New Address</div>
            <h4>Address Fill</h4>
            <div class="row">
                @if ($status == true)
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <form wire:submit.prevent="addAddress()">
                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <label for="">Name</label>
                                            <input type="text" wire:model="name"
                                                class="form-control" placeholder="Enter Your Name">
                                            @error('name')
                                                <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                     
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <label for="">Street / Village</label>
                                            <input type="text" wire:model="street"
                                                class="form-control" placeholder="Enter Street">
                                            @error('street')
                                                <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="">LandMark</label>
                                            <input type="text" wire:model="landmark" 
                                                class="form-control" placeholder="Enter Landmark">
                                            @error('landmark')
                                                <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <label for="">City</label>
                                            <input type="text" wire:model="city" 
                                                class="form-control" placeholder="Enter City">
                                            @error('city')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="">State</label>
                                            <input type="text" wire:model="state" 
                                                class="form-control" placeholder="Enter State">
                                            @error('state')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <label for="">Pincode</label>
                                            <input type="text" wire:model="pincode" 
                                                class="form-control" placeholder="Enter Pincode">
                                            @error('pincode')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="">Address Type</label>
                                            <select wire:model="type" class="form-select">
                                                <option value="office">Office</option>
                                                <option value="home">Home</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <input type="submit" value="Add to" class="btn btn-success w-100">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
                @if (!empty($address[0]))

                    <div class="col-lg-4 ">
                        @foreach ($address as $item)
                            <div style="cursor: pointer" wire:click.prevent="addressSelect('{{ $item->id }}')"
                                class="card mt-3  
                                @if ($item->type == 'home'  ) 
                                border border-success
                                @if ($addressSelected == $item->id)
                                    border-2
                                  
                                @endif
                                @else border border-danger
                                 @if ($addressSelected == $item->id)
                                    border-2
                                @endif
                                @endif bg-light"
                        >
                                <div class="card-body">
                                    <span
                                        class="
                                @if ($item->type == 'home') bg-success
                             @else bg-danger @endif badge position-absolute shadow-sm text-capitalize"
                                        style="right:0;border-radius:5px 0px 0px 5px">
                                        {{ $item->type }}
                                    </span>
                                    <h5>{{ $item->name }} ({{ $item->contact }})</h5>
                                    <p class="small mb-0">{{ $item->street }} <br>{{ $item->city }}
                                        ({{ $item->state }})
                                        -
                                        {{ $item->pincode }}</p>
                                    <p class="small mb-0">LandMark: {{ $item->landmark }}</p>

                                </div>
                            </div>
                        @endforeach

                    </div>
            </div>
        @else
            <h5>Add a address to checkout!</h5>
            @endif

        </div>




    </div>



</div>
