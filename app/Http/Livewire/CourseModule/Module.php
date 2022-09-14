<?php

namespace App\Http\Livewire\CourseModule;

use Livewire\Component;

class Module extends Component
{
    public $type;

    

   
    public function render()
    {
        return view('livewire.course-module.module');
    }
}
