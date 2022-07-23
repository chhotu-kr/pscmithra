<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SubCategory;
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
            $this->subcategories = SubCategory::where("category_id",$this->category_Id)->get();
        }
    }

    public function render()
    {
        return view('livewire.sub-categories');
    }
}
