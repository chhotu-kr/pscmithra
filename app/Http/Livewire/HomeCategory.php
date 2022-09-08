<?php

namespace App\Http\Livewire;

use App\Models\SubCategory;
use Livewire\Component;

class HomeCategory extends Component
{
    public $cat;
    public $sub_cat;
    public function onSelect($id){
        if($id == 0){
            $this->sub_cat = SubCategory::all();
        }
        else{
            $this->sub_cat = SubCategory::where('category_id',$id)->get();
        }
    }
    public function mount($cat,$sub_cat){
        $this->cat = $cat;
        $this->sub_cat = $sub_cat;
    }
    public function render()
    {
        return view('livewire.home-category');
    }
}
