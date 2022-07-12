@extends('user.base')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                <div class="card mt-3">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($category as $cat)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed ps-3" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#rocking{{ $loop->iteration }}" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        {{ $cat->category }}
                                    </button>
                                </h2>
                                @foreach ($cat->subcat as $sub)
                                    <div id="rocking{{ $loop->parent->iteration }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <a href="{{ route('exam.filter', ['id' => $sub->id]) }}"
                                                class="nav-link">{{ $sub->subcategory }}</a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-8">
                @foreach ($examination as $item)
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <h3>{{ $item->subcategory->subcategory }}</h3>

                                </div>
                                <div class="col-3">
                                    <h3>{{ $item->category->category }}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h3>exam-{{ $item->exam->examname }}</h3>
                                </div>
                                <div class="col-3">
                                    <h3>{{ $item->exam_name }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    @include('user.footer')
@endsection
