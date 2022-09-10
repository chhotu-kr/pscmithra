<?php

namespace App\Http\Livewire\User;

use App\Models\AttempedExam;
use App\Models\Examination;
use App\Models\mockattempquestion;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MocktestStart extends Component
{
  public $data;
  public $question_no;

  public $w = 0;
  public $a = 0;
  public $u = 0;
  public $required_timing = 0;
  public $min;
  public $hr;
  public $sec;
  public $status;
  public $l;
  protected $listeners = ['totaltime' => 'timetaken'];


  public function onSubmit()
  {

    $user = 1;
    $examination_id =  Examination::where("slugid", $this->data['examId'])->first();
   // dd($this->data['questionslist'] );
    $testId = AttempedExam::where("slugid", $this->data['testID'])->where("examinations_id", $examination_id->id)
      ->where("users_id", $user)->first();

       //dd($this->data['questionslist'][$index]['optSel']);
    
    foreach ($this->data['questionslist'] as $index => $value) {
      if ((!empty($value['optSel'])) && $value["s"] != "false") {
        $dd = mockattempquestion::where('questions_id', $value['questionId'])->where('users_id', $user)->where('attemped_exams_id', $testId->id)->update(
          [
            "QuesSeen" => $value["s"],
            "QuesSelect" => $value['optSel'],
            "time" => $value['time']
          ]
        );
      
      }




      //   // SELECT * FROM `questions`as u LEFT JOIN mockattempquestions as d  ON u.id = d.questions_id WHERE users_Id = 1 AND  attemped_exams_id = 5;

      // echo json_encode($value);

    }


    // $type = "resume";

    // if ($request->type == "submit") {
    //   $type = "result";
    //   $rMarks  = $examination_id->rightmarks;
    //   $wMarks = "-" . $examination_id->wrongmarks;
    //   $total = Question::leftjoin('mockattempquestions', function ($join) use ($rMarks, $wMarks) {
    //     $join->on('questions.id', '=', 'mockattempquestions.questions_id');
    //   })->select(
    //     'questions.*',
    //     'mockattempquestions.*',
    //     DB::raw('(CASE WHEN questions.rightans = mockattempquestions.QuesSelect THEN ' . $rMarks . '
    //            ELSE ' . $wMarks . ' END) AS total')
    //   )->where('users_id', $user)->where('attemped_exams_id', $testId->id)->get();
    //   $total = $total->sum('total');
    //   $testIds = $testId->update(
    //     [
    //       "remain_time" => $this->data['time'],
    //       "lastQues" => $this->question_no + 1,
    //       "type" => $type,
    //       "totalmarks" => $total,
    //     ]
    //   );

    //   //   return response()->json(['msg' => 'Test Submited', 'status' => true, 'data' =>  $testId->mocktesttype]);
    // }


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
    $this->data['questionslist'][$this->question_no]['optSel'] = $id;
    $this->filterledgers();
  }
  public function countTime($id)
  {


    $this->data['questionslist'][$id]['time'] = $this->data['questionslist'][$id]['time'] + 1;

    // dd($id);
  }
  public function mount($testId, $examinationId)
  { 
    $user = 1;

    $testId =  AttempedExam::select('id', 'slugid')->where("slugid", $testId)->first();
    //  here attemped_exams_id not correct
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
                "showdir" => false,
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
    $this->countTime($this->question_no);
    $this->required_timing = $this->data['time'];
    $this->status = $this->data['questionslist'][$this->question_no]['showdir'];
    //  dd($this->question_no);
    // dd($this->data);
  }
  public function render()
  {
    return view('livewire.user.mocktest-start');
  }
}
