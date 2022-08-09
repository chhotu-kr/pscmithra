<div>
    <div class="row mt-3"><div class="col">
    <label for="" class="">Subject</label>
    <select wire:model="subjectId" id="subject_id" name="subject_id" class=" form-select  mt-3" required>
        <option value="" >select</option>
        @foreach ($subject as $client)
            <option value="{{$client->id}}">{{$client->sub_name}}</option>
        @endforeach
        
    </select>
    </div>
    <div class="col">
    <label for="">Topic</label>
    <select wire:model="topic_id"  name="topic_id" id="ikkkkk"  class="form-control mt-3" required>
     <option value="">select</option>
        @foreach ($topics as $item)
            <option value="{{$item->id}}">{{$item->topic_name}}</option>
        @endforeach
    </select>
    </div></div>
</div>
