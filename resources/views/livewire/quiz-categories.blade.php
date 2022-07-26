<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <label for="" class="">QuizCategory</label>
    <select wire:model="quizcategoryId" id="quiz_categories" name="quiz_categories" class=" form-select  mt-3">
        <option >select</option>
        @foreach ($quizcategory as $client)
            <option value="{{$client->id}}">{{$client->name}}</option>
        @endforeach
        
    </select>

@if(!empty($quizsubcategories))

    <label for="" class="mt-3">QuizSubCategory</label>
    <select wire:model="quizsubcategoryId" name="quiz_sub_categories"  class="form-control mt-3">
     <option>select</option>
        @foreach ($quizsubcategories as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    @if(!empty($quizchapters))
    <label for="" class="mt-3">QuizChapter</label>
    <select wire:model="quizchapter_id" name="quiz_chapters"  class="form-control mt-3">
     <option>select</option>
        @foreach ($quizchapters as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    @if(!empty($quiztopics))
    <label for="" class="mt-3">QuizTopic</label>
    <select name="quiz_topic"  class="form-control mt-3">
     <option>select</option>
        @foreach ($quiztopics as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    @endif
    @endif
    @endif
</div>
