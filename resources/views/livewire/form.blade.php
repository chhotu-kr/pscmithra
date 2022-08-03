<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
      {{-- <select name="language_id" id="templates" class="form-select">
        <option value="" class="">Choose your lnguage</option>
        @foreach ($language as $item)
            <option value="$item->id">{{$item->languagename}}</option>
        @endforeach
      </select> --}}

    <div class="col-lg-12">

       @foreach ($category as $item)
      @livewire('vcategories', ["id"=>$item['id'],"Name"=>$item['category']] ,key($item['id']))
       @endforeach
    </div>

</div>
