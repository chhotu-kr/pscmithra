@extends('user/dashboard')
@section('pscmithra')
    <div class="container-fluid bg-success  p-2 shadow sticky-top">
        <div class="container">
            <h4 class="h2 fw-lighter">Your cart</h4>
        </div>
    </div>
    {{-- {{ json_encode($order) }} --}}
    <div class="container mt-3">
        @auth
            @if ($order)
                @livewire('user.cart-card')
            @else
                <h1>Cart is empty please buy more save more</h1>
            @endif
        @endauth

        @guest
            <H1>Sorry Cart is Empty Please Login for Access </H1>
        @endguest
    </div>
@endsection
