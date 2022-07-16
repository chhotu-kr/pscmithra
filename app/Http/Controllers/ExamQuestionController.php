<?php

namespace App\Http\Controllers;

use App\Models\ExamQuestion;
use App\Models\SecondQuestion;
use App\Models\Question;
use App\Models\Exam;
use App\Models\Topic;
use App\Models\Subject;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
{
   
    public function index($id)
    {
        //
        $data['id']= $id;
        $data['examquestion']=ExamQuestion::with('question.secondquestion.language')->get();
       

        // return dd($data);
       return view('admin.manageExamquestion',compact('data'));
    }

    public function submit(Request $request){

        if($request->isMethod("post")){
            $value = $request->data;

            foreach($value as $item){
                $inserting_array[] = [
                        'question_id' => $item,
                        'exam_id' => $request->exam_id
                ];
            }
            ExamQuestion::insert($inserting_array);
            return redirect()->back();
        }

        $questionId = ExamQuestion::select('question_id')->where('examination_id', $request->eID)->get()->toArray();
       
        $data=Question::with('secondquestion.language')->
        where('topic_id',$request->id)
        ->whereNotIn('id',$questionId)
        ->get();
        
        return response()->json($data);
       // return redirect()->route('examquestion.create');
    }

    public function filter($exam_id){
        $data['examquestion']=ExamQuestion::where('exam_id',$exam_id)->get();
        $data['exam']=Exam::all();
        $data['secondquestion']=SecondQuestion::all();
        return view('admin/insertExamquestion',$data);
    }

    public function create($id)
    {

       return view('admin.insertExamquestion',compact('id')); }

    public function store(Request $request)
    {
        //

        $data = new ExamQuestion();
        $data-> exam_id = $request->exam_id;
        $data-> question_id = $request->question_id;
        $data-> serialno = $request->serialno;
         $data-> slugid = md5($request->examquestion . time());
         $data->save();
          return redirect()->route('manage.examquestion');
    }

    
    public function show(ExamQuestion $examQuestion)
    {
        //
    }

    public function edit(ExamQuestion $examquestion,$id)
    {
        //
        $data['secondquestion']=SecondQuestion::all();
        $data['examquestion'] = ExamQuestion::find($id);
        $data['exam'] = Exam::all();
       return view('admin.editExamquestion',$data);
    }

   
    public function update(Request $request, ExamQuestion $examquestion)
    {
        //
        
      
        $examquestion-> exam_id = $request->exam_id;
        $examquestion-> question_id = $request->question_id;
        $examquestion-> serialno = $request->serialno;
         $examquestion-> slugid = md5($request->examname . time());
         $examquestion->save();
          return redirect()->route('examquestion.update');
    }

   
    public function destroy(ExamQuestion $examquestion,$slug)
    {
        
        $item= ExamQuestion::where('slugid', $slug)->first();
        
        if (!empty($item)) {
            $item->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }

      
       
        return redirect()->route('examquestion.index');
    }
}
