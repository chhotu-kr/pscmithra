<?php

namespace App\Http\Livewire;

use App\Models\QuizChapter;
use Livewire\Component;

class QuizSubCate extends Component
{
    public $quizchapters=[];

    public $Name;
    public $isad;

    public function mount($id,$Name){
        $this->quizchapters=QuizChapter::where('quiz_sub_categories',$id)->get();
        $this->Name=$Name;
        $this->isad=$id;
    }
    public function render()
    {
        return view('livewire.quiz-sub-cate');
    }
}
