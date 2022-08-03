<?php

namespace App\Http\Livewire;

use App\Models\QuizSubCategory;
use Livewire\Component;

class QuizCate extends Component
{

    public  $quizsubcategories=[];

    public $Name;
    public $icc;

    public function mount($id,$Name){
     $this->quizsubcategories=QuizSubCategory::where('quiz_categories',$id)->get();
     $this->icc=$id;
     $this->Name=$Name;

    }
    public function render()
    {
        return view('livewire.quiz-cate');
    }
}
