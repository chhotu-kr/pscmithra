<div>
    @foreach ($order as $item)
   {{-- {{ dd($item)}} --}}
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card">
                <div class="row g-0">
                    <div class="col-3">
                        <img src="{{ asset('images/' . $item->product->bannerimage) }}" class="w-100"
                            alt="">
                    </div>

                    <div class="col-9 card-body">
                        <h5>{{ $item->product->title }}</h5>
                        <p>{{ $item->product->subject->sub_name }}</p>
                        <h6>{{ $item->product->price }}</h6>
                        <a wire:click.prevent="removeFromCart('{{ $item->products_id }}')" class="btn btn-danger cursor-pointer">-</a>
                        <span class="lead fw-bolder">{{ $item->qty }}</span>
                        <a wire:click.prevent="addtoCart('{{ $item->products_id }}')"
                            class="btn btn-success">+</a>
                        <a wire:click.prevent="removeitemfromCart('{{ $item->products_id }}')"
                            class="btn btn-dark float-end">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
