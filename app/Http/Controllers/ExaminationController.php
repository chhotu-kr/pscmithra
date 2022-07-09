<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Examination;
use App\Models\Exam;
use App\Models\SecondQuestion;

class ExaminationController extends Controller
{
    //
    public function index(){
        $data['exam']=Exam::all();
        $data['examination']=Examination::all();
        $data['category']=Category::all();
        $data['subcategory']=SubCategory::all();
        $data['secondquestion']=SecondQuestion::all();
        return view('admin.manageExamination',$data);
    }
    public function Create(){
        $data['exam']=Exam::all();
        $data['examination']=Examination::all();
        $data['category']=Category::all();
        $data['subcategory']=SubCategory::all();
        $data['secondquestion']=SecondQuestion::all();
        return view('admin.insertExamination',$data);
    }

    public function storeExamination(Request $request){
        $data= new Examination();
        $data->exam_id=$request->exam_id;
        $data->category_id=$request->category_id;
        $data->subcategory_id=$request->subcategory_id;
        $data->exam_name=$request->exam_name;
        $data->question=$request->question;
        $data->startat=$request->startat;
        $data->rightmarks=$request->rightmarks;
        $data->wrongmarks=$request->wrongmarks;
        $data->time_duration=$request->time_duration;
       
        $data->save();
        return redirect('/examination');
    } 
}
