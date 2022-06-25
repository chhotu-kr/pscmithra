<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Language;
use App\Models\SecondQuestion;

class Form extends Component
{   
     public $templates =[];
     public $all_templates;
     public $SecondQuestions=[];

    public function mount(){
        $this->all_templates = SecondQuestion::all();
    }

    public function addsecondquestion(){
        $this->SecondQuestions[] = '';
    }
     


    public function render()
    {
        return view('livewire.form');
    }
}
