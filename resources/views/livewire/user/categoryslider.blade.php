<div>
    <div class="edu-gallery-area education-section-gap" style="background: transparent;">
        <div class="container">
            <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                <h2 class="title">All Test Series & <span class="color-primary">Mock Tests</span></h2>
            </div>

            <div class="tabigationLink">

                <ul class="tabs tabSliderCat">
                    <li class="tab-link current" data-tab="tab-All">
                        All
                    </li>
                    @foreach ($cat as $item)
                    <li class="tab-link " data-tab="tab-{{$item->slugid}}">
                        {{$item->category}}
                    </li>
                    @endforeach
                </ul>
                <div id="tab-All" class="tab-content current">
                    <div class="row">

                        @foreach($cat as $item)
                        @foreach($item->subcat as $value)

                        <div class="col-lg-3 col-md-6">
                            <div class="categorie-grid categorie-style-2">
                                <div class="icon">
                                    @livewire('imageview', ['image' => ['image' => $value->image,'w'=>'50','h'=>'50']], key($item->id))
                                </div>
                                <div class="content">
                                    <h5 class="title">{{$value->subcategory}}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>

                </div>
                @foreach($cat as $item)
                <div id="tab-{{$item->slugid}}" class="tab-content">
                    <div class="row">
                        @foreach($item->subcat as $value)

                        <div class="col-lg-3 col-md-6">
                            <div class="categorie-grid categorie-style-2">
                                <div class="icon">
                                    @livewire('imageview', ['image' => ['image' => $value->image,'w'=>'50','h'=>'50']], key($item->id))
                                </div>
                                <div class="content">
                                    <h5 class="title">{{$value->subcategory}}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
                @endforeach




            </div>
        </div>
    </div>