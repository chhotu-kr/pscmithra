@extends('user/dashboard')
@section('pscmithra')
  
    <div class="features-area-3">
        <div class="container">
            <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up"
                data-sal-duration="800">
                <h2 class="title">Online Quizes <span class="color-primary">Series</span></h2>
            </div>
            <div class="features-grid-wrap">
                <div class="features-box features-style-3 color-primary-style edublink-svg-animate">
                    <div class="icon">
                        <img class="svgInject"
                            src="{{ asset('nassets/images/animated-svg-icons/scholarship-facility.svg') }}"
                            alt="animated icon">
                        <!-- <i class="icon-34"></i> -->
                    </div>
                    <div class="content">
                        <h4 class="title">Scholarship Facility</h4>
                        <p>Lorem ipsum dolor sit amet cont adipiscing elit.</p>
                    </div>
                </div>
                <div class="features-box features-style-3 color-secondary-style edublink-svg-animate">
                    <div class="icon">
                        <img class="svgInject" src="{{ asset('nassets/images/animated-svg-icons/skilled-lecturers.svg') }}"
                            alt="animated icon">
                    </div>
                    <div class="content">
                        <h4 class="title">Skilled Lecturers</h4>
                        <p>Lorem ipsum dolor sit amet cont adipiscing elit.</p>
                    </div>
                </div>
                <div class="features-box features-style-3 color-extra02-style edublink-svg-animate">
                    <div class="icon">
                        <img class="svgInject" src="{{ asset('nassets/images/animated-svg-icons/book-library.svg') }}"
                            alt="animated icon">
                        <!-- <i class="icon-36"></i> -->
                    </div>
                    <div class="content">
                        <h4 class="title">Book Library &amp; Store</h4>
                        <p>Lorem ipsum dolor sit amet cont adipiscing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="education-categorie-area categorie-area-3 education-section-gap bg-image bg-image-4 " id="categories">
        <div class="container mb-5">
            <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up"
                data-sal-duration="800">
                <h2 class="title">Select Your <span class="color-primary">Quizes Category</span></h2>
            </div>
            <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4 p-5" style="margin-top: -50px">
                @foreach ($quizcat as $item)
                    <div class="col-md-2 col sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <a href="{{ route('view.quizdetails', $item->id) }}">
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
        </div>


        @livewire('user.categoryslider')
    </div>
@endsection

