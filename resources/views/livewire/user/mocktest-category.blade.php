  {{-- <div class="col-2"> --}}

  {{-- <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @foreach ($category as $item)
                @if ($item->id == $idd)
                    <a href="{{route('view.categorydetails',$item->id)}}"  id="{{ $item->slugid }}" data-bs-toggle="pill" data-bs-target="#tab-{{ $item->slugid }}"
                        type="button" role="tab" aria-controls="tab-{{ $item->slugid }}"
                        class="nav-link active">{{ $item->category }}</a>
                @else
                    <a href="{{route('view.categorydetails',$item->id)}}" id="{{ $item->slugid }}" data-bs-toggle="pill" data-bs-target="#tab-{{ $item->slugid }}"
                        type="button" role="tab" aria-controls="tab-{{ $item->slugid }}"
                        class="nav-link">{{ $item->category }}</a>
                @endif
            @endforeach
        </div> --}}

  {{-- <div class="tab-content current" id="v-pills-tabContent">


            @foreach ($category as $item)
                @if ($item->id == $idd)
                    <div class="tab-pane fade show active" id="tab-{{ $item->slugid }}" role="tabpanel">
                    @else
                        <div class="tab-pane fade show " id="tab-{{ $item->slugid }}" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                @endif
                <div class="row">
                    @foreach ($item->subcat as $value)
                        <div class="col-lg-3 col-md-6">
                            <div class="categorie-grid categorie-style-2">
                                <div class="icon">
                                    <img src="{{ asset('upload/' . $value->image) }}" width="40" height="40">
                                </div>
                                <div class="content">
                                    <h5 class="title"> {{ $value->subcategory }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

        </div>
        @endforeach --}}

  {{-- </div>
  </div> --}}
  {{-- </div> --}}

  {{-- <div class="container mt-5">
      <div id="tab-1" class="tab-content current">
          <div class="row">
              @foreach ($subcat as $item)
                  <div class="col-lg-3 col-md-6">

                      <div class="card p-3">
                          <div class="card-body">
                              <div class="content">
                                  <h5 class="title ">{{ $item->subcategory }}</h5>
                                  <p>{{ $item->category->category }}</p>
                                  <ul class="Attempt-sec">
                                      <li class="flex ttc mv-0-67 mv-0-50-l "><span>Questions</span><span
                                              class="ml-auto">100</span></li>
                                      <li class="flex mv-0-67 mv-0-50-l "><span>Max Marks</span><span
                                              class="ml-auto">100</span></li>
                                      <li class="flex mv-0-67 mv-0-50-l "><span>Time</span><span class="ml-auto">90
                                              mins</span></li>
                                  </ul>
                                  <a href="{{ route('view.mocktestexam', ['cat_id' => $idd, 'sub_cat_id' => $item->id]) }}"
                                      class="education-btn btn-medium">Attempt<i class="icon-4"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
              @endforeach --}}

    
   <div class="container">
    <div class="col-12">
        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4">
            @foreach ($subcat as $item)
                <div class="col sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                    <a href="{{ route('view.mocktestexam', ['cat_id' => $idd, 'sub_cat_id' => $item->id]) }}">
                        <div class="categorie-grid categorie-style-3 color-primary-style">
                            <div class="d-flex">
                                <img src="{{ asset('upload/'.$item->image) }}" class="ms-5" height="40px" width="40px" style="border-radius: 100px">
                            <div class="content ">
                                <h4 class="title ms-5 mt-3">{{ $item->subcategory }}</h4>
                            </div>
                            </div>
                        </div>
                    </a>
    
                </div>
            @endforeach
    
        </div>
    </div>
   </div>
