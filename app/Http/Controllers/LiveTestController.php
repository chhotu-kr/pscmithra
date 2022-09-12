<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Admin\LiveExam\SelectQuestion;
use App\Models\LiveTest;
use App\Models\Examination;
use App\Models\Language;
use App\Models\livetest\livelanguage;

use App\Models\livetest\liveExam;
use App\Models\livetest\liveQuestion;
use App\Models\Question;
use App\Models\User;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;

class LiveTestController extends Controller
{
    //

    

    public function getliveSubmit(Request $request){
     
      
      $questionId = liveQuestion::select('question_id')->where('live_exams_id', $request->eID)->get()->toArray();
       
      $data=Question::with('secondquestion.language')->
      where('topic_id',$request->id)
      ->whereNotIn('id',$questionId)
      ->get();
      
      return response()->json($data);

   }

    public function getliveQuestioncreate($id){
      
      return view('quizExam.insertLiveQues',compact('id'));
   }



   public function liveQues(Request $request){
    $value = $request->data;

    foreach($value as $item){
        $inserting_array[] = [
                'question_id' => $item,
                'live_exams_id' => $request->quiz_examinations_id,
                'slugid'=>md5($item. time().$request->quiz_examinations_id)
        ];
    }
    liveQuestion::insert($inserting_array);
    return redirect()->back();
}



    public function ques($id){
      $data['id']= $id;
      $data['quizquestion']=liveQuestion::with('question.secondquestion.language')->where('live_exams_id',$id)->get();
    
      // return dd($data);
     return view('quizExam/manageLiveQues',compact('data'));
  }

    public function index(){
        $data['live']=liveExam::all();

        return view('quizExam/manageLiveTest',$data);
    }

    public function create(){
        $data['lang'] = Language::all();
        return view('quizExam.insertLivetest',$data);
    }

    public function store(Request $request){
      

      $start = strtotime($request->sdate." ".$request->stime);
      $end = strtotime($request->edate." ".$request->etime);

      $data= new LiveExam();

      $data->exam_name=$request->exam_name;
      $data->noques=$request->noquizques;
      $data->rightmarks=$request->rightmarks;
      $data->wrongmarks=$request->wrongmarks;
$data->start = $start;
$data->end= $end;
      $data->time_duration= $request->time_duration;
      $data->marks=$request->marks;
      if(!empty($request->isFree)){
        $data->isFree=$request->isFree;
    }
    
      $data->slugid=md5($request->quizexamination.time());
      $data->save();
      $insertD = [];
        $myArray = explode(',', $request->lang);
        foreach ($myArray as $va) {
            $insertD[]=["live_exams_id"=>$data->id,"language_id"=>$va];
        }
        livelanguage::insert($insertD);

      return redirect()->back();
    }

    public function edit($id){
    $data['live']=LiveTest::find($id);
    $data['examination']=Examination::all();
    $data['language']=Language::all();
    $data['user']=User::all();
    return view('quizExam.editlivetest',$data);
    }

    public function update(Request $request,$id){
        $live=LiveTest::find($id);
        $live->user_id=$request->user_id;
        $live->examination_id=$request->examination_id;
        $live->language_id=$request->language_id;
        $live->startat=$request->startat;
        $live->exam_name=$request->exam_name;
        $live->rightmarks=$request->rightmarks;
        $live->wrongmarks=$request->wrongmarks;
        $live->remain_time=$request->remain_time;
        $live->type=$request->type;
        $live->totalmarks=$request->totalmarks;
        $live->time_duration=$request->time_duration;
        $live->slugid=md5($request->livetest .time());
  
        $live->save();
  
        return redirect()->back();
    }

    public function destroy($slug){
     $item=LiveTest::where('slugid',$slug)->first();

     if (!empty($item)) {
        $item->delete();
        session()->flash('success', 'Service has been deleted !!!');
     } else {
        session()->flash('error', 'Please try again !!!');
     }
     return redirect()->back();
   }
}
