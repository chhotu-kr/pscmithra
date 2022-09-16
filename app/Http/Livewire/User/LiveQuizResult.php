<?php

namespace App\Http\Livewire\User;

use App\Models\livetest\liveAttemp;
use App\Models\livetest\liveAttempQuestion;
use App\Models\livetest\liveExam;
use App\Models\livetest\liveQuestion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LiveQuizResult extends Component
{
  public $data, $lang, $checked = false;
  public $returndata;
  public function selectLang($id)
  {
    $this->lang = $id;
    // dd($id);
    $this->checked = true;
  }
  public function result()
  {
    return redirect()->route('view.liveresult', ['testID' => $this->data['reAttempId'], 'examId' => $this->data['examId']]);
  }

  public function solution()
  {

    return redirect()->route('view.livesolution', ['testID' => $this->data['testID'], 'examId' => $this->data['examId']]);
  }
  public function reattempt()
  {
    // dd($ifLoginData);
    $user_id = Auth::id();
    $examination_id = liveExam::select('id', 'start', 'time_duration')->where("slugid", $this->data['examId'])->first();

    $start = $examination_id->start;
    $ss = strtotime("now");
    $final_start = $start - $ss;
    // dd($examination_id);
    if ($final_start < 0) {
      $get = liveAttemp::where('live_exams_id', $examination_id->id)->where('testtype', "reattemp")->where('users_id', $user_id)->first();
      // dd($get);

      if (empty($get)) {
        $Attemp = new liveAttemp();
        $Attemp->slugid = md5($user_id . time());
        $Attemp->live_exams_id = $examination_id->id;
        $Attemp->users_id = $user_id;
        $Attemp->language_id = $this->lang;
        // dd($examination_id);
        $Attemp->testtype = "reattemp"; 

        $Attemp->remain_time = $examination_id->time_duration * 60;
        $Attemp->save();
        $examQuestion =  liveQuestion::where('live_exams_id', $examination_id->id)->pluck('question_id');

        foreach ($examQuestion as $value) {

          $mock = new liveAttempQuestion();
          $mock->users_id =  $user_id;
          $mock->questions_id = $value;
          $mock->live_attemps_id = $Attemp->id;
          $mock->save();
        }
        $this->returnData['data'] = ['testId' => $Attemp->slugid, "examinationId" => $examination_id->id];

      } else {
        $get->lastQues = 0;
        $get->type = "resume";
        $get->remain_time = $examination_id->time_duration * 60;
        $get->save();

        $data =   liveAttempQuestion::where('live_attemps_id', $get->id)->where('users_id', $user_id)->update([
          "QuesSeen" => "false",
          "QuesSelect" => "",
          "time" => 0,
        ]);

        $this->returndata['data'] = ['testId' => $get->slugid, "examinationId" => $examination_id->id];
      }
    } 
    return redirect()->route('quiz.livequizstart', $this->returndata);

  }
  public function mount($testid, $examinationId)
  {

    $user_id = Auth::id();

    $examination_id =  liveExam::select('id')->where("slugid", $examinationId)->first();

    $testId =  liveAttemp::select('id', 'type')->where("slugid", $testid)->first();



    if ($testId->type == "resume") {

      return response()->json(['msg' => 'Test not Complete', 'status' => false]);
    }


    $this->data = liveAttemp::with(
      ['examination' => function ($q) use ($testId, $user_id) {

        $q->with(['examQ' => function ($q) use ($testId, $user_id) {

          $q->with(['question.liveAttemp' => function ($q) use ($testId, $user_id) {
            $q->where('live_attemps_id', $testId->id)->where('users_id', $user_id)->orderBy('questions_id', 'DESC');
          }]);
        }])->with(['attm' => function ($aaa) {
          $aaa->where('testtype', 'reattemp');
        }]);
      }]
    )
      ->where('slugid', $testid)->where('users_id', $user_id)->where('live_exams_id', $examination_id->id)
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
            "time" => $d->examination->time_duration * 60,
            "timeTaken" => ($d->examination->time_duration * 60) - $d->remain_time,
            "languages" => $d->examination->lang->map(function ($langg) {
              return [
                "id" => $langg->language->id,
                "language" => $langg->language->languagename,
              ];
            }),
            "wMarks" => $d->examination->wrongmarks,
            "rMarks" => $d->examination->rightmarks,
            'noQues' => $d->examination->noQues,
            "reAttempId" => $reattempId,
            "reAttempResult" => $reattempResult,
            "questionslist" => $d->examination->examQ->map(function ($fff, $key) {

              $resaaa = "skip";
              if ($fff->question->liveAttemp->QuesSeen == "true") {
                if (empty($fff->question->liveAttemp->QuesSelect)) {
                  $color = "#797980";
                  $resaaa = "skip";
                } else if ($fff->question->rightans != $fff->question->liveAttemp->QuesSelect) {
                  $color = "#FF0000";
                  $resaaa = "wrong";
                } else if ($fff->question->rightans = $fff->question->liveAttemp->QuesSelect) {
                  $color = "#008000";
                  $resaaa = "right";
                }
              } else {
                $color = "#3e3a3a";
                $resaaa = "unseen";
              }


              return collect([
                "questionId" => $key + 1,
                "color" => $color,
                "final" => $resaaa,

              ]);
            }),

          ];
        }
      )[0];


    $right = count($this->data['questionslist']->where('final', 'right'));
    $wrong = count($this->data['questionslist']->where('final', 'wrong'));
    $attemped = $right + $wrong;

    $this->data['unseen'] = count($this->data['questionslist']->where('final', 'unseen'));
    $this->data['right'] = $right;
    $this->data['wrong'] = $wrong;
    $this->data['skip'] = count($this->data['questionslist']->where('final', 'skip'));
    $this->data['attemped'] = $attemped;
    if ($attemped > 0) {
      $this->data['accuracy'] = $right / $attemped;
    } else {
      $this->data['accuracy'] = 0;
    }

    $this->data['Percentile'] = 0;
    $this->data['Rank'] = 50;
    // dd($this->data);

    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $this->data]);
  }

  public function render()
  {
    return view('livewire.user.live-quiz-result');
  }
}
