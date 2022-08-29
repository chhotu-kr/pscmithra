<?php

namespace App\Http\Livewire\Admin\LiveExam;

use App\Models\livetest\liveExam;
use App\Models\livetest\liveQuestion;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Topic;
use Livewire\Component;

class SelectQuestion extends Component
{
 public $questions;

 public $subject;
 public $topics = [];
 public $subjectId;
 public $topicId;

 public $questiontype;
 public $queslist;

 public $liveExamId;
 public function mount($id){
$this->liveExamId = $id;
     $this->subject= Subject::all();
    
    
    
 }

 public function updatedSubjectId(){
     if($this->subjectId != ''){
         $this->topics = Topic::where("subject_id",$this->subjectId)->get();
     }

 }

public function updatedTopicId(){

    if($this->topicId != ''){
 $questionsId = liveQuestion::select('question_id')->where('live_exams_id', $this->liveExamId )->get()->toArray();
       
    $this->questions=Question::with('secondquestion.language')->
    where('topic_id',$this->topicId)
    ->whereNotIn('id',$questionsId)
    ->get();

}
}

    public function render()
    {
        return view('livewire..admin.live-exam.select-question');
    }
}
