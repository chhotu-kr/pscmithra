@extends('user.dashboard')
@section('pscmithra')
    <div class="education-breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="page-title">
                    <h1 class="title">Attempt</h1>
                </div>
                <ul class="education-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('view.home') }}">Home</a></li>
                    <li class="separator"><i class="icon-angle-right"></i></li>
                    <li class="breadcrumb-item active" aria-current="page">Attempt</li>
                </ul>
            </div>
        </div>
        <ul class="shape-group">
            <li class="shape-1"><img src="{{ asset('nassets/images/about/shape-22.png" alt="shape') }}"></li>
            <li class="shape-2 scene"><img data-depth="2" src="{{ asset('nassets/images/about/shape-13.png') }}"
                    alt="shape"></li>
            <li class="shape-3 scene"><img data-depth="-2" src="{{ asset('nassets/images/about/shape-15.png') }}"
                    alt="shape"></li>
            <li class="shape-4"><img src="{{ asset('nassets/images/about/shape-22.png" alt="shape') }}"></li>
            <li class="shape-5 scene"><img data-depth="2" src="{{ asset('nassets/images/about/shape-07.png') }}"
                    alt="shape"></li>
        </ul>
    </div>




    <div class="education-categorie-area categorie-area-3 education-section-gap bg-image bg-image--4" id="categories">
        <div class="container">
            <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up"
                data-sal-duration="800">
                <h2 class="title">Attempt Free <span class="color-primary">{{ $cat->subcategory }} Exam Mock Text</span>
                </h2>
            </div>
            <div class="col-12 ms-3 ">
                <div id="tab-1" class="tab-content current">
                    <div class="row">
                        @livewire('user.mocktest', ['cat_id' => $cat_id, 'sub_cat_id' => $sub_cat_id])
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="education-categorie-area categorie-area-3 education-section-gap bg-image bg-image--4" id="categories">
            <div class="container">
                <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up"
                    data-sal-duration="800">
                    <h2 class="title">Recommended Quizes <span class="color-primary"> Category</span></h2>
                </div>
                <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4">
                    <div class="col sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <a href="category-details.php">
                            <div class="categorie-grid categorie-style-3 color-primary-style">
                                <div class="icon">
                                    <i class="icon-9"></i>
                                </div>
                                <div class="content">
                                    <h5 class="title">PO, Clerk, SO, Insurance</h5>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="col sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <a href="category-details.php">
                            <div class="categorie-grid categorie-style-3 color-secondary-style">
                                <div class="icon">
                                    <i class="icon-10"></i>
                                </div>
                                <div class="content">
                                    <h5 class="title">Regulatory Bodies</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col sal-animate" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                        <a href="category-details.php">
                            <div class="categorie-grid categorie-style-3 color-extra04-style">
                                <div class="icon">
                                    <i class="icon-11"></i>
                                </div>
                                <div class="content">
                                    <h5 class="title">SSC &amp; Railway</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col sal-animate" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                        <a href="category-details.php">
                            <div class="categorie-grid categorie-style-3 color-tertiary-style">
                                <div class="icon">
                                    <i class="icon-12"></i>
                                </div>
                                <div class="content">
                                    <h5 class="title">GATE &amp; PSU CS</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col sal-animate" data-sal-delay="300" data-sal="slide-up" data-sal-duration="800">
                        <a href="category-details.php">
                            <div class="categorie-grid categorie-style-3 color-extra02-style">
                                <div class="icon">
                                    <i class="icon-13"></i>
                                </div>
                                <div class="content">
                                    <h5 class="title">ESE &amp; GATE EE</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <a href="category-details.php">
                            <div class="categorie-grid categorie-style-3 color-extra07-style">
                                <div class="icon design-pencil-icon">
                                    <i class="icon-42"></i>
                                </div>
                                <div class="content">
                                    <h5 class="title">ESE &amp; GATE EC</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <a href="category-details.php">
                            <div class="categorie-grid categorie-style-3 color-extra06-style">
                                <div class="icon">
                                    <i class="icon-14"></i>
                                </div>
                                <div class="content">
                                    <h5 class="title">ESE &amp; GATE ME</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col sal-animate" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                        <a href="category-details.php">
                            <div class="categorie-grid categorie-style-3 color-extra03-style">
                                <div class="icon laptop-icon">
                                    <i class="icon-16"></i>
                                </div>
                                <div class="content">
                                    <h5 class="title">ESE &amp; GATE CE</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col sal-animate" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                        <a href="category-details.php">
                            <div class="categorie-grid categorie-style-3 color-extra01-style">
                                <div class="icon">
                                    <i class="icon-17"></i>
                                </div>
                                <div class="content">
                                    <h5 class="title">Photography</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col sal-animate" data-sal-delay="300" data-sal="slide-up" data-sal-duration="800">
                        <a href="category-details.php">
                            <div class="categorie-grid categorie-style-3 color-extra05-style">
                                <div class="icon">
                                    <i class="icon-43"></i>
                                </div>
                                <div class="content">
                                    <h5 class="title">Music Class</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
@endsection
