<?php

namespace App\Http\Livewire;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Question;
use Livewire\Component;

class Subjects extends Component
{
    public $subject;
    public $topics = [];
    public $subjectId;
    public $topic_id;
   
    public $questiontype;
    public $queslist;
   

    public function mount(){
        $this->subject= Subject::all();
       
       
       
    }

    public function updatedSubjectId(){
        if($this->subjectId != ''){
            $this->topics = Topic::where("subject_id",$this->subjectId)->get();
        }

    }

   
    

    public function get_topics(){
      
    }

    

    public function render()
    {
        // $this->queslist=Question::all();
        return view('livewire.subjects');
    }
}