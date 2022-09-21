<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    
    <div class="row">
        @foreach ($data as $item)
        <div class="col-lg-3 col-md-6">
            <div class="categorie-grid categorie-style-2">
               <div class="content">
                <h5 class="title">{{$item['name']}}</h5>
               </div>
                
                <div class="content">
                    <h5 class="title">{{$item['url']}}</h5>
                  
                </div>
               
            </div>
        </div>
        @endforeach
    </div>
</div>
