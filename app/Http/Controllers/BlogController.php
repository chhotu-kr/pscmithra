<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
class BlogController extends Controller
{
    //

    public function index(){
        $data['blog']=Blog::all();

        return view('ecommerce.manageBlog',$data);
    }

    public function create(){
        $data['blog']=Blog::all();
        $data['category']=Category::all();

        return view('ecommerce.insertBlog',$data);
    }

    public function store(Request $request){
       $blog= new Blog();
       $blog->category_id=$request->category_id;
       $blog->title=$request->title;
       $blog->description=$request->description;
       $blog->rightby=$request->rightby;
    //    $blog->slugid=md5($request->title .time());
       $blog->save();

       return redirect()->route('blog.index');
    }
    public function edit($id){
      $data['blog']=Blog::find($id);
       $data['category']=Category::all();

    return view('ecommerce.editBlog',$data);
    }

    public function update(Request $request,$id){
        $blog=  Blog::find($id);
        $blog->category_id=$request->category_id;
        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->rightby=$request->rightby;
     //    $blog->slugid=md5($request->title .time());
        $blog->save();
 
        return redirect()->route('blog.index');
    }

    public function destroy($id){
        $blog=Blog::find($id);
        $blog->delete();
        return redirect()->route('blog.index');
    }
}
