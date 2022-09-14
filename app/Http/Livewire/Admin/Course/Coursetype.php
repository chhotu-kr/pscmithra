<?php

namespace App\Http\Livewire\Admin\Course;

use App\Models\CourseQuiz;
use Livewire\Component;

class Coursetype extends Component
{
    public $typp;
    public $quiz;

    public function updatedtypp(){
        if($this->typp=="quiz"){
            $this ->quiz =  CourseQuiz::all();
        }else{

        }
    }


    public function render()
    {
        return view('livewire..admin.course.coursetype');
    }
}
