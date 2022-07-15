<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        //
        $data['category']=Category::all();
        $data['exam']=Exam::all();
       return view('admin.insertCategory',$data);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
        $data = new Category();
        $data->slugid=md5($request->category .time());
        $data->exam_id=$request->exam_id;
        $data->category=$request->category;
        $data->save();
        return redirect('/category');
    }

    
    public function show(Category $category)
    {
        //
    }

    
    public function edit(Category $category,$id)
    {
        //
        $data['exam']=Exam::all();
        $data['category']=Category::find($id);

        return view('admin.editCategory',$data);
    }

    
    public function update(Request $request, Category $category,$id)
    {
        //
        $category=Category::find($id);
        $category->slugid=md5($request->category .time());
        $category->exam_id=$request->exam_id;
        $category->category=$request->category;
        $category->save();
        return redirect('/category');
        
    }

    
    public function destroy(Category $category,$slug)
    {
        //
        $item = Category::where('slugid',$slug)->first();
        
        if(!empty($item)){
            $item->delete();
            session()->flash('success', 'Service has been deleted !!!'); 
        }

        else{
            session()->flash('error', 'Please try again !!!');
        } 

        return redirect('/category');
       
    }
}
