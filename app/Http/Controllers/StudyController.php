<?php

namespace App\Http\Controllers;

use App\Models\Study;
use App\Http\Controllers\Controller;
use App\Models\Meta;
use App\Models\StudymetrialCategory;
use App\Models\StudymetrialChapter;
// use App\Models\Category;
// use App\Models\SubCategory;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    
    public function index()
    {
        //
        $data['study']=Study::all();
    
        return view('ecommerce.manageStudy',$data);
    }

   
    public function create()
    {
        //
        $data['study']=Study::all();
        // $data['meta']=Meta::all();
        $data['studymetrialcategory']=StudymetrialCategory::all();
        $data['studymetrialchapter']=StudymetrialChapter::all();
        return view('ecommerce.insertStudy',$data);

    }

    public function store(Request $request)
    {
        //
        $data = new study();
        $data->sm_categories_id=$request->sm_categories_id;
        $data->sm_chapters_id=$request->sm_chapters_id;
        $data->content=$request->content;
        $data->name=$request->name;
        // $data->slugid= md5()

        $data->save();
         $meta= new Meta();
         $meta->study_materials_id=$data->id;
         $meta->title=$request->title;
         $meta->description=$request->description;
         $meta->save();

        return redirect()->route('study.index');
    }

    public function show(study $study)
    {
        //
    }

    
    public function edit(study $study)
    {
        
        
         $data['study']=$study;
        // $data['meta']=Meta::all();
         $data['smcy']=StudymetrialCategory::all();
         $data['smc']=StudymetrialChapter::all();
        return view('ecommerce.editStudy',$data);
        
       
    }

    
    public function update(Request $request,$study)
    {
        //
    //     $study=Study::find($study->id);
    //     $study->sm_categories_id=$request->sm_categories_id;
    //     $study->sm_chapters_id=$request->sm_chapters_id;
    //     $study->content=$request->content;

    //     $study->save();
    //      $meta=Meta::find($meta->id);
       
    //     $meta->title=$request->title;
    //     $meta->description=$request->description;
    //     $meta->save();
       return dd($study);
    //     return redirect()->route('study.index');
    }

    
    public function destroy(study $study)
    {
        //
        $study->delete();
        return redirect()->route('study.index');
    }
}
