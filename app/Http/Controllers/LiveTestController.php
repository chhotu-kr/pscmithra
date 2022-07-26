<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LiveTest;
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

        return view('quizExam.insertLivetest',$data);
    }

    public function store(Request $request){
      
      $data= new LiveTest();
     $data->startat=$request->startat;
      $data->exam_name=$request->exam_name;
      $data->slugid=md5($request->livetest .time());
      $data->rightmarks=$request->rightmarks;
      $data->wrongmarks=$request->wrongmarks;
      $data->time_duration=$request->time_duration;

      $data->save();

      return redirect()->route('live.test');
    }

    public function edit($id){
    $data['live']=LiveTest::find($id);

    return view('quizExam.editlivetest',$data);
    }

    public function update(Request $request,$id){
        $live=LiveTest::find($id);
        $live->startat=$request->startat;
        $live->exam_name=$request->exam_name;
        $live->rightmarks=$request->rightmarks;
        $live->wrongmarks=$request->wrongmarks;
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
