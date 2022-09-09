<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;

class Categories extends Component
{
    public $category;
    public $subcategories = [];
    public $categoryId;
    public $subcategory_id;

    // public $inputs= [] ;
    // protected $listeners = ['remove_mocktest'=>"remove_mocktest"];

    public $iddd;



    public function removecall($id)
    {
        
        $this->emit('remove_mocktest', $id);
    }


    public function mount($iass)
    {

        $this->iddd = $iass;

        $this->category = Category::all();

        $this->get_subcategories();
    }

    public function updatedcategoryId()
    {
        $this->get_subcategories();
    }

    public function get_subcategories()
    {
        if ($this->categoryId != '') {
            $this->subcategories = SubCategory::where("category_id", $this->categoryId)->get();
        }
    }
    public function render()
    {
        return view('livewire.categories');
    }
}
