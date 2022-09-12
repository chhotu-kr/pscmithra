<div>
    <div class=" mt-2">
        Mock Test
    </div>

    <div class="row">

        <div class="col ">
            <label for="" style="font-size: 12px">Category</label>
            <select wire:model="smCatId" id="smCatId" name="sm[{{$iddd}}][cate]" class=" form-select">
                <option value='-1'>select</option>
                @foreach ($smCat as $client)
                <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col ">
            <label for="" style="font-size: 12px">Chapter</label>
            <select wire:model="smChapID" name="sm[{{$iddd}}][chap]" class="form-control">
                <option value='-1'>select</option>
                @foreach ($smChap as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col ">
            <label style="font-size: 12px">Time Duration(In Days)</label>
            <input type="number" class="form-control" name="sm[{{$iddd}}][time]">
        </div>
        <div class="col ">
            <br>
            <button class="btn btn-danger btn-sm" wire:click.prevent="removecall({{$iddd}})"> X </button>
        </div>
    </div>
</div>
</div>