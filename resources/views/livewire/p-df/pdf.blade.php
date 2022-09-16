<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <div class="row">
        @foreach ($data as $item)
        <div class="col-lg-3 col-md-6">
            <div class="categorie-grid categorie-style-2">
               <div class="content">
                <h5 class="title">{{$item['name']}}</h5>
               </div>
                
                <div class="content">
                    <h5 class="title">{{$item['pdf_url']}}</h5>
                  
                </div>
               
            </div>
        </div>
        @endforeach
    </div>
</div>
