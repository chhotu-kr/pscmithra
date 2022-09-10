<?php

namespace App\Http\Livewire\User;

use App\Models\Category;
use Livewire\Component;

class Categoryslider extends Component
{

public $cat ;

public function mount(){
$this->cat = Category::all();
}

    public function render()
    {
        return view('livewire..user.categoryslider');
    }
}
