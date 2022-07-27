<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    
    public function index($category_id)
    {
        //
        $data['subcategory']= SubCategory::where('category_id',$category_id)->get();
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
        //image work
        $filename = $request->image->getClientOriginalName();
        $request->image->move(('images'),$filename);
        $data->image = $filename;
        $data->save();
        return redirect()->back();
    }
    // public function subCategory($category_id){
    //     $data['subcategory'] = SubCategory::where("category_id",$category_id)->get();
    //     $data['category']=Category::all();
    //     return view('admin/insertsubCategory',$data);
    // }

      
    public function show(SubCategory $subCategory)
    {
        //
    }

    
    public function edit(SubCategory $subCategory,$id)
    {
        //
      
        $data['subcategory']=SubCategory::find($id);
        $data['category']=Category::all();

        return view('admin.editSubCategory',$data);
    }

    
    public function update(Request $request, SubCategory $subcategory,$id)
    {
        //
        $subcategory=SubCategory::find($id);
        $subcategory->slugid=md5($request->subcategory .time());
        $subcategory->category_id=$request->category_id;
        $subcategory->subcategory=$request->subcategory;
         //image
         $filename = $request->image->getClientOriginalName();
         $request->image->move(('images'),$filename);
         $subcategory->image = $filename;
        $subcategory->save();
        return redirect('/subcategory');
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
