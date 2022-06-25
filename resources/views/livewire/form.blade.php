<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
      <select name="language_id" id="templates" class="form-select">
        <option value="" class="">Choose your lnguage</option>
        @foreach ($language as $item)
            <option value="$item->id">{{$item->languagename}}</option>
        @endforeach
      </select>

</div>
