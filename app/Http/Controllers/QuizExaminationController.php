<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QuizExamination;
use App\Models\QuizCategory;
use App\Models\QuizSubCategory;
use App\Models\QuizChapter;
use App\Models\QuizTopic;
use App\Models\Language;
use App\Models\QuizExaminationLanguage;
use Illuminate\Http\Request;

class QuizExaminationController extends Controller
{
    //
    public function index(){

        $data['quiz_exami']=QuizExamination::with('lang.language')->get();
       
        
        return view('quizExam.manageQuizExamination',$data);

    }

    public function create(){
        $data['quiz_exami']=QuizExamination::all();
        $data['quizcat']=QuizCategory::all();        
        $data['quizsub']=QuizSubCategory::all();        
        $data['quizchapt']=QuizChapter::all();        
        $data['quiztopic']=QuizTopic::all();
        $data['lang'] = Language::all();
        return view('quizExam.insertQuizExamination',$data);
 
    }

    public function store(Request $request){
        $data=new QuizExamination();
        $data->quiz_categories_id=$request->quiz_categories;
        if(!empty($request->quiz_sub_categories)){
        $data->quiz_sub_categories_id=$request->quiz_sub_categories;}
        if(!empty($request->quiz_chapters)){
        $data->quiz_chapters_id=$request->quiz_chapters;}
        if(!empty($request->quiz_topic)){
        $data->quiz_topics_id=$request->quiz_topic;}
        $data->exam_name=$request->exam_name;
        $data->noquizques=$request->noquizques;
        $data->rightmarks=$request->rightmarks;
        $data->wrongmarks=$request->wrongmarks;
        $data->marks=$request->marks;
        $data->isFree=$request->isfree;
        $data->time_duration=$request->time_duration;
        $data->slugid=md5($request->quizexamination.time());

        $data->save();

        $insertD = [];

        $myArray = explode(',', $request->lang);
        foreach ($myArray as $va) {
            $insertD[]=["quiz_examination_id"=>$data->id,"language_id"=>$va];
        }
QuizExaminationLanguage::insert($insertD);
        return redirect()->back();

    }

    public function edit($id){
        $data['quiz_exami']=QuizExamination::find($id);
        $data['quizcat']=QuizCategory::all();        
        $data['quizsub']=QuizSubCategory::all();        
        $data['quizchapt']=QuizChapter::all();        
        $data['quiztopic']=QuizTopic::all();
        
        return view('quizExam.editQuizExamination',$data);
    }

    public function update(Request $request,$id){

        $quiz_exami=QuizExamination::find($id);

        $quiz_exami->quiz_categories_id=$request->quiz_categories_id;
        $quiz_exami->quiz_sub_categories_id=$request->quiz_sub_categories_id;
        $quiz_exami->quiz_chapters_id=$request->quiz_chapters_id;
        $quiz_exami->quiz_topics_id=$request->quiz_topics_id;
        $quiz_exami->exam_name=$request->exam_name;
        $quiz_exami->rightmarks=$request->rightmarks;
        $quiz_exami->wrongmarks=$request->wrongmarks;
        $quiz_exami->time_duration=$request->time_duration;
        $quiz_exami->slugid=md5($request->quizexamination .time());
        

        $quiz_exami->save();

        return redirect()->route('quiz.examination');

    }

    public function destroy($slug){
        $sub=QuizExamination::where('slugid',$slug)->first();
        if (!empty($sub)) {
            $sub->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
        return redirect()->route('quiz.examination');
    }
}
