<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;

class Mocktest extends Component
{
    public $category;
    public $categoryId;
    public $idd;

    public function mount($id){
      $this->idd=$id;
      $this->category=Category::all();
      $this->subcat = SubCategory::where('category_id',$id)->get();
    }
    public function render()
    {
        return view('livewire.user.mocktest');
    }
}
