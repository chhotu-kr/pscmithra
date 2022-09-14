<?php

namespace App\Http\Livewire\User;

use App\Models\AttempedExam;
use App\Models\livetest\liveAttemp;
use App\Models\livetest\liveAttempQuestion;
use App\Models\livetest\liveExam;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
  public $selected;

  protected $listeners = ['totaltime' => 'timetaken'];

  public function onSubmit()
  {

    $user = Auth::id();
    
   
    $examination_id =  liveExam::where("slugid", $this->data['examId'])->first();


    $testId = liveAttemp::where("slugid",  $this->data['testID'])->where("live_exams_id", $examination_id->id)
      ->where("users_id", $user)->first();
 



    foreach ($this->data['questionslist'] as $index => $value) {



      

      
      if ((!empty($value['optSel'])) && $value["s"] != "false") {
      
        $dd = liveAttempQuestion::where('id', $value['questionId'])->where('users_id', $user)->where('live_attemps_id', $testId->id)->update(
          [
            "QuesSeen" => $value["s"],
            "QuesSelect" => $value['optSel'],
            "time" => $value['time']
          ]
        );
   
      }
      }

    if ($this->data['type'] == "normal") {
      $type = "result";
      $rMarks  = $examination_id->rightmarks;
      $wMarks = "-" . $examination_id->wrongmarks;

      $total = Question::leftjoin('live_attemp_questions', function ($join) use ($rMarks, $wMarks) {
        $join->on('questions.id', '=', 'live_attemp_questions.questions_id');
      })->select(
        'questions.*',
        'live_attemp_questions.*',
        DB::raw('(CASE WHEN questions.rightans = live_attemp_questions.QuesSelect THEN ' . $rMarks . '
               ELSE ' . $wMarks . ' END) AS total')
      )->where('users_id', $user)->where('live_attemps_id', $testId->id)->get();
      $total = $total->sum('total');
      $testIds = $testId->update(
        [
          "remain_time" => $this->data['time'],
          "lastQues" =>$this->question_no + 1,
          "type" => $type,
          "totalmarks" => $total,
        ]
      );

      return response()->json(['msg' => 'Test Submited', 'status' => true, 'data' =>  $testId->testtype]);
    } else {
      // dd('hsssshs');

      $testId->update(
        [
          "type" => 'result',
          "remain_time" =>$this->data['time'],
          "lastQues" => $this->question_no + 1,
        ]
      );
    }

    return redirect()->route('view.liveresult',['testID' => $this->data['testID'],'examId' => $this->data['examId']]);
    // return response()->json(['msg' => 'Test Submited', 'status' => true, 'data' =>  $testId->type]);

  
}
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
    // dd($id);
    if ($id == 1) {
      $this->selected = 'selOpt1';
    } elseif ($id == 2) {
      $this->selected = 'selOpt2';
    } elseif ($id == 3) {
      $this->selected = 'selOpt3';
    } else {
      $this->selected = 'selOpt4';
    }
    $this->data['questionslist'][$this->question_no]['optSel'] = $this->selected;
    $this->filterledgers();
  }
  public function countTime($id)
  {


    $this->data['questionslist'][$id]['time'] = $this->data['questionslist'][$id]['time'] + 1;

    // dd($id);
  }
  public function mount($testId, $examinationId)
  {
    // dd($examinationId);  

    $user = Auth::id();


    $testid =  liveAttemp::select('id', 'slugid')->where("slugid", $testId)->first();
    // dd($testId);
    $this->data = liveAttemp::with(['examination.examQ.question.liveAttemp' => function ($q) use ($testid, $user) {
      $q->where('live_attemps_id', $testid->id)->where('users_id', $user);
    }])->where('slugid', $testId)->where('users_id', $user)->where('live_exams_id', $examinationId)
      ->get()
      ->map(function ($d) {

        if ($d['type'] != "resume") {
          return "Test not resume";
        } else if ($d['type'] = "resume") {

          return [
            // dd($d),
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
                      "option1" => $ques->option1,
                      "option2" => $ques->option2,
                      "option3" => $ques->option3,
                      "option4" => $ques->option4,
                      "direction" => $ques->direction,
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
  }
  public function render()
  {
    return view('livewire.user.live-quiz-start');
  }
}
