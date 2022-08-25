<?php

namespace App\Http\Livewire;

use App\Models\QuizTopic;
use Livewire\Component;

class QuizChapter extends Component
{

    public $quiztopics=[];
    public $Name;
    public $ibcd;

    public function mount($id,$Name){
     $this->quiztopics=QuizTopic::where('quiz_chapters',$id)->get();
     $this->Name=$Name;
     $this->ibcd=$id;
    }
    public function render()
    {
        return view('livewire.quiz-chapter');
    }
}
