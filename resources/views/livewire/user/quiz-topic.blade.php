

<div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4">
    @foreach ($quiztopic as $item)
        <div class="col sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
            <a href="{{ route('view.quizpage',["topic"=>$item->id]) }}" >
                <div class="categorie-grid categorie-style-3 color-primary-style">
                    <div class="content">
                        <div class="d-flex">
                            <img src="{{ asset('upload/'.$item->image) }}" class="ms-5" height="40px" width="40px" style="border-radius: 100px">
                        <div class="content ">
                            <h4 class="title ms-5 mt-3">{{ $item->name }}</h4>
                        </div>
                        </div>
                    </div>
                </div>
            </a>

        </div>
    @endforeach

</div>
