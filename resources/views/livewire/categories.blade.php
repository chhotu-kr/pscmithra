<div>
<div class=" mt-2">
        Mock Test
        </div>

    <div class="row">
       
        <div class="col ">
                <label for="" style="font-size: 12px">Category</label>
                <select wire:model="categoryId" id="category_id" name="mock[{{$iddd}}][cate]" class=" form-select">
                 <option value='-1'  >select</option>
                 @foreach ($category as $client)
                  <option value="{{$client->id}}">{{$client->category}}</option>
                 @endforeach
                </select>
            </div>
            <div class="col ">
                <label for="" style="font-size: 12px">SubCategory</label>
                <select wire:model="subcategory_id" name="mock[{{$iddd}}][sub]"  class="form-control">
                 <option value='-1' >select</option>
                    @foreach ($subcategories as $item)
                        <option value="{{$item->id}}">{{$item->subcategory}}</option>
                    @endforeach
                </select>
            </div>
     
        <div class="col " >
            <label style="font-size: 12px">Time Duration(In Days)</label>
           <input type="number" class="form-control" name="mock[{{$iddd}}][time]">
           </div>
           <div class="col ">
            <label style="font-size: 12px">No of Live Exam</label>
             <input type="number" class="form-control" name="mock[{{$iddd}}][N]">
           </div>
           {{-- <a class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</a> --}}

           <div class="col ">
            <br>
            <button class="btn btn-danger btn-sm" wire:click.prevent="removecall({{$iddd}})"> X </button>
        </div> 
        </div>
    </div>
</div>
