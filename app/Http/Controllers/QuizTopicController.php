<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QuizChapter;
use App\Models\QuizTopic;
use Illuminate\Http\Request;

class QuizTopicController extends Controller
{
    //

    public function index($quiz_chapters){
        $data['quiztop']=QuizTopic::where('quiz_chapters',$quiz_chapters)->get();
        $data['quizchapter']=QuizChapter::all();

        return view('quiz.insertQuiztopic',$data);
    }

    public function store(Request $request){
        $data= new QuizTopic();
        $data->name=$request->name;
        $data->quiz_chapters=$request->quiz_chapters;
        $data->slugid=md5($request->quiz_Topic .time());
        $data->save();

        return redirect()->back();
    }
    
    public function edit($id){
        $data['quiztop']=QuizTopic::find($id);
        $data['quizchapter']=QuizChapter::all();

        return view('quiz.editQuiztopic',$data);
    }

    public function update(Request $request,$id){
        $quiztop=QuizTopic::find($id);
        $quiztop->name=$request->name;
        $quiztop->quiz_chapters=$request->quiz_chapters;
        $quiztop->slugid=md5($request->quiz_Topic .time());
        $quiztop->save();

        return redirect()->route('quiz.topic'); 
    }

    public function destroy($slug){
        $sub=QuizTopic::where('slugid',$slug)->first();
    if (!empty($sub)) {
        $sub->delete();
        session()->flash('success', 'Service has been deleted !!!');
    } else {
        session()->flash('error', 'Please try again !!!');
    }
    return redirect()->route('quiz.topic'); 

    }
}