<div>
    {{-- Care about people's approval and you will be their prisoner. --}}


    <div class="row">
        <div class="col col-lg-2">
            <button type="button" class="btn text-white btn-info btn-sm" wire:click.prevent="add('asdasd')">Add MockTest</button>
        </div>
        <div class="col col-lg-2">
            <button type="button" class="btn text-white btn-info btn-sm" wire:click.prevent="add('Live')">Add LiveTest</button>
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
    <div class="col-2 " >
        <label style="font-size: 12px">Time Duration(In Days)</label>
       <input type="number" class="form-control" name="liveD">
       </div>
       <div class="col-2">
        <label style="font-size: 12px">No of Live Exam</label>
         <input type="number" class="form-control" name="liveN">
       </div>
       <div class="col-2 ">
        <button class="btn btn-danger btn-sm" wire:click.prevent="remove_mocktest({{$value['id']}})"> X </button>
    </div> 
</div>
@endif
@endforeach
@foreach($inputs as $value)
@if($value['type']!="Live")
<h6>Mock Test</h6>

@livewire('categories', ["iass"=>$value['id']] ,key($value['id']))
@endif
@endforeach
@endif





</div>