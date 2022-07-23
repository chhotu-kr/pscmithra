<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Topic extends Component
{
    // public function render()
    // {
    //     return view('livewire.topic');
    // }
    public $subject;
    public $exam;
    public $topics = [];
    public $subjectId;
    public $topic_id;


    public function mount(){

        // return dd($dd);
        $this->subject= Topic::all();
       

        $this->get_topics();
    }
  

    public function updatedSubjectId(){
        $this->get_topics();
    }

    public function get_topics(){
        if($this->subjectId != ''){
            $this->topics = Topic::where("subject_id",$this->subjectId)->get();
        }
    }
    public function render()
    {
        return view('livewire.topic');
    }
}
