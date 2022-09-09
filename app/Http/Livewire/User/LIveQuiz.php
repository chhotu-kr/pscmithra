<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Category;
use App\Models\Examination;
use App\Models\livetest\liveAttemp;
use App\Models\livetest\liveAttempQuestion;
use App\Models\livetest\liveExam;
use App\Models\livetest\liveQuestion;
use App\Models\SubCategory;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class LiveQuiz extends Component
{

  public $data;
  public $ifLoginData;
  public $singleData;
  public $returnData;
  public $lang = null;
  public $itemId = null;

  public function itemId($id)
  {
    $this->itemId = $id;
  }
  public function selectLang($id)
  {
    $this->lang = $id;
    // dd($id);
  }
  public function prepareExam($ifLoginData)
  {

    $user_id = 1;
    $examination_id =  liveExam::select('id', 'start')->where("slugid", $ifLoginData['id'])->first();

    $start = $examination_id->start;
    $ss = strtotime("now");
    $final_start = $start - $ss;
    // dd($examination_id);
    if ($final_start > 0) {
      $get = liveAttemp::where('live_exams_id', $examination_id->id)->where('users_id', $user_id)->first();
      // dd($get);

      if (empty($get)) {
        $Attemp = new liveAttemp();
        $Attemp->slugid = md5($user_id . time());
        $Attemp->live_exams_id = $examination_id->id;
        $Attemp->users_id = $user_id;
        $Attemp->language_id = $this->lang;
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
        // dd($this->returnData);
        return redirect()->route('quiz.livequizstart', $this->returnData);
        // return response()->json(['msg' => 'Exam Created', 'status' => true, 'data' => ['testId' => $Attemp->slugid, "examinationId" => $request->examination]]);
      } else {
        return dd(['msg' => 'Exam already exist', 'status' => false]);
      }
    } else {
      return dd(['msg' => 'Exam not Start', 'status' => false]);
    }
    //   mockattempquestion::insert($insertData);
  }

  public function checkLogin()
  {
    if($this->itemId != null){
      if (Auth::user()) {
        // return redirect()->route('user.login');
      } else {
        $this->ifLoginData =  $this->data->where('id', $this->itemId)->first();

        if ($this->ifLoginData['type'] == "Start") {
         if($this->lang == null){
          return session()->flash('select', 'Select a language');
         }
         else{

          $this->prepareExam($this->ifLoginData);
         }

        } else if ($this->ifLoginData['type'] == "Prepare") {
          return dd($this->ifLoginData['name']);
        }
      }
    }
  }


  public function mount()
  {

    $user_id = 0;
    if (Auth::user()) {
      $user_id = Auth::user()->id;
    } else {
      $user_id = 0;
    }



    $ids = liveAttemp::where('users_id', $user_id)->where('testtype', 'normal')->where('type', 'result')->pluck('live_exams_id')->all();

    $this->data = liveExam::with('lang.language')->with(
      'attm',
      function ($query) use ($user_id) {
        $query->where('users_id', $user_id)->where('testtype', 'normal');
      }
    )->whereNotIn('id', $ids)

      ->get()
      ->map(function ($item) {
        $free = $item->isFree;
        $type = "Buy";
        $TestID = "";

        if (empty($item->attm)) {

          if ($free) {
            $type = "Start";
            $TestID = "";
          } else {
          }
        } else {
          $type = $item->attm->type;
          $TestID =  $item->attm->slugid;
        }


        $start = date("Y-m-d h:i:sa", $item->start);
        $ss = strtotime("now");
        $final_start = $item->start - $ss;
        $status = "start";
        if ($final_start < 0) {
          $status = "end";
        }

        $end = date("Y-m-d h:i:sa", $item->end);

        // $final_end = $end - $ss;
        // if ($final_end < 0) {
        //   $status = "end";
        // }


        return collect([
          "testId" => $TestID,
          "id" => $item->slugid,
          "final_start" => $start,
          "final_end" => $end,
          "status" => $status,
          "name" => $item->exam_name,
          "totalQues" => $item->noques,
          "marks" => $item->marks,
          "type" => $type,
          "totalTimeinMints" => $item->time_duration,
          "languages" => $item->lang->map(function ($lang) {
            return collect([
              "name" => $lang->language->languagename,
              "id" => $lang->language->id
            ]);
          })
        ]);
      });
    // dd($this->data);
  }
  public function render()
  {

    return view('livewire.user.live-quiz');
  }
}
