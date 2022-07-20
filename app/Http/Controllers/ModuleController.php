<?php

namespace App\Http\Controllers;
use App\Models\Module;
use App\Models\Course;
use App\Models\Examination;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    //
    public function get_Examination(){
        $data['exami']=Examination::with('examQ')->where("exam_id",4)->get();
        return response()->json($data);
    }
    public function index(){
       
        $data['module']=Module::all();
        $data['course']=Course::all();
        return view('ecommerce.manageModules',$data);
    }

    public function filter($course_id){
     $data['module']=Module::where('course_id',$course_id)->get();
     return view('ecommerce.manageModules',$data);
    }
    public function create()
    {
        //
        $data['module']=Module::all();
        $data['course']=Course::all();
        return view('ecommerce.insertModule',$data);
    }

    public function store(Request $request){
        $data= new Module();
        $data->course_id=$request->course_id;
        $data->slugid=md5($request->course .time());
        $data->type=$request->type;
        $data->name=$request->name;
        $data->url=$request->url;
        $data->text=$request->text;
        $data->quiz_id=$request->quiz_id;
        $data->isfree=$request->isfree;
        $data->index=$request->index;
       
        $data->save();
       
        return redirect()->route('manage.module');
    }

    public function edit($id){
        $data['module']=Module::find($id);
        $data['course']=Course::all();
        return view('ecommerce.editModules',$data);
    }

    public function update(Request $request,$id){
         $module=Module::find($id);
        $module->course_id=$request->course_id;
        $module->slugid=md5($request->course .time());
        $module->type=$request->type;
        $module->name=$request->name;
        $module->url=$request->url;
        $module->text=$request->text;
        $module->quiz_id=$request->quiz_id;
        $module->isfree=$request->isfree;
        $module->index=$request->index;
       
        $module->save();
       
        return redirect()->route('manage.module');
    }

    public function delete($slug){
        $item= Module::where('slugid', $slug)->first();
        
        if (!empty($item)) {
            $item->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
        return redirect()->route('manage.module');
    }
}
