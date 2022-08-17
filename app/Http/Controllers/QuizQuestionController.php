<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuizQuestion;
use App\Models\Question;
use App\Models\SecondQuestion;
use App\Models\Topic;
use App\Models\QuizExamination;
class QuizQuestionController extends Controller
{
    //

    public function index($id){
        $data['id']= $id;
        $data['quizquestion']=QuizQuestion::with('question.secondquestion.language')->get();
       

        // return dd($data);
       return view('quiz.manageQuizques',compact('data'));
    }

    public function get_QuizQuestioncreate($id){
       return view('quiz.insertQuizQues',compact('id'));
    }

    public function get_QuizSubmit(Request $request){
        // if($request->isMethod("post")){
        //     $value = $request->data;

        //     foreach($value as $item){
        //         $inserting_array[] = [
        //                 'question_id' => $item,
        //                 'quiz_examinations_id' => $request->quiz_examinations_id
        //         ];
        //     }
        //     QuizQuestion::insert($inserting_array);
        //     return redirect()->back();
        // }

        $questionId = QuizQuestion::select('question_id')->where('quiz_examinations_id', $request->eID)->get()->toArray();
       
        $data=Question::with('secondquestion.language')->
        where('topic_id',$request->id)
        ->whereNotIn('id',$questionId)
        ->get();
        
        return response()->json($data);
    }

    public function QuizQues(Request $request){
        $value = $request->data;

        foreach($value as $item){
            $inserting_array[] = [
                    'question_id' => $item,
                    'quiz_examinations_id' => $request->quiz_examinations_id,
                    'slugid'=>md5($item. time().$request->quiz_examinations_id)
            ];
        }
        QuizQuestion::insert($inserting_array);
        return redirect()->back();
    }

    public function store(Request $request){
        $data = new QuizQuestion();
        $data-> quiz_examinations_id = $request->quiz_examinations_id;
        $data-> question_id = $request->question_id;
       
         $data-> slugid = md5('dfegfe'. time().'ff454tgw');
         $data->save();
          return redirect()->route('manage.quizquestion');
    }

    public function edit($id){
        $data['secondquestion']=SecondQuestion::all();
        $data['quizquestion'] = QuizQuestion::find($id);
        $data['quizexam'] = QuizExamination::all();
       return view('admin.editQuizquestion',$data);
    }

    public function update(Request $request,$id){
        $quizquestion=QuizQuestion::find($id);
        $quizquestion-> examination_id = $request->examination_id;
        $quizquestion-> question_id = $request->question_id;
        $quizquestion-> serialno = $request->serialno;
         $quizquestion-> slugid = md5($request->examname . time());
         $quizquestion->save();

         return redirect()->route('manage.quizquestion');
    }

    public function destroy($slug){
        $item= QuizQuestion::where('slugid', $slug)->first();
        
        if (!empty($item)) {
            $item->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }

        return redirect()->route('manage.quizquestion');
    }
}
