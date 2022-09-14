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

        public $sub_cat_id;
        public $cat_id;


     public function mount($sub_cat_id,$cat_id){
        $this->sub_cat_id=$sub_cat_id;
        $this->cat_id=$cat_id;
        $this->quizchapter = ModelsQuizChapter::where('quiz_sub_categories',$sub_cat_id)->get();
   
     }

    public function render()
    {
         //dd($this->quizcategory);

        return view('livewire.user.quiz-chapter');
    }
}
