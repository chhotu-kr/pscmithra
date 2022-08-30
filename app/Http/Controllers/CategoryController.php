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
       
        $data->category=$request->category;
        //image
        $filename = $request->image->getClientOriginalName();
        $request->image->move(('upload'),$filename);
        $data->image = $filename;
        $data->save();
        return redirect()->route('insert.category');
    }

    
    public function show(Category $category)
    {
        //
    }

    
    public function edit(Category $category,$id)
    {
        //
      
        $data['category']=Category::find($id);

        return view('admin.editCategory',$data);
    }

    
    public function update(Request $request, Category $category,$id)
    {
        //
        $category=Category::find($id);
        $category->slugid=md5($request->category .time());
       
        $category->category=$request->category;
         //image
         $filename = $request->image->getClientOriginalName();
         $request->image->move(('upload'),$filename);
         $category->image = $filename;
        $category->save();
        return redirect()->route('insert.category');
        
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

        return redirect()->route('insert.category');
       
    }
}
