<?php

namespace App\Http\Controllers;

use App\Models\Study;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    
    public function index()
    {
        //
        $data['study']=Study::all();
        $data['category']=Category::all();
        $data['subcategory']=SubCategory::all();
        return view('ecommerce.manageStudy',$data);
    }

   
    public function create()
    {
        //
        $data['study']=Study::all();
        $data['category']=Category::all();
        $data['subcategory']=SubCategory::all();
        return view('ecommerce.insertStudy',$data);

    }

    public function store(Request $request)
    {
        //
        $data = new study();
        $data->category_id=$request->category_id;
        $data->subcategory_id=$request->subcategory_id;
        $data->content=$request->content;

        $data->save();
        return redirect()->route('study.index');
    }

    public function show(study $study)
    {
        //
    }

    
    public function edit(study $study)
    {
        //
        $data['study']=$study;
        $data['category']=Category::all();
        $data['subcategory']=SubCategory::all();
        return view('ecommerce.editStudy',$data);
        
       
    }

    
    public function update(Request $request, study $study)
    {
        //

        $study->category_id=$request->category_id;
        $study->subcategory_id=$request->subcategory_id;
        $study->content=$request->content;

        $study->save();
        return redirect()->route('study.index');
    }

    
    public function destroy(study $study)
    {
        //
        $study->delete();
        return redirect()->route('study.index');
    }
}
