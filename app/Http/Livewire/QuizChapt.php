<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\QuizChapter;
class QuizChapt extends Component
{

    public $quizchapters;
    public $quizchapterId;

    public function mount(){
        $this->quizchapters=QuizChapter::all();
    }
    public function render()
    {
        return view('livewire.quiz-chapt');
    }
}
