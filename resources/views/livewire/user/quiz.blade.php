

<div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4">
    @foreach ($quizsubcategory as $item)
        <div class="col sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
            <a href="{{ route('view.quizchapter',$item->id) }}" >
                <div class="categorie-grid categorie-style-3 color-primary-style">
                    <div class="icon">
                        <i class="icon-9"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">{{ $item->name }}</h5>
                    </div>
                </div>
            </a>

        </div>
    @endforeach

</div>
