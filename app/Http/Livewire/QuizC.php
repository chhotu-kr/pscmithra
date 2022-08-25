<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\QuizCategory;
class QuizC extends Component
{

    public $quizcategory;
    public $quizcategoryId;
    public function mount(){
        
        $this->quizcategory=QuizCategory::all();
    }
    public function render()
    {
        return view('livewire.quiz-c');
    }
}
