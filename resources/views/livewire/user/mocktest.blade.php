<div class="row">
  <div class="col-2">

    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @foreach ($category as $item)
                @if ($item->id == $idd)
                    <button  id="{{ $item->slugid }}" data-bs-toggle="pill" data-bs-target="#tab-{{ $item->slugid }}"
                        type="button" role="tab" aria-controls="tab-{{ $item->slugid }}"
                        class="nav-link active">{{ $item->category }}</button>
                @else
                    <button wire:click="$emit('id',$item->id)" id="{{ $item->slugid }}" data-bs-toggle="pill" data-bs-target="#tab-{{ $item->slugid }}"
                        type="button" role="tab" aria-controls="tab-{{ $item->slugid }}"
                        class="nav-link">{{ $item->category }}</button>
                @endif
            @endforeach
        </div>

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

    </div>
  </div>
  <div class="col-10">
    <div class="row">
      @foreach ($subcat as $value)
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
</div>
