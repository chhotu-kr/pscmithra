<?php

namespace App\Http\Livewire\User;

use App\Models\livetest\liveAttemp;
use App\Models\livetest\liveExam;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LiveQuizSolution extends Component
{
    public $data;
    public $status = false;
    public $question_no;
    public $w = 0;
    public $a = 0;
    public $u = 0;
  
    public function statusChange(){
      $this->status = !$this->status;
    }
    function filterledgers()
    {
      $w = 0;
      $a = 0;
      $u = 0;
  
      foreach ($this->data['questionslist'] as $value) {
        if ($value['seen'] == "false") {
          $u++;
        } else {
          if ($value['optSel'] != $value['isRightAns']) {
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
    }
    public function prev()
    {
      $this->question_no--;
    }
    public function jump($index)
    {
  
      $this->question_no = $index;
     
    }
    public function mount($testid, $examinationId)
    {
       
            $user_id = Auth::id();
      
        $examination_id =  liveExam::select('id')->where("slugid", $examinationId)->first();

        $testId =  liveAttemp::select('id')->where("slugid", $testid)->first();


        $this->data = liveAttemp::with(['examination.examQ.question.liveAttemp' => function ($q) use ($testId, $user_id) {
            $q->where('live_attemps_id', $testId->id)->where('users_id', $user_id);
        }])->where('slugid', $testid)->where('users_id', $user_id)->where('live_exams_id', $examination_id->id)
            ->get()
            ->map(function ($d) {

                if ($d['type'] == "resume") {
                    return "Test not Complete";
                } else if ($d['type'] == "result") {
                    return [
                        "testID" => $d->slugid,
                        "languageId" => $d->language->id,
                        "languageName" => $d->language->languagename,
                        "examId" => $d->examination->slugid,
                        "lastQues" => $d->lastQues,
                        "time" => $d->remain_time,
                        "languages" => $d->examination->lang->map(function ($langg) {
                            return ["id" => $langg->language->id, "language" => $langg->language->languagename,];
                        }),
                        "wMarks" => $d->examination->wrongmarks,
                        "rMarks" => $d->examination->rightmarks,
                        'noQues' => $d->examination->noQues,
                        "questionslist" => $d->examination->examQ->map(function ($fff) {
                            $aaa = false;
                            if ($fff->question->rightans == $fff->question->liveAttemp->QuesSelect) {
                                $aaa = true;
                            } else {
                                $aaa = false;
                            }
                            return collect([
                                "questionId" => $fff->question->liveAttemp->id,
                                "seen" => $fff->question->liveAttemp->QuesSeen,
                                "optSel" => $fff->question->liveAttemp->QuesSelect,
                                "time" => $fff->question->liveAttemp->time,
                                "isRight" => $aaa, "isRightAns" => $fff->question->rightans,
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
                                            "explain" => $ques->explanation,
                                        ]);
                                    })
                            ]);
                        })
                    ];
                }
            })[0];
        // dd($this->data);
        $this->question_no = 0;
        // $this->jump($this->question_no);
        // return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $this->data]);
    }
    public function render()
    {
        return view('livewire.user.live-quiz-solution');
    }
}
