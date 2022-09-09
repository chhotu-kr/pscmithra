<div>
    <div class="row mt-2">
        <div class="col-auto">
            <button type="button" class="btn text-white btn-info btn-sm mt-2" wire:click.prevent="add('mock')">Add MockTest</button>
        </div>
        <div class="col-auto">
            <button type="button" class="btn text-white btn-info btn-sm mt-2" wire:click.prevent="add('Live')">Add LiveTest</button>
        </div>
        <div class="col-auto ">
            <button type="button" class="btn text-white btn-info btn-sm mt-2" wire:click.prevent="add('Quiz')">Add Quiz</button>
        </div>
        <div class="col-auto">            <button type="button" class="btn text-white btn-info btn-sm mt-2" wire:click.prevent="add('StudyMaterial')">Add Study Material</button>
        </div>

    </div>

    {{-- <div class="col-md-2">
                   
                    <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$i}})">Remove</button>
</div> --}}

@if(!empty($inputs))

@foreach($inputs as $value)
@if($value['type']=="Live")
<h6>Live Exam</h6>
<div class="row">
    <div class="col-auto " >
        <label style="font-size: 12px">Time Duration(In Days)</label>
       <input type="number" class="form-control" name="liveD">
       </div>
       <div class="col-auto">
        <label style="font-size: 12px">No of Live Exam</label>
         <input type="number" class="form-control" name="liveN">
       </div>
       <div class="col-auto ">
        <button class="btn btn-danger btn-sm mt-4" wire:click.prevent="remove_mocktest({{$value['id']}})"> X </button>
    </div> 
</div>
@endif
@endforeach
@foreach($inputs as $value)
@if($value['type']=="mock")
@livewire('categories', ["iass"=>$value['id']] ,key($value['id']))
@elseif($value['type']=="Quiz")
@livewire('admin.product.quiz', ["iass"=>$value['id']] ,key($value['id']))
@elseif($value['type']=="StudyMaterial")
@livewire('StudyMaterial', ["iass"=>$value['id']] ,key($value['id']))
@endif
@endforeach
@endif





</div>