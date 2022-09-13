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


     public function mount($cat_id){
        $this->idasd=$cat_id;
        $this->quizsubcategory = QuizSubCategory::where('quiz_categories',$cat_id)->get();
   
     }

    public function render()
    {
         //dd($this->quizcategory);

        return view('livewire.user.quiz');
    }
}
