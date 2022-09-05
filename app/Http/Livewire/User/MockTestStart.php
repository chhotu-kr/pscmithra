<?php

namespace App\Http\Livewire\User;

use App\Models\AttempedExam;
use Livewire\Component;

class MockTestStart extends Component
{

  public $data;
  public $question_no ;

  public $w = 0 ;
  public $a = 0 ; 
  public $u= 0;


  


function filterledgers(){
$w = 0;
$a = 0;
$u = 0;



  foreach($this->data['questionslist'] as $value){
if($value['s']=="false"){
$u++;
}else{
  if( empty($value['optSel'])){
$w++;
  }else{
    $a++;
  }

}
 }


 $this->a = $a;
 $this->w = $w;
 $this->u = $u;
                      
}


  // public function test_data(){
  //   $this->emit('test_data',23);
  // }

  public function next()
  {
    $this->question_no++;
    $this-> ishow();

  }
public function jump($index){

  $this->question_no = $index;
  $this->ishow();
}
public function ishow(){
  $this->data['questionslist'][$this->question_no]['s'] = "true";
  $this->filterledgers();
}

  public function prev()
  {
    $this->question_no--;
    $this->ishow();
  }

  public function onSelect($id)
  {
    $this->data['questionslist'][$this->question_no]['optSel'] = $id;
    $this->filterledgers();
  }
  public function mount($testId, $examinationId)
  {
  
    $this->emit('test_data', $this->question_no);

    $user = 1;

    $testId =  AttempedExam::select('id', 'slugid')->where("slugid", $testId)->first();


    $this->data = AttempedExam::with(['examination.examQ.question.mockAttemp' => function ($q) use ($testId, $user) {
      $q->where('attemped_exams_id', $testId->id)->where('users_id', $user);
    }])->where('slugid', $testId->slugid)->where('users_id', $user)->where('examinations_id', $examinationId)
      ->get()
      ->map(function ($d) {

        if ($d['type'] != "resume") {
          return "Test not resume";
        } else if ($d['type'] = "resume") {

          return [
            "testID" => $d->slugid,
            "attempted_exam_id" => $d->id,
            "languageId" => $d->language->id,
            "languageName" => $d->language->languagename,
            "examId" => $d->examination->slugid,
            "lastQues" => $d->lastQues,
            "type" => $d->mocktesttype,
            "time" => $d->remain_time,
            "languages" => $d->examination->lang->map(function ($langg) {
              return ["id" => $langg->language->id, "language" => $langg->language->languagename,];
            }),
            "wMarks" => $d->examination->wrongmarks,
            "rMarks" => $d->examination->rightmarks,
            'noQues' => $d->examination->noQues,
            "questionslist" => $d->examination->examQ->map(function ($fff) {

              return collect([
                "questionId" => $fff->question->id,
                "s" => $fff->question->mockAttemp->QuesSeen,
                "optSel" => $fff->question->mockAttemp->QuesSelect,
                "time" => $fff->question->mockAttemp->time,
                "question" => $fff->question->secondquestion

                  ->map(function ($ques) {
                    return collect([
                      "id" => $ques->language->id,
                      "language" => $ques->language->languagename,
                      "Questionin" =>  $ques->question,
                      "option1" => $ques->option1,
                      "option2" => $ques->option2,
                      "option3" => $ques->option3,
                      "option4" =>  $ques->option4
                    ]);
                  })
              ]);
            })
          ];
        }
      })[0];
$this->question_no = 0;
$this->jump($this->question_no);

    // dd($this->data);
  }
  public function render()
  {
    return view('livewire.user.mocktest-start');
  }
}
