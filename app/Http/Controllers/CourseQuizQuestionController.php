<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseQuizQuestion;
use App\Models\SecondQuestion;
use App\Models\Question;
use App\Models\Topic;
use App\Models\QuizExamination;
class CourseQuizQuestionController extends Controller
{
    //
    public function index($id){
        $data['id']= $id;
        $data['cqq']=CourseQuizQuestion::with('question.secondquestion.language')->get();
       

        // return dd($data);
       return view('CourseQuiz.manageCquizques',compact('data'));
    }

    public function create($id){
        return view('CourseQuiz.insertCQuizQues',compact('id'));
    }

    public function CourseQuizSubmit(Request $request){
        if($request->isMethod("post")){
            $value = $request->data;

            foreach($value as $item){
                $inserting_array[] = [
                        'question_id' => $item,
                        'quiz_examinations_id' => $request->quiz_examinations_id
                ];
            }
            CourseQuizQuestion::insert($inserting_array);
            return redirect()->back();
        }

        $questionId =CourseQuizQuestion::select('question_id')->where('quiz_examinations_id', $request->eID)->get()->toArray();
       
        $data=Question::with('secondquestion.language')->
        where('topic_id',$request->id)
        ->whereNotIn('id',$questionId)
        ->get();
        
        return response()->json($data);
    }

    public function store(Request $request){
      

foreach($request->data as $value){
    $data = new CourseQuizQuestion();
        $data-> quiz_examinations_id = $request->quiz_examinations_id;
        $data-> question_id = $value;
       
       //  $data-> slugid = md5('dfegfe'. time().'ff454tgw');
         $data->save();

}
        return redirect()->back();
    }

    public function edit($id){
        $data['secondquestion']=SecondQuestion::all();
        $data['cqq'] = CourseQuizQuestion::find($id);
        $data['quizexam'] = QuizExamination::all();
       return view('admin.editQuizquestion',$data);
    }

    public function update(Request $request,$id){
        $Cquizquestion=CourseQuizQuestion::find($id);
        $Cquizquestion-> quiz_examinations_id = $request->quiz_examinations_id;
        $Cquizquestion-> question_id = $request->question_id;
       
        //  $Cquizquestion-> slugid = md5($request->coursequizquestion . time());
         $Cquizquestion->save();

         return redirect()->route('manage.Cquizquestion');
    }

    public function destroy($id){
        // $item=CourseQuizQuestion::where('slugid', $slug)->first();
        
        // if (!empty($item)) {
        //     $item->delete();
        //     session()->flash('success', 'Service has been deleted !!!');
        // } else {
        //     session()->flash('error', 'Please try again !!!');
        // }

        $cqq=CourseQuizQuestion::find($id);
        $cqq->delete();

        return redirect()->route('manage.Cquizquestion');
    }
}
