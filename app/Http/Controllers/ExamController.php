<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    //
    public function index(){
      $data['exam']= Exam::all();
    
       return view('admin.manageExam',$data);
    
    }

    public function edit($id){
        $data['exam']= Exam::find($id);
        return view('admin.editExam',$data);
    }

    public function store(Request $req){
       $data = new Exam();
      $data-> examname = $req->examname;
       $data-> slugid = md5($req->examname . time());
       $data->save();
        return redirect('/Exam');
    }

    public function update(Request $req,$id){
        $exam=Exam::find($id);
        $exam-> examname = $req->examname;
         $exam-> slugid = md5($req->examname . time());
         $exam->save();
          return redirect('/Exam');

    }

    public function destroy($slug){
        $item= Exam::where('slugid', $slug)->first();
        
        if (!empty($item)) {
            $item->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
        return redirect('/Exam');
    }

   
}
