<?php

namespace App\Http\Livewire\User;

use App\Models\AttempedExam;
use App\Models\Examination;
use App\Models\ExamQuestion;
use App\Models\mockattempquestion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MocktestResult extends Component
{
  public $data, $lang, $checked = false;
  public $returndata;


  public function result()
  {
    return redirect()->route('view.mocktestresult', ['testID' => $this->data['reAttempId'], 'examId' => $this->data['examId']]);
  }

  public function reattempt()
  {
    
    $user = Auth::id();
    $examination_id = Examination::select('id', 'time_duration')->where("slugid", $this->data['examId'])->first();
    // dd($singleData);

    $get = AttempedExam::where('examinations_id', $examination_id->id)->where('mocktesttype', "reattemp")->where('users_id', $user)->first();

    if (empty($get)) {

      $Attemp = new AttempedExam();
      $Attemp->slugid = md5($examination_id->id . time());
      $Attemp->examinations_id = $examination_id->id;
      $Attemp->users_id = $user;
      $Attemp->language_id = $this->lang;
      $Attemp->remain_time = $examination_id->time_duration * 60;
      $Attemp->mocktesttype = "reattemp"; //here
      $Attemp->save();

      $examQuestion =  ExamQuestion::where('examination_id', $examination_id->id)->pluck('question_id');
      // $insertData = [];
      foreach ($examQuestion as $value) {

        $mock = new mockattempquestion();
        $mock->users_id =  $user;
        $mock->questions_id = $value;
        $mock->attemped_exams_id = $Attemp->id;
        $mock->save();
      }
      $this->returndata['data'] = ['testId' => $Attemp->slugid, "examinationId" => $examination_id->id];
    } else {
      $get->lastQues = 0;
      $get->type = "resume";
      $get->remain_time = $examination_id->time_duration * 60;
      $get->save();

      $data =   mockattempquestion::where('attemped_exams_id', $get->id)->where('users_id', $user)->update([
        "QuesSeen" => "false",
        "QuesSelect" => "",
        "time" => 0,
      ]);

      $this->returndata['data'] = ['testId' => $get->slugid, "examinationId" => $examination_id->id];
    }
    //   mockattempquestion::insert($insertData);
    return redirect()->route('view.mockteststart', $this->returndata);
  }
  public function selectLang($id)
  {
    $this->lang = $id;
    // dd($id);
    $this->checked = true;
  }
  public function solution()
  {

    return redirect()->route('view.mocktestsolution', ['testID' => $this->data['testID'], 'examId' => $this->data['examId']]);
  }
  public function mount($testid, $examinationId)
  {
    $user_id = Auth::id();
    $examination_id =  Examination::select('id')->where("slugid", $examinationId)->first();


    $testId =  AttempedExam::select('id', 'type')->where("slugid", $testid)->first();
    //  dd($examinationId);

    if ($testId->type == "resume") {

      return response()->json(['msg' => 'Test not Complete', 'status' => false]);
    }


    $this->data = AttempedExam::with(
      ['examination' => function ($q) use ($testId, $user_id) {

        $q->with(['examQ' => function ($q) use ($testId, $user_id) {

          $q->with(['question.mockAttemp' => function ($q) use ($testId, $user_id) {
            $q->where('attemped_exams_id', $testId->id)->where('users_id', $user_id)->orderBy('questions_id', 'DESC');
          }]);
        }])->with(['attm' => function ($aa) {
          $aa->where('mocktesttype', 'reattemp');
        }]);
      }]
    )
      ->where('slugid', $testid)->where('users_id', $user_id)->where('examinations_id', $examination_id->id)
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

          // dd([$d->totalmarks , $d->examination->marks]);
          $per = ($d->totalmarks / $d->examination->marks) * 100;
          $per < 0 ? $per = 0 : $per;
          return [
            "score" => $d->totalmarks,
            "percentage" => $per,
            "testID" => $d->slugid,
            "examId" => $d->examination->slugid,
            "type" => $d->mocktesttype,
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
              // dd($fff->question->rightans);
              $resaaa = "skip";
              if ($fff->question->mockAttemp->QuesSeen == "true") {
                if (empty($fff->question->mockAttemp->QuesSelect)) {
                  $color = "#797980";
                  $resaaa = "skip";
                } else if ($fff->question->rightans != $fff->question->mockAttemp->QuesSelect) {
                  $color = "#FF0000";
                  $resaaa = "wrong";
                } else if ($fff->question->rightans = $fff->question->mockAttemp->QuesSelect) {
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

    $rightmarks = $this->data['right'] * $this->data['rMarks'];
    $wrongmarks = $this->data['wrong'] * $this->data['wMarks'];
    $totalmarksobtained = $rightmarks - $wrongmarks;


    // dd($this->data);
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $this->data]);
  }
  public function render()
  {
    return view('livewire.user.mocktest-result');
  }
}
