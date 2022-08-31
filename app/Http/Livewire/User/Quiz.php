<?php

namespace App\Http\Livewire\User;

use App\Models\QuizCategory;
use App\Models\QuizSubCategory;
use Livewire\Component;

class Quiz extends Component
{
     public $quizcategory;
     public $quizcategoryId;

        public $idasd;


     public function mount($id){
        $this->idasd=$id;
        $this->quizsubcategory = QuizSubCategory::where('quiz_categories',$id)->get();
   
     }

    public function render()
    {
         //dd($this->quizcategory);

        return view('livewire.user.quiz');
    }
}
