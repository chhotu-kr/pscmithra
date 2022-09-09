<div>
        <ul class="tabs tabSliderCat">
            <li class="tab-link current" data-tab="tab-1" wire:click.prevent="onSelect({{ 0 }})">
                All
            </li>
            @foreach ($cat as $item)
                <li class="tab-link current" data-tab="tab-1" >
                    {{ $item->category }}
                </li>
            @endforeach

        </ul>


<div id="tab-1" class="tab-content current">

        <div class="row">
            @foreach ($sub_cat as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="categorie-grid categorie-style-2">
                        <div class="icon">
                            {{-- <img src="img/grpimg-1.png"> --}}
                            @livewire('imageview', ['image' => ['image' => $item->image, 'w' => '50', 'h' => '50']], key($item->id))
                        </div>
                        <div class="content">
                            <h5 class="title">{{ $item->subcategory }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

</div>
