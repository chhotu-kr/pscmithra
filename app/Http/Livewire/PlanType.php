<?php

namespace App\Http\Livewire;
use App\Models\Book;
use Livewire\Component;


class PlanType extends Component
{
public $planType;

public $type;
public $list;
public function updatedplanType(){
    if ($this->planType=='book'){
        $this->list=Book::all();
    }
}

    public function render()
    {
        return view('livewire.plan-type');
    }
}
