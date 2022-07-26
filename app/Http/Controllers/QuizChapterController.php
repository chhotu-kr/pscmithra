<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QuizChapter;
use App\Models\QuizSubCategory;
use Illuminate\Http\Request;

class QuizChapterController extends Controller
{
    //
    public function index($quiz_sub_categories){
        $data['quizchapter']=QuizChapter::where('quiz_sub_categories',$quiz_sub_categories)->get();
        $data['quizsubcat']=QuizSubCategory::all();
        return view('quiz.insertQuizchat',$data);
    }

    public function store(Request $request){
        $data= new QuizChapter();
        $data->name=$request->name;
        $data->quiz_sub_categories=$request->quiz_sub_categories;
        $data->slugid=md5($request->quiz_Chapter .time());
        $data->save();

        return redirect()->back();
    }

    public function edit($id){
        $data['quizchapter']=QuizChapter::find($id);
        $data['quizsubcat']=QuizSubCategory::all();

        return view('quiz.editQuizchapter',$data);
    }

    public function update(Request $request,$id){
        $quizchapter=QuizChapter::find($id);
        $quizchapter->name=$request->name;
        $quizchapter->quiz_sub_categories=$request->quiz_sub_categories;
        $quizchapter->slugid=md5($request->quiz_Chapter .time());
        $quizchapter->save();

        return redirect()->route('quiz.chapter'); 
    }

    public function destroy($slug){
        $sub=QuizChapter::where('slugid',$slug)->first();
        if (!empty($sub)) {
            $sub->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
        return redirect()->route('quiz.chapter'); 
    }
}
