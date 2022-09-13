<div>
    {{$typp}}

    <div class="col ">
        <label>Type</label>
        <select wire:model="typp" name="typp" class="form-control">
            <option value="">select</option>
            <option value="voice">Voice</option>
            <option value="text">Text</option>
            <option value="quiz">Quiz</option>
            <option value="video">Video</option>
        </select>
    </div>
    @if($typp=="voice")
    <div class="col">
        <label>Url</label>
        <input type="text" name="url" class="form-control">
    </div>
@elseif ($typp=="video")
    <div class="col">
        <label>Url</label>
        <input type="text" name="url" class="form-control">
    </div>
    @endif



</div>