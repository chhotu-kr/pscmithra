<div>
<div class="row">
<div class="col-2 mt-3">
    <label for="" class="">QuizCategory</label>
    <select wire:model="quizcategoryId" id="quiz_categories" name="category_id[]" class=" form-select  mt-3">
        <option value="" >select</option>
        @foreach ($quizcategory as $client)
            <option value="{{$client->id}}">{{$client->name}}</option>
        @endforeach
        
    </select>
</div>

<div class="col-2 mt-3">
    <label for="" class="mt-3">QuizSubCategory</label>
    <select wire:model="quizsubcategoryId" name="subcategory_id[]"  class="form-control mt-3">
     <option value="">select</option>
        @foreach ($quizsubcategories as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>
<div class="col-2 mt-3">
    <label for="" class="mt-3">QuizChapter</label>
    <select wire:model="quizchapter_id" name="chapters[]"  class="form-control mt-3">
     <option value="">select</option>
        @foreach ($quizchapters as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>
<div class="col-2 mt-3">
    <label for="" class="mt-3">QuizTopic</label>
    <select name="topic[]"   class="form-control mt-3">
     <option value="">select</option>
        @foreach ($quiztopics as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>
<div class="col-2 mt-3" >
            <label style="font-size: 12px">Time Duration(In Days)</label>
           <input type="number" class="form-control" name="mocktestD[]">
           </div>
           <div class="col-2 mt-3">
            <label style="font-size: 12px">No of Live Exam</label>
             <input type="number" class="form-control" name="mocktestN[]">
           </div>
           {{-- <a class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</a> --}}

           <div class="col-2 mt-6">
            <button class="btn btn-danger btn-sm" style="margin-top: 30%" wire:click.prevent="removecall({{$iddd}})"> X </button>
        </div> 
</div>
</div>    