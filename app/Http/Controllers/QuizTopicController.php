<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QuizChapter;
use App\Models\QuizTopic;
use Illuminate\Http\Request;

class QuizTopicController extends Controller
{
    //

    public function index(){
        $data['quiztop']=QuizTopic::all();
        $data['quizchapter']=QuizChapter::all();

        return view('quiz.insertQuiztopic',$data);
    }

    public function store(Request $request){
        $data= new QuizTopic();
        $data->name=$request->name;
        $data->quiz_chapters=$request->quiz_chapters;
        $data->slugid=md5($request->quiz_Topic .time());
        $data->save();

        return redirect()->route('quiz.topic');
    }
    
    public function edit($id){
        $data['quiztop']=QuizTopic::find($id);
        $data['quizchapter']=QuizChapter::all();

        return view('quiz.editQuiztopic',$data);
    }

    public function
}
