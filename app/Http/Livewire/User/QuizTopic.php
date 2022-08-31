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

        public $idasd;


     public function mount($topic){
        $this->idasd=$topic;
        $this->quiztopic = ModelsQuizTopic::where('quiz_chapters',$topic)->get();
   
     }

    public function render()
    {
         //dd($this->quizcategory);

        return view('livewire.user.quiz-topic');
    }
}
