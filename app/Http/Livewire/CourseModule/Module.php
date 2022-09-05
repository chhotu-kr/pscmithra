<?php

namespace App\Http\Livewire\CourseModule;

use Livewire\Component;

class Module extends Component
{
    public $module;

    public $moduleId;
public $type;
    public function mount(){
        $this->module=Module::all();
        
    }

    

   
    public function render()
    {
        return view('livewire.course-module.module');
    }
}
