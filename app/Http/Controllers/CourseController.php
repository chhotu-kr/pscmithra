<?php

namespace App\Http\Controllers;
use Livewire\Component;
use App\Models\Course;
use App\Models\Module;
use App\Models\Product;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    

    public function index(){
        // $data['module']=Module::where('course_id',$course_id)->get();
        $data['course']=Course::all();

        return view('ecommerce.manageCourse',$data);
    }

    public function create(){
        $data['course']=Course::all();

        return view('ecommerce.insertCourse',$data); 
    }

    public function CourseStore(Request $request){
      $data= new Course();
      $data->name=$request->name;
      $data->slugid=md5($request->name .time());
      $data->createdby=0;
      $data->save();
      return redirect()->route('course.index');

    }

    public function CourseEdit($id){
     $data['course']=Course::find($id);
     return view('ecommerce.editCourse',$data);
    }

    public function CourseUpdate(Request $request,$id){
        $course=Course::find($id);
        $course->name=$request->name;
      $course->slugid=md5($request->name .time());
      $course->createdby=$request->createdby;
      $course->save();
      return redirect()->route('course.index');

    }

    public function CourseDelete($slug){
        $item= Course::where('slugid', $slug)->first();
        
        if (!empty($item)) {
            $item->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
        return redirect()->route('course.index');
    }
}
