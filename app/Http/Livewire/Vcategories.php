<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Exam;
use Livewire\Component;

class Vcategories extends Component
{    public $subcategories=[];
    


public $Name;
public $ida;
    public function mount($id,$Name){
        $this->subcategories=SubCategory::where('category_id',$id)->get();
       
        $this->ida = $id;
        $this->Name = $Name;        
    }

  
    public function render()
    {
        return view('livewire.vcategories');
    }
}
