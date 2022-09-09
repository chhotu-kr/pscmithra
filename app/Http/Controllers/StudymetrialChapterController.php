<?php

namespace App\Http\Controllers;

use App\Models\StudymetrialChapter;
use App\Models\StudymetrialCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudymetrialChapterController extends Controller
{
    
    public function index()
    {
        //
        $data['studymetrialcategory']=StudymetrialCategory::all();
        $data['studymetrialchapter']=StudymetrialChapter::where('isVisble',1)->get();
        return view('study/insertChapter',$data);
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //

        $data = new StudymetrialChapter();
        $data->name= $request->name;
        $data->sm_categories_id= $request->sm_categories_id;
        
       $data-> slugid = md5($request->name . time());
         $data->save();
         return redirect()->route('insertchapter.create');
    }

    
    public function show(StudymetrialChapter $studymetrialChapter)
    {
        //
    }

    public function edit($id)
    {
        //
         //
         $data['studymetrialcategory']=StudymetrialCategory::all();
         $data['studymetrialchapter']=StudymetrialChapter::find($id);
         return view('study.editChapter',$data);
    }

    public function update(Request $request,$id)
    {
        //

        
        $studymetrialchapter=StudymetrialChapter::find($id);
        $studymetrialchapter->name= $request->name;
        $studymetrialchapter->sm_categories_id= $request->sm_categories_id;
        
        $studymetrialchapter-> slugid = md5($request->name . time());
        $studymetrialchapter->save();
         return redirect()->route('insertchapter.create');
    }

    
    public function destroy(StudymetrialChapter $studymetrialChapter,$id)
    {
        //
        // $item= StudymetrialChapter::where('slugid', $slug)->first();
        
        // if (!empty($item)) {
        //     $item->delete();
        //     session()->flash('success', 'Service has been deleted !!!');
        // } else {
        //     session()->flash('error', 'Please try again !!!');
        // }
        $data=StudymetrialChapter::find($id);
        $data->isVisble=0;
        $data->save();
        return redirect()->route('insertchapter.create');
    }
    
}
