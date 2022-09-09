<?php

namespace App\Http\Livewire\User;

use App\Models\AttempedExam;
use App\Models\Examination;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MocktestSolution extends Component
{
    public function mount($testid,$examinationId){
        $user_id = 1;
        if(Auth::user()){
            $user_id = Auth::id();
        }
      
        //   if (empty($request->examination)) {
        //     return response()->json(['msg' => 'Enter Examination', 'status' => false]);
        //   }
          $examination_id =  Examination::select('id')->where("slugid", $examinationId)->first();
      
          
        //   if (empty($request->testId)) {
        //     return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
        //   }
          $testId =  AttempedExam::select('id')->where("slugid", $testid)->first();
      
     
          $data = AttempedExam::with(['examination.examQ.question.mockAttemp' => function ($q) use ($testId, $user_id) {
            $q->where('attemped_exams_id', $testId->id)->where('users_id', $user_id);
          }])->where('slugid', $testid)->where('users_id', $user_id)->where('examinations_id', $examination_id->id)
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
                  "type" => $d->mocktesttype,
                  "time" => $d->remain_time,
                  "languages" => $d->examination->lang->map(function ($langg) {
                    return ["id" => $langg->language->id, "language" => $langg->language->languagename,];
                  }),
                  "wMarks" => $d->examination->wrongmarks,
                  "rMarks" => $d->examination->rightmarks,
                  'noQues' => $d->examination->noQues,
                  "questionslist" => $d->examination->examQ->map(function ($fff) {
                    $aaa = false;
                    if ($fff->question->rightans == $fff->question->mockAttemp->QuesSelect) {
                      $aaa = true;
                    } else {
                      $aaa = false;
                    }
                    return collect([
                      "questionId" => $fff->question->mockAttemp->id,
                      "seen" => $fff->question->mockAttemp->QuesSeen,
                      "optSel" => $fff->question->mockAttemp->QuesSelect,
                      "time" => $fff->question->mockAttemp->time,
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
            });
          return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }
    public function render()
    {
        return view('livewire.user.mocktest-solution');
    }
}
