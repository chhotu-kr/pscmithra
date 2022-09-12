<div>
<div class=" mt-2">
        Quiz
        </div>
    <div class="row">
        <div class="col ">
            <label style="font-size: 12px" class="">QuizCategory</label>
            <select wire:model="quizcategoryId" id="quiz_categories" name="quiz[{{$iddd}}][cate]" class=" form-select">
                <option value="">select</option>
                @foreach ($quizcategory as $client)
                <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach

            </select>
        </div>

        <div class="col ">
            <label style="font-size: 12px">QuizSubCategory</label>
            <select wire:model="quizsubcategoryId" name="quiz[{{$iddd}}][sub]" class="form-control">
                <option value="">select</option>
                @foreach ($quizsubcategories as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col ">
            <label style="font-size: 12px">QuizChapter</label>
            <select wire:model="quizchapter_id" name="quiz[{{$iddd}}][chap]" class="form-control">
                <option value="">select</option>
                @foreach ($quizchapters as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col ">
            <label style="font-size: 12px">QuizTopic</label>
            <select name="quiz[{{$iddd}}][topic]" class="form-control">
                <option value="">select</option>
                @foreach ($quiztopics as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col ">
            <label style="font-size: 12px">For Days</label>
            <input type="number" class="form-control" name="quiz[{{$iddd}}][time]">
        </div>
        <div class="col ">
            <label style="font-size: 12px">No of Live Exam</label>
            <input type="number" class="form-control" name="quiz[{{$iddd}}][N]">
        </div>


        <div class="col-1 ">
        
<Br>
            <button class="btn btn-danger btn-sm"  wire:click.prevent="removecall({{$iddd}})"> X </button>
        </div>
    </div>
</div>