<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use App\Models\Language;
use App\Models\Category;
// use App\Models\SecondQuestion;

class Form extends Component
{   
    
         public $category;
         public $categoryId;

      public $idd; 

    public function mount($id){
        $this->idd=$id;
        $this->category=Category::all();
    }

    


    public function render()
    {
        return view('livewire.form');
    }
}
