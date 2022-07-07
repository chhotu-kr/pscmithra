@extends('user.base')
@section('content')
    <div class="container">
        <div class="row">
                @foreach ($product as $item)
                <div class="col-3">

                    <div class="card mt-5">
                        <img src="{{ asset('images/' . $item->bannerimage) }}" class="w-100" alt=""
                        style="height:213px; object-fit:cover">
                        <div class="card-body">
                            <h4>MATHS FORMULA</h4>
                            <P>MARKS:36 <span class="float-end">30 min</span></P>
                            <span>
                                <a href="" class="btn btn-warning stretched-link">START EXAM</a>
                                <a href="" class="">Price : Rp 100</a>
                            </span>
                        </div>
                    </div>
                </div>

                @endforeach
        </div>
    </div>
@endsection
