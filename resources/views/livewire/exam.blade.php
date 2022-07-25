<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    
        <button type ="button" class="btn text-white btn-info btn-sm" wire:click.prevent="add()">Add</button>
       
               {{-- <div class="col-md-2">
                   
                    <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$i}})">Remove</button>
                </div> --}}
            
  @if(!empty($inputs))
        @foreach($inputs as $value)
         {{-- @if($inputs['type']=="Live")

--}}         
      

             @livewire('categories', ["iass"=>$value['id']] ,key($value['id'])) 
              
             
        


                   
                
            
        
        @endforeach
        @endif
        {{-- <button class="btn btn-danger btn-sm" wire:click.prevent="remove()">Remove</button> --}}
  
        
  

</div>
