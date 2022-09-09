<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Examination;
use App\Models\Exam;
use App\Models\Language;
use App\Models\mocktestExaminationLanguage;
use App\Models\SecondQuestion;

class ExaminationController extends Controller
{
    //
    public function index()
    {
        // $data['exam']=Exam::all();
        $data['examination'] = Examination::with('lang.language')->where('isVisble',1)->get();

        // $data['category']=Category::all();
        // $data['subcategory']=SubCategory::all();
        // $data['secondquestion']=SecondQuestion::all();
        return view('admin.manageExamination', $data);
    }
    public function Create()
    {

        //$data['examination']=Examination::all();
        $data['lang'] = Language::all();
        return view('admin.insertExamination', $data);
    }

    public function storeExamination(Request $request)
    {



        
        $data= new Examination();

        $data->category_id=$request->category_id;
        $data->subcategory_id=$request->subcategory_id;
        $data->exam_name=$request->exam_name;
        // $data->question=$request->question;

        $data->rightmarks=$request->rmarks;
        $data->wrongmarks=$request->wmarks;
        $data->noQues=$request->noQuestion;
        $data->isFree=$request->isfree;

        $data->marks=$request->marks;
        $data->time_duration=$request->time_duration;
        $data-> slugid = md5($request->exam_name . time());
        $data->save();

        $insertD = [];

        $myArray = explode(',', $request->lang);
        foreach ($myArray as $va) {
            $insertD[]=["examinations_id"=>$data->id,"languages_id"=>$va];
        }
mocktestExaminationLanguage::insert($insertD);
        return redirect()->back();
    }

    public function edit($id)
    {
        $data['examination'] = Examination::find($id);

        $data['category'] = category::all();
        $data['subcategory'] = subcategory::all();
        return view('admin.editExamination', $data);
    }

    public function update(Request $request, $id)
    {
        $examination = Examination::find($id);

        $examination->category_id = $request->category_id;
        $examination->subcategory_id = $request->subcategory_id;
        $examination->exam_name = $request->exam_name;
        // $data->question=$request->question;
        // $examination->type = $request->type;
        $examination->marks = $request->marks;
        $examination->time_duration = $request->time_duration;
        $examination->slugid = md5($request->exam_name . time());
        $examination->save();
        return redirect()->back();
    }

    public function destroy($id){
        // $sub=Examination::where('slugid',$slug)->first();
        // if(!empty($sub)){
        //     $sub->delete();
        //     session()->flash('success', 'Service has been deleted !!!');

        // }    else{
        //         session()->flash('error', 'Please try again !!!');
        //     } 
    
        //     return redirect()->back();

        $data=Examination::find($id);
        $data->isVisble=0;
        $data->save();
        return redirect()->back();
        

    }
}
