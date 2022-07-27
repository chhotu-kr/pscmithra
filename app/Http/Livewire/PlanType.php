<?php

namespace App\Http\Livewire;
use App\Models\Book;
use App\Models\Course;
use App\Models\Pdf;
// use App\Models\PlanProduct;
use App\Models\BookProduct;
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
   
    else if ($this->planType=='course'){
        $this->list=Course::all();
    }
    else if ($this->planType=='pdf'){
        $this->list=Pdf::all();
    }
    // else if ($this->planType=='plan'){
    //     $this->list=PlanProduct::all();
    // }
    else if ($this->planType=='ebook'){
        $this->list=BookProduct::all();
    }
}

    public function render()
    {
        return view('livewire.plan-type');
    }
}
