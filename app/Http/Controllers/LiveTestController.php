<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LiveTest;
use App\Models\Examination;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;

class LiveTestController extends Controller
{
    //

    public function index(){
        $data['live']=LiveTest::all();

        return view('quizExam.manageLivetest',$data);
    }

    public function create(){
        $data['live']=LiveTest::all();
        $data['examination']=Examination::all();
        $data['language']=Language::all();
        $data['user']=User::all();
        return view('quizExam.insertLivetest',$data);
    }

    public function store(Request $request){
      
      $data= new LiveTest();
     $data->user_id=$request->user_id;
     $data->examination_id=$request->examination_id;
     $data->language_id=$request->language_id;
     $data->startat=$request->startat;
      $data->exam_name=$request->exam_name;
      $data->slugid=md5($request->livetest .time());
      $data->rightmarks=$request->rightmarks;
      $data->wrongmarks=$request->wrongmarks;
      $data->remain_time=$request->remain_time;
      $data->type=$request->type;
      $data->totalmarks=$request->totalmarks;
      $data->time_duration=$request->time_duration;

      $data->save();

      return redirect()->route('live.test');
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
  
        return redirect()->route('live.test');
    }

    public function destroy($slug){
     $item=LiveTest::where('slugid',$slug)->first();

     if (!empty($item)) {
        $item->delete();
        session()->flash('success', 'Service has been deleted !!!');
     } else {
        session()->flash('error', 'Please try again !!!');
     }
     return redirect()->route('live.test');
   }
}
