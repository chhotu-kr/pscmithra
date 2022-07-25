<?php

namespace App\Http\Livewire;

use App\Models\SubCategory;
use Livewire\Component;

class SubCategories extends Component
{
    
    public $category;
    public $subcategories = [];
    public $categoryId;
    public $subcategory_id;

    public function mount(){

        // return dd($dd);
        $this->category= SubCategory::all();
       

        $this->get_subcategories();
    }
  

    public function updatedCategoryId(){
        $this->get_subcategories();
    }

    public function get_subcategories(){
        if($this->categoryId != ''){
            $this->subcategories = SubCategory::where("category_id",$this->categoryId)->get();
        }
    }
    public function render()
    {
        return view('livewire.sub-categories');
    }
}
