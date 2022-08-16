<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Examination;
class Examtype extends Component
{

    public $examType;

public $type;
public $list;
public function updatedexamType(){
    if ($this->examType=='live'){
        $this->list=Examination::all();
    }
   
    else if ($this->examType=='not'){
        $this->list=Examination::all();
    }
   
}
    public function render()
    {
        return view('livewire.examtype');
    }
}
