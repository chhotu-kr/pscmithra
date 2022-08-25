<div>
    @foreach ($data as $index => $dataa)

<div class="row">
<div class="col-lg-2 position-relative"><label for="addbutton" class="form-label card-title">Language_id</label> 
        <select class="form-select" name="data[{{$index}}][lang]" wire:model="data.{{$index}}.lang" id ="lang{{$index}}"required>
            <option selected value="">Select Language</option>
            @foreach ($lang as $item)
            <option value="{{$item->id}}">{{$item->languagename}}</option>
            @endforeach

        </select>
    </div>
    <div class="col-lg col bottom "style="align-self: end;">
        <a wire:click="removeProduct({{$index}})" class="btn  btn-danger">Remove Question</a>
    </div>
</div>

    



  
    <div>
        <div wire:ignore>
            <h6 class="card-title">Question</h6>
            <textarea class="question" id="question{{$index}}" name="data[{{$index}}][question]" class="form-control" wire:model="data.{{$index}}.question"></textarea>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div wire:ignore class="col">
            <h6 class="card-title">Option 1</h6>
            <textarea class="opt" id="opt1{{$index}}" name="data[{{$index}}][opt1]" class="form-control" wire:model="data.{{$index}}.opt1"></textarea>
        </div>
        <div wire:ignore class="col">
            <h6 class="card-title">Option 2</h6>
            <textarea class="opt" id="opt2{{$index}}" name="data[{{$index}}][opt2]" class="form-control" wire:model="data.{{$index}}.opt2"></textarea>
        </div>
    </div>
    <div class="row mt-3 mb-3">
        <div wire:ignore class="col">
            <h6 class="card-title">Option 3</h6>
            <textarea class="opt" id="opt3{{$index}}" name="data[{{$index}}][opt3]" class="form-control" wire:model="data.{{$index}}.opt3"></textarea>
        </div>
        <div wire:ignore class="col">
            <h6 class="card-title">Option 4</h6>
            <textarea class="opt" id="opt4{{$index}}" name="data[{{$index}}][opt4]" class="form-control" wire:model="data.{{$index}}.opt4"></textarea>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div wire:ignore class="col">
            <h6 class="card-title">Explanation</h6>
            <textarea class="opt" id="explain{{$index}}" name="data[{{$index}}][exp]" class="form-control" wire:model="data.{{$index}}.exp"></textarea>
        </div>
        <div wire:ignore class="col">
            <h6 class="card-title">Direction</h6>
            <textarea class="opt" id="direction{{$index}}" name="data[{{$index}}][dir]" class="form-control" wire:model="data.{{$index}}.dir"></textarea>
        </div>
    </div>


    @if($index==0)
    <script>
        tinymce.remove();
    </script>
    @endif
    <script>
        tinymce.init({
            selector: 'textarea.question', // change this value according to your HTML
            min_height: 200,


        });

        tinymce.init({
            selector: 'textarea.opt', // change this value according to your HTML
            min_height: 200,


        });
    </script>
    @endforeach
    <a wire:click="add" class=" btn btn-primary">Add Question</a>
</div>