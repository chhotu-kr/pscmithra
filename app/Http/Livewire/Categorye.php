<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class Categorye extends Component
{
    public $category;
    public $subcategories = [];
    public $categoryId;
    public $subcategory_id;


    public function mount(){
        $this->category= Category::where('exam_id',2)->get();

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
    // public function render()
    // {
    //     return view('livewire.subjects');
    // }
    public function render()
    {
        return view('livewire.categorye');
    }
}
