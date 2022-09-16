<?php

namespace App\Http\Controllers;

use App\Models\StudymetrialCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudymetrialCategoryController extends Controller
{
   
    public function index()
    {
        //
        $data['studymetrialcategory']=StudymetrialCategory::all();
        return view('study/insertMetrial',$data);
    }

   
    public function create()
    {
        //
        // $data['studymetrialcategory']=StudymetrialCategory::all();
        // return view('admin/insertMetrial',$data);
    }

    
    public function store(Request $request)
    {
        //
        $data = new StudymetrialCategory();
        $data->name= $request->name;
        
        //image work
       $filename = $request->image->getClientOriginalName();
       $request->image->move(('upload'),$filename);
       $data->image = $filename;
       $data-> slugid = md5($request->name . time());
         $data->save();
         return redirect('/insertMetrial');
    }

    public function show(StudymetrialCategory $studymetrialCategory)
    {
        //
    }

    
    public function edit(StudymetrialCategory $studymetrialCategory,$id)
    {
        //
        $data['studymetrialcategory']=StudymetrialCategory::find($id);
      return view('study.editMetrial',$data);
    }

    
    public function update(Request $request,$id)
    {
        //
        $studymetrialcategory=StudymetrialCategory::find($id);
        $studymetrialcategory->name= $request->name;
        
        //image work
       $filename = $request->image->getClientOriginalName();
       $request->image->move(('upload'),$filename);
       $studymetrialcategory->image = $filename;
       $studymetrialcategory-> slugid = md5($request->name . time());
         $studymetrialcategory->save();
         return redirect('/insertMetrial');
    }

    public function destroy(StudymetrialCategory $studymetrialCategory,$slug)
    {
        //
        $item= StudymetrialCategory::where('slugid', $slug)->first();
        
        if (!empty($item)) {
            $item->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
      
        return redirect('/insertMetrial');
    }
}
