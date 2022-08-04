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

       

    public function mount(){
        
        $this->category=Category::all();
    }

    


    public function render()
    {
        return view('livewire.form');
    }
}
