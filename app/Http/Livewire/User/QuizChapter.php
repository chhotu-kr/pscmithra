<?php

namespace App\Http\Livewire\User;

use App\Models\QuizCategory;
use App\Models\QuizChapter as ModelsQuizChapter;
use App\Models\QuizSubCategory;
use Livewire\Component;

class QuizChapter extends Component
{
     public $quizcategory;
     public $quizcategoryId;

        public $idasd;


     public function mount($chapter){
        $this->idasd=$chapter;
        $this->quizchapter = ModelsQuizChapter::where('quiz_sub_categories',$chapter)->get();
   
     }

    public function render()
    {
         //dd($this->quizcategory);

        return view('livewire.user.quiz-chapter');
    }
}
