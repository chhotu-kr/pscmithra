<?php

namespace App\Http\Livewire\User;

use App\Models\QuizCategory;
use App\Models\QuizExamination;
use App\Models\QuizSubCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class QuizAttempt extends Component
{
    public $data;
    public $ifLoginData;
    public function checkLogin($id)
    {
        if (Auth::user()) {
            $this->ifLoginData = QuizExamination::where('slugid',$id)->get();

        } else {
            return redirect()->route('user.login');
        }
    }

     public function mount($cat ,$sub_cat,$chapter,$topic){
    
      
        // if (empty($request->user)) {
        //     return response()->json(['msg' => 'Enter User', 'status' => false]);
        //   }
        //   $user_id =  User::select('id')->where("slugid", $request->user)->first();
        //   if (!$user_id) {
        //     return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
        //   }
        //   $quiz_categories_id = $request->quiz_categories_id;
        //   if (empty($quiz_categories_id)) {
        //     return response()->json(['msg' => 'Enter QuizCategory Id', 'status' => false]);
        //   }
        //   $quiz_sub_categories_id = $request->quiz_sub_categories_id;
      
        //   $quiz_chapters_id = $request->quiz_chapters_id;
      
        //   $quiz_topics_id = $request->quiz_topics_id;
      
        $user_id = 0;
        if (Auth::user()) {
            $user_id = Auth::user()->id;
        } else {
            $user_id = 0;
        }
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
   
     }

    public function render()
    {
        
        return view('livewire.user.quiz-attempt');
    }
}
