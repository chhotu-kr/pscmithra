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
        // $data['exam']=Exam::all();
        $data['examination']=Examination::all();
        // $data['category']=Category::all();
        // $data['subcategory']=SubCategory::all();
        // $data['secondquestion']=SecondQuestion::all();
        return view('admin.manageExamination',$data);
    }
    public function Create(){
      
        $data['examination']=Examination::all();
         $data['category']=Category::all();
         $data['subcategory']=SubCategory::all();
         $data['secondquestion']=SecondQuestion::all();
        return view('admin.insertExamination',$data);
    }

    public function storeExamination(Request $request){
        $data= new Examination();
      
        $data->category_id=$request->category_id;
        $data->subcategory_id=$request->subcategory_id;
        $data->exam_name=$request->exam_name;
        // $data->question=$request->question;
       
        $data->marks=$request->marks;
      
        $data->time_duration=$request->time_duration;
        $data-> slugid = md5($request->exam_name . time());
        $data->save();
        return redirect('/examination');
    }

     public function edit($id){
        $data['examination']=Examination::find($id);
     
        $data['category']=category::all();
        $data['subcategory']=subcategory::all();
        return view('admin.editExamination',$data); 
    }

    public function update(Request $request,$id){
        $examination=Examination::find($id);
       
        $examination->category_id=$request->category_id;
        $examination->subcategory_id=$request->subcategory_id;
        $examination->exam_name=$request->exam_name;
        // $data->question=$request->question;
       
        $examination->marks=$request->marks;
        $examination->time_duration=$request->time_duration;
        $examination-> slugid = md5($request->exam_name . time());
        $examination->save();
        return redirect('/examination');
    }
}
