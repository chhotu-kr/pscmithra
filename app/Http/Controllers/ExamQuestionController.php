<?php

namespace App\Http\Controllers;

use App\Models\ExamQuestion;
use App\Models\Question;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['examquestion']=ExamQuestion::all();
        $data['question']=Question::all();
        $data['exam']=Exam::all();
       return view('admin.insertExamquestion',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $data = new ExamQuestion();
        $data-> exam_id = $request->exam_id;
        $data-> question_id = $request->question_id;
        $data-> serialno = $request->serialno;
         $data-> slugid = md5($request->examquestion . time());
         $data->save();
          return redirect()->route('examquestion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(ExamQuestion $examQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamQuestion $examQuestion,$id)
    {
        //
        $data['examquestion'] = ExamQuestion::find($id);
       return view('admin.editQuestion',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamQuestion $examQuestion)
    {
        //
        
      
        $examQuestion-> exam_id = $request->exam_id;
        $examQuestion-> question_id = $request->question_id;
        $examQuestion-> serialno = $request->serialno;
         $examQuestion-> slugid = md5($request->examname . time());
         $examQuestion->save();
          return redirect()->route('examquestion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamQuestion $examQuestion)
    {
        
        // $item= ExamQuestion::where('slugid', $slug)->first();
        
        // if (!empty($item)) {
        //     $item->delete();
        //     session()->flash('success', 'Service has been deleted !!!');
        // } else {
        //     session()->flash('error', 'Please try again !!!');
        // }

        $examQuestion->delete();
       
        return redirect()->route('examquestion.index');
    }
}
