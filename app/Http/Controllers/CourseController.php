<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        //
        $data['course']=Course::all();
        $data['product']=Product::all();

        return view('ecommerce.manageCourse',$data);
    }

    
    public function create()
    {
        //
        $data['course']=Course::all();
        $data['product']=Product::all();
        return view('ecommerce.insertCourse',$data);
    }

    
    public function store(Request $request)
    {
        //
        // return dd($request);

        $data= new Course();
        $data->product_id=$request->product_id;
        $data->slugid=md5($request->course .time());
        $data->type=$request->type;
        $data->name=$request->name;
        $data->course_url=$request->course_url;
        $data->text=$request->text;
        $data->quiz_id=$request->quiz_id;
        $data->is_free=$request->is_free;
        $data->index=$request->index;
       
        $data->save();
       
        return redirect()->route('course.index');


    }

    
    public function show(Course $course)
    {
        //
    }

    
    public function edit(Course $course)
    {
        //
        $data['course']=$course;
        $data['product']=Product::all();
        return view('ecommerce.editCourse',$data);

    }

    public function update(Request $request, Course $course)
    {
        //
     
        $course->product_id=$request->product_id;
        $course->slugid=md5($request->course .time());
        $course->type=$request->type;
        $course->name=$request->name;
        $course->text=$request->text;
        $course->quiz_id=$request->quiz_id;
        $course->is_free=$request->is_free;
        $course->index=$request->index;
        
        $course->save();
        return redirect()->route('course.index');
    }

    
    public function destroy(Course $course)
    {
        //
        // $item = Course::where('slugid',$slug)->first();
        
        // if(!empty($item)){
        //     $item->delete();
        //     session()->flash('success', 'Service has been deleted !!!'); 
        // }

        // else{
        //     session()->flash('error', 'Please try again !!!');
        // } 
          $course->delete();
        return redirect()->route('course.index');
    }
}
