<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Category;
use App\Models\Examination;
use App\Models\livetest\liveAttemp;
use App\Models\livetest\liveExam;
use App\Models\SubCategory;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class LiveQuiz extends Component
{
   
    public $data;
    public $ifLoginData;

    public function checkLogin($id)
    {
        if (Auth::user()) {
            $this->ifLoginData = Examination::where('slugid',$id)->get();

        } else {
            return redirect()->route('user.login');
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

        // if (empty($request->user)) {
        //     return response()->json(['msg' => 'Enter User', 'status' => false]);
        //   }
        //   $user_id =  User::select('id')->where("slugid", $request->user)->first();
        //   if (!$user_id) {
        //     return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
        //   }
      
      
      
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
      
      
              $start = date("Y-m-d h:i:sa",$item->start);
              $ss = strtotime("now");
              $final_start = $item->start - $ss;
              $status = "start";
              if ($final_start < 0) {
                $status = "end";
              }
      
               $end =date("Y-m-d h:i:sa",$item->end);
      
              // $final_end = $end - $ss;
              // if ($final_end < 0) {
              //   $status = "end";
              // }
      
      
              return collect([
                "testId" => $TestID,
                "id" => $item->slugid,
                "final_start" => $start,
                "final_end" => $end,
                "status"=>$status,
                "name" => $item->exam_name,
                "totalQues" => $item->noques,
                "marks" => $item->marks,
                "type" => $type,
                "totalTimeinMints"=>$item->time_duration,
                "languages" => $item->lang->map(function ($lang) {
                  return collect([
                    "name" => $lang->language->languagename,
                    "id" => $lang->language->id
                  ]);
                })
              ]);
            });
            
    }
    public function render()
    {

        return view('livewire.user.live-quiz');
    }
}
