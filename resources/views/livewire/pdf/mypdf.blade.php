<div>
    {{-- The best athlete wants his opponent at his best. --}}

    <div class="row">
        {{$data}}
        @foreach ($data as $item)
        <div class="col-lg-3 col-md-6">
            <div class="categorie-grid categorie-style-2">
               <div class="content">
                {{-- <h5 class="title">{{$item['name']}}</h5> --}}
               </div>
                
                <div class="content">
                    {{-- <h5 class="title">{{$data}}</h5> --}}
                  
                </div>
               
            </div>
        </div>
        @endforeach
    </div>
</div>
