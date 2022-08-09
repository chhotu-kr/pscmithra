<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
<div class="row mt-3 mb-3">
<div class = "col-lg ">

<label for="" class="">Category</label>
    <select wire:model="categoryId" id="category_id" name="category_id" class=" form-select  mt-3">
        <option >select</option>
        @foreach ($category as $client)
            <option value="{{$client->id}}">{{$client->category}}</option>
        @endforeach
        
    </select>
    


</div>

<div class = "col-lg">
<label for="" class="">SubCategory</label>
    <select wire:model="subcategory_id" name="subcategory_id"   class="form-control mt-3">
     <option>select</option>
        @foreach ($subcategories as $item)
            <option value="{{$item->id}}">{{$item->subcategory}}</option>
        @endforeach
    </select>
    </div>
    </div>
</div>
