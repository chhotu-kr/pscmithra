<?php

namespace App\Http\Livewire;

use App\Models\QuizSubCategory;
use Livewire\Component;

class QuizS extends Component
{
    public $quizsubcategories;
    public $quizsubcategoryId;

    public function mount(){
        $this->quizsubcategories=QuizSubCategory::all();
    }
    public function render()
    {
        return view('livewire.quiz-s');
    }
}
