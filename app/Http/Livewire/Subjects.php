<?php

namespace App\Http\Livewire;
use App\Models\Subject;
use App\Models\Topic;
use Livewire\Component;

class Subjects extends Component
{
    public $subject;
    public $topics = [];
    public $subjectId;
    public $topic_id;


    public function mount(){
        $this->subject= Subject::all();

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
        return view('livewire.subjects');
    }
}