<?php

namespace App\Http\Livewire\User;

use App\Models\quizAttemp;
use App\Models\QuizAttemptQuestion;
use App\Models\QuizCategory;
use App\Models\QuizExamination;
use App\Models\QuizQuestion;
use App\Models\QuizSubCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class QuizAttempt extends Component
{
  public $data;
  public $ifLoginData;
  public $lang = null;
  public $itemId = null;
  public $returndata;
  public $checked = false;

  public function itemId($id)
  {
   if(Auth::user()){
    $this->itemId = $id;
   }
   else{
   return redirect()->route('user.login');
   }
  }
  public function selectLang($id)
  {
    $this->lang = $id;
    $this->checked = true;
    // dd($id);
  }
  public function resume($testId)
  {
    $resumeData = $this->data->where('testId', $testId)->first();

    $quiz_examinations_id =  QuizExamination::select('id', 'time_duration')->where("slugid", $resumeData['id'])->first();

    $returndata['data'] = ['testId' => $testId, "examinationId" => $quiz_examinations_id->id];

    return redirect()->route('view.quizpagestart', $returndata);
  }
  public function result($testId)
  {
    $resultdata = $this->data->where('testId',$testId)->first();
       
    return redirect()->route('view.quizresult', ['testID' => $testId, "examId" => $resultdata['id']]);
  }
  public function prepareExam($ifLoginData)
  {
    $user = Auth::id();
    $quiz_examinations_id =  QuizExamination::select('id', 'time_duration')->where("slugid", $ifLoginData['id'])->first();
    $get = quizAttemp::where('quiz_examinations_id', $quiz_examinations_id->id)->where('testtype', $ifLoginData['type'])->where('users_id', $user)->first();

    // dd($get);
    if (empty($get)) {
      $Quiz = new quizAttemp();
      $Quiz->slugid = md5($quiz_examinations_id->id . time());
      $Quiz->quiz_examinations_id = $quiz_examinations_id->id;
      $Quiz->users_id = $user;
      $Quiz->language_id = $this->lang;
      $Quiz->remain_time = $quiz_examinations_id->time_duration * 60;
      $Quiz->testtype = 'normal';
      $Quiz->save();
      $examQuestion =  QuizQuestion::where('quiz_examinations_id', $quiz_examinations_id->id)->pluck('question_id');
      foreach ($examQuestion as $value) {

        $mock = new QuizAttemptQuestion();
        $mock->users_id =  $user;
        $mock->question_id = $value;
        $mock->quiz_attemps_id = $Quiz->id;
        $mock->save();
      }

      $this->returndata['data'] = ['testId' => $Quiz->slugid, "examinationId" => $quiz_examinations_id->id];
      // dd($this->returndata);

      // return response()->json(['msg' => 'Quiz Created', 'status' => true, 'data' => ['testId' => $Quiz->slugid, "examinationId" => $request->quizexamination]]);
    } else {

      if ($ifLoginData['type'] == "reattemp") {
        $get->lastQues = 0;
        $get->type = "resume";
        $get->language_id = 1;
        $get->remain_time = $quiz_examinations_id->time_duration * 60;
        $get->save();

        $testId = $get->id;
        $data =   QuizAttemptQuestion::where('quiz_attemps_id', $testId)->where('users_id', $user)->update([
          "QuesSeen" => "false",
          "QuesSelect" => "",
          "time" => 0,
        ]);

        $this->returndata['data'] = ['testId' => $get->slugid, "examinationId" => $quiz_examinations_id->id];


        // return response()->json(['msg' => 'Quiz Created', 'status' => true, 'data' => ['testId' => $get->slugid, "examinationId" => $quiz_examinations_id->id]]);
      } else {
        return response()->json(['msg' => 'Quiz already exist', 'status' => false]);
      }
    }
    // dd($this->returndata);
    return redirect()->route('view.quizpagestart', $this->returndata);
  }


  public function checkLogin()
  {

    if ($this->itemId != null) {

      if (Auth::user()) {
        $this->ifLoginData = $this->data->where('id', $this->itemId)->first();
        if ($this->ifLoginData['type'] == "Start") {

          if ($this->lang != null) {
            $this->prepareExam($this->ifLoginData);
          } else {
            return session()->flash('select', 'Select a language');
          }
        } else if ($this->ifLoginData['type'] == "Prepare") {
          return dd($this->ifLoginData['name']);
        }
      } else {
        return redirect()->route('user.login');
      }
    }
  }



  public function mount($cat, $sub_cat, $chapter, $topic)
  {
    // dd($sub_cat);
    $user_id = Auth::id();
    $this->data = QuizExamination::where('quiz_categories_id', $cat)->where('quiz_sub_categories_id', $sub_cat)
      ->where('quiz_chapters_id', $chapter)->where('quiz_topics_id', $topic)
      ->with('quizCat', 'quizsubcat', 'quizChat', 'quiztopic', 'lang.language')->with(['quizattm' => function ($qc) use ($user_id) {
        $qc->where('users_id', $user_id);
      }])


      ->get()
      ->map(function ($item) {
        //    return $item;

        $free = $item->isFree;
        $type = "Buy";
        $TestID = "";

        if (empty($item->quizattm)) {

          if ($free) {
            $type = "Start";
          } else {
          }
        } else {
          $type = $item->quizattm->type;
          $TestID =  $item->quizattm->slugid;
        }

        return collect([
          "testId" => $TestID,
          "id" => $item->slugid,

          "name" => $item->exam_name,
          "totalTimeinMints" => $item->time_duration,
          "totalQues" => $item->noquizques,
          "type" => $type,
          "totalTimeinMints" => $item->time_duration,
          "languages" => $item->lang->map(function ($lang) {
            return collect([

              "name" => $lang->language->languagename,
              "id" => $lang->language->id,

            ]);
          })
        ]);
      });
    // dd($this->data);
  }

  public function render()
  {

    return view('livewire.user.quiz-attempt');
  }
}
