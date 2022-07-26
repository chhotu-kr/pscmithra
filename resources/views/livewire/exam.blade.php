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
@endif
@endforeach
@foreach($inputs as $value)
@if($value['type']!="Live")
@livewire('categories', ["iass"=>$value['id']] ,key($value['id']))
@endif
@endforeach
@endif





</div>