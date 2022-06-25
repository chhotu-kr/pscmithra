<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    
    public function index()
    {
        //
        $data['subcategory']= SubCategory::all();
        $data['category']=Category::all();
        return view('admin/insertsubCategory',$data);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
        $data= new SubCategory();
        $data->slugid=md5($request->subcategory .time());
        $data->category_id=$request->category_id;
        $data->subcategory=$request->subcategory;
        $data->save();
        return redirect('/subcategory');
    }

    
    public function show(SubCategory $subCategory)
    {
        //
    }

    
    public function edit(SubCategory $subCategory)
    {
        //
    }

    
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    
    public function destroy(SubCategory $subCategory,$slug)
    {
        //
        $item = SubCategory::where('slugid',$slug)->first();
        
        if(!empty($item)){
            $item->delete();
            session()->flash('success', 'Service has been deleted !!!'); 
        }

        else{
            session()->flash('error', 'Please try again !!!');
        } 
        return redirect('/subcategory');
    }
}
