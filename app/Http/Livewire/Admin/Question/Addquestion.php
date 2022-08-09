<?php

namespace App\Http\Livewire\Admin\Question;

use App\Models\Language;
use Livewire\Component;

class Addquestion extends Component
{

    public $data = [];
    public $lang =[];
public function add(){
    $this->data[] = ['question' => 'dasd ada asdad', 'opt1' => '','opt2'=>'','opt3'=>'','opt4'=>'','lang'=>''];
}
public function removeProduct($index)
    {
        unset($this->data[$index]);
        $this->data = array_values($this->data);
        
    }
    public function mount(){
       $this->lang =  Language::all();


    }

    public function render()
    {
        return view('livewire.admin.question.addquestion');
    }
}
