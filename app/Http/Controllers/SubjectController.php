<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //
    public function index(){
        $data['subject']=Subject::all();
        return view('admin/manageSubject',$data);
    }

    

   

    public function insertSubject(Request $re){
       $data = new Subject();
       $data->sub_name= $re->sub_name;
       
       //image work
      $filename = $re->image->getClientOriginalName();
      $re->image->move(('images'),$filename);
      $data->image = $filename;
      $data-> slugid = md5($re->examname . time());
        $data->save();
        return redirect('/subjects');
    }
     
    public function edit($id){
      $data['subject']=Subject::find($id);
      return view('admin.editSubject',$data);
    }

    public function update(Request $re,$id){
       $subject=Subject::find($id);
        $subject->sub_name= $re->sub_name;
        
        //image work
       $filename = $re->image->getClientOriginalName();
       $re->image->move(('images'),$filename);
       $subject->image = $filename;
       $subject-> slugid = md5($re->examname . time());
         $subject->save();
         return redirect('/subjects');  
    }

    public function remove($slug){
        $item= Subject::where('slugid', $slug)->first();
        
        if (!empty($item)) {
            $item->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
      
        return redirect('/subjects');
    }
}
