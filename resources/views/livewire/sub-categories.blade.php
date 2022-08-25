<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <label for="" class="">Subject</label>
    <select wire:model="categoryId" id="subject_id" name="subject_id" class=" form-select  mt-3">
        <option >select</option>
        @foreach ($category as $client)
            <option value="{{$client->id}}">{{$client->sub_name}}</option>
        @endforeach
        
    </select>
    <label for="" class="mt-3">Topic</label>
    <select wire:model="subcategory_id" name="topic_id" id="ikkkkk"  class="form-control mt-3">
     <option>select</option>
        @foreach ($subcategories as $item)
            <option value="{{$item->id}}">{{$item->topic_name}}</option>
        @endforeach
    </select>
</div>
