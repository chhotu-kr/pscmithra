<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    //

    public function index(){
        $data['blogcat']=BlogCategory::all();

        return view('ecommerce.insertBlogcat',$data);
    }

    public function store(Request $request){

        $blogcat=new BlogCategory();
        $blogcat->name=$request->name;
        $blogcat->slugid=md5($request->name .time());
        $blogcat->save();
        return redirect()->route('blog.category');

    }

    public function edit($id){
        $data['blogcat']=BlogCategory::find($id);
        return view('ecommerce.editBlogcat',$data);
    }

    public function update(Request $request,$id){
        $blogcat=BlogCategory::find($id);
        $blogcat->name=$request->name;
        $blogcat->slugid=md5($request->name .time());
        $blogcat->save();
        return redirect()->route('blog.category');  
    }

    public function destroy($slug){
        $sub= BlogCategory::where('slugid', $slug)->first();
        
        if (!empty($sub)) {
            $sub->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
        return redirect()->route('blog.category');
    }
}
