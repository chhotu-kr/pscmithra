<?php

namespace App\Http\Livewire\User;

use App\Models\quizAttemp;
use App\Models\QuizExamination;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class QuizResult extends Component
{
    public $data;
    public function mount($testid,$quizexaminationid){
        $user_id = 1;
       if(Auth::user()){
        $user_id = Auth::id();
       }    

        
       
        //   if (empty($request->quizexaminationid)) {
        //     return response()->json(['msg' => 'Enter Examination', 'status' => false]);
        //   }
          $examination_id =  QuizExamination::select('id')->where("slugid", $quizexaminationid)->first();
            // dd($examination_id);
       
        //   if (empty($request->testId)) {
        //     return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
        //   }
          $testId =  quizAttemp::select('id', 'type')->where("slugid", $testid)->first();
            
        //    dd( $testId);
       
          $this->data = quizAttemp::with(
      
            ['examination' => function ($q) use ($testId, $user_id) {
      
              $q->with(['quizexamQ' => function ($q) use ($testId, $user_id) {
      
                $q->with(['question.quizAttemp' => function ($q) use ($testId, $user_id) {
                  $q->where('quiz_attemps_id', $testId->id)->where('users_id', $user_id)->orderBy('question_id', 'DESC');
                }]);
              }])->with(['quizattm' => function ($aa) {
                $aa->where('testtype', 'reattemp');
              }]);
            }]
          )
            ->where('slugid',$testid)->where('users_id', $user_id)->where('quiz_examinations_id', $examination_id->id)
            ->get()
            ->map(
              function ($d) {
      
                $reattempId = "";
                $reattempResult = false;
                if (!empty($d->examination->attm)) {
                  $reattempId = $d->examination->attm->slugid;
                  if ($d->examination->attm->type == "result") {
                    $reattempResult = true;
                  }
                }
      
                $per = ($d->totalmarks / $d->examination->marks) * 100;
                return [
                  "score" => $d->totalmarks,
                  "percentage" => $per,
                  "testID" => $d->slugid,
                  "examId" => $d->examination->slugid,
                  "type" => $d->testtype,
                  "time" => $d->examination->time_duration * 60,
                  "timeTaken" => ($d->examination->time_duration * 60) - $d->remain_time,
                  "languages" => $d->examination->lang->map(function ($langg) {
                    return ["id" => $langg->language->id, "language" => $langg->language->languagename,];
                  }),
      
                  "reAttempId" => $reattempId,
                  "reAttempResult" => $reattempResult,
      
                  "wMarks" => $d->examination->wrongmarks,
                  "rMarks" => $d->examination->rightmarks,
                  'noQues' => $d->examination->noQues,
      
      
                  "questionslist" => $d->examination->quizexamQ->map(function ($fff, $key) {
      
                    $res = "skip";
                    if ($fff->question->quizAttemp->QuesSeen == "true") {
                      if (empty($fff->question->quizAttemp->QuesSelect)) {
                        $color = "#797980";
                        $res = "skip";
                      } else if ($fff->question->rightans != $fff->question->quizAttemp->QuesSelect) {
                        $color = "#FF0000";
                        $res = "wrong";
                      } else if ($fff->question->rightans = $fff->question->quizAttemp->QuesSelect) {
                        $color = "#008000";
                        $res = "right";
                      }
                    } else {
                      $color = "#3e3a3a";
                      $res = "unseen";
                    }
      
      
                    return collect([
                      "questionId" => $key + 1,
                      "color" => $color,
                      "final" => $res,
                    ]);
                  }),
      
                ];
              }
            )[0];
          $right = count($this->data['questionslist']->where('final', 'right'));
          $wrong = count($this->data['questionslist']->where('final', 'wrong'));
          $attemped = $right + $wrong;
      
          $data['unseen'] = count($this->data['questionslist']->where('final', 'unseen'));
          $data['right'] = $right;
          $data['wrong'] = $wrong;
          $data['skip'] = count($this->data['questionslist']->where('final', 'skip'));
          $data['attemped'] = $attemped;
          if ($attemped > 0) {
            $data['accuracy'] = $right / $attemped;
          } else {
            $data['accuracy'] = 0;
          }
      
          $data['Percentile'] = 0;
          $data['Rank'] = 50;
          dd($this->data);
        }
    
    public function render()
    {
        return view('livewire.user.quiz-result');
    }
}
