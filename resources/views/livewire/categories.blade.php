<div>
    <div class="row">
        <div class="col-2 mt-3">
                <label for="" style="font-size: 12px">Category</label>
                <select wire:model="categoryId" id="category_id" name="category_id" class=" form-select">
                 <option >select</option>
                 @foreach ($category as $client)
                  <option value="{{$client->id}}">{{$client->category}}</option>
                 @endforeach
            
                </select>
            </div>
            <div class="col-2 mt-3">
                <label for="" style="font-size: 12px">SubCategory</label>
                <select wire:model="subcategory_id" name="subcategory_id"  class="form-control">
                 <option>select</option>
                    @foreach ($subcategories as $item)
                        <option value="{{$item->id}}">{{$item->subcategory}}</option>
                    @endforeach
                </select>
            </div>
     
        <div class="col-2 mt-3" >
            <label style="font-size: 12px">Time Duration(In Days)</label>
           <input type="number" class="form-control" name="liveexamduration">
           </div>
           <div class="col-2 mt-3">
            <label style="font-size: 12px">No of Live Exam</label>
             <input type="number" class="form-control" name="liveexam">
           </div>
           {{-- <a class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</a> --}}

           <div class="col-2 mt-6">
            <button class="btn btn-danger btn-sm" wire:click.prevent="removecall({{$iddd}})"> X </button>
        </div> 
        </div>
    </div>
</div>
