<?php

namespace App\Http\Livewire\User;

use App\Models\QuizCategory;
use App\Models\QuizChapter as ModelsQuizChapter;
use App\Models\QuizSubCategory;
use App\Models\QuizTopic as ModelsQuizTopic;
use Livewire\Component;

class QuizTopic extends Component
{
     public $quizcategory;
     public $quizcategoryId;

        public $chapter_id;


     public function mount($sub_cat_id,$cat_id,$chapter_id){
      $this->sub_cat_id=$sub_cat_id;
      $this->cat_id=$cat_id;
        $this->chapter_id=$chapter_id;
        $this->quiztopic = ModelsQuizTopic::where('quiz_chapters',$chapter_id)->get();
   
     }

    public function render()
    {
         //dd($this->quizcategory);

        return view('livewire.user.quiz-topic');
    }
}
