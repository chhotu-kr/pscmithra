<?php

namespace App\Http\Livewire\User;

use App\Models\QuizCategory;
use Livewire\Component;

class Quiz extends Component
{
     public $quizcategory;
     public $quizcategoryId;

     public $idasd;

     public function mount($id){
      $this->idasd=$id;
      $this->quizcategory=QuizCategory::all();
     }

    public function render()
    {
        return view('livewire.user.quiz');
    }
}
