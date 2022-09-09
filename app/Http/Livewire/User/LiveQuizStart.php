<?php

namespace App\Http\Livewire\User;

use App\Models\AttempedExam;
use App\Models\livetest\liveAttemp;
use Livewire\Component;

class LiveQuizStart extends Component
{
  public $data;
  public $question_no;

  public $w = 0;
  public $a = 0;
  public $u = 0;
  public $required_timing = 0;
  public $min;
  public $sec;
  public $status;
  public $l;
  protected $listeners = ['totaltime' => 'timetaken'];

  public function statusChange()
  {
    $this->status = !$this->status;
  }
  function timetaken()
  {
    $this->min = floor($this->required_timing / 60);
    $this->sec = $this->required_timing % 60;
    $this->required_timing--;
    $this->data['questionslist'][$this->question_no]['time']++;
  }
  function filterledgers()
  {
    $w = 0;
    $a = 0;
    $u = 0;



    foreach ($this->data['questionslist'] as $value) {
      if ($value['s'] == "false") {
        $u++;
      } else {
        if (empty($value['optSel'])) {
          $w++;
        } else {
          $a++;
        }
      }
    }


    $this->a = $a;
    $this->w = $w;
    $this->u = $u;
  }


  public function next()
  {
    $this->question_no++;
    $this->ishow();
  }
  public function jump($index)
  {

    $this->question_no = $index;
    $this->ishow();
    $this->countTime($this->question_no);

  }
  public function ishow()
  {
    $this->data['questionslist'][$this->question_no]['s'] = "true";
    $this->filterledgers();

  }

  public function prev()
  {
    $this->question_no--;
    $this->ishow();
    $this->countTime($this->question_no);

  }

  public function onSelect($id)
  {
    $this->data['questionslist'][$this->question_no]['optSel'] = $id;
    $this->filterledgers();
  }
  public function countTime($id){

   
     $this->data['questionslist'][$id]['time'] = $this->data['questionslist'][$id]['time'] + 1;
     
    // dd($id);
  }
  public function mount($testId, $examinationId)
  {
    // dd($testId);

    $user = 1;

    $testId =  liveAttemp::select('id','slugid')->where("slugid", $testId)->first();
    // dd($testId);
    $this->data = liveAttemp::with(['examination.examQ.question.liveAttemp' => function ($q) use ($testId, $user) {
        $q->where('live_attemps_id', $testId->id)->where('users_id', $user);
      }])->where('slugid', $testId->slugid)->where('users_id', $user)->where('live_exams_id', $examinationId)
        ->get()
        ->map(function ($d) {
  
          if ($d['type'] != "resume") {
            return "Test not resume";
          } else if ($d['type'] = "resume") {
  
            return [
              "testID" => $d->slugid,
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
                  "showdir" => false,
                  "questionId" => $fff->question->liveAttemp->id,
                  "s" => $fff->question->liveAttemp->QuesSeen,
                  "optSel" => $fff->question->liveAttemp->QuesSelect,
                  "time" => $fff->question->liveAttemp->time,
                  "question" => $fff->question->secondquestion
                  ->map(function ($ques) {
                      return collect([
                        "id" => $ques->language->id,
                        "language" => $ques->language->languagename,
                        "question" => $ques->question,
                        "option1"=> $ques->option1,
                        "option2"=> $ques->option2,
                        "option3"=> $ques->option3,
                        "option4"=> $ques->option4,
                        "direction"=>$ques->direction,
                      ]);
                    })
                ]);
              })
            ];
          }
        })[0];

        // dd($this->data);
    $this->question_no = 0;
    $this->jump($this->question_no);
    $this->countTime($this->question_no);
    $this->required_timing = $this->data['time'];
    $this->status = $this->data['questionslist'][$this->question_no]['showdir'];
//    dd($this->question_no);
//     dd($this->data);
  }
  public function render()
  {
    return view('livewire.user.live-quiz-start');
  }
}
