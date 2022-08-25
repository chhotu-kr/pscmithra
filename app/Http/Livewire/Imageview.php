<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Imageview extends Component
{
public $image;  //  [image="url",sizeH= 25,sizew = 25]

public function mount($image){
    $this->image = $image;
}


    public function render()
    {
        return view('livewire.imageview');
    }
}
