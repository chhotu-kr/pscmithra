<?php

namespace App\Http\Livewire\User;

use App\Models\QuizCategory;
use Livewire\Component;

class Quiz extends Component
{
     public $quizcategory;
     public $quizcategoryId;
// public $quizsubcategory;
// public $quisubzcategoryId;
        public $idasd;

     public function mount(){
        // $this->idasd=$id;
      $this->quizcategory=QuizCategory::with('subcategory')->get();;
   
     }

    public function render()
    {
         //dd($this->quizcategory);

        return view('livewire.user.quiz');
    }
}
