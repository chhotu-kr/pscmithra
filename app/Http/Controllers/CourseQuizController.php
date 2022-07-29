<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseQuiz;
class CourseQuizController extends Controller
{
    //
    public function index(){
        $data['cq']=CourseQuiz::all();
        return view('CourseQuiz.manageCquiz',$data);
    }

    public function create(){
        $data['cq']=CourseQuiz::all();
        return view('CourseQuiz.insertCquiz',$data);
    }

    public function store(Request $request){
        $data= new CourseQuiz();
        $data->CQname=$request->CQname;
        $data->slugid=md5($request->CourseQuiz .time());
        //  //image
        //  $filename = $request->image->getClientOriginalName();
        //  $request->image->move(('images'),$filename);
        //  $data->image = $filename;
       
        $data->save();

        return redirect()->route('manage.course.quiz');
    }

    public function edit($id){
        $data['cq']=CourseQuiz::find($id);
        return view('CourseQuiz/editCquiz',$data);  
    }
    public function update(Request $request,$id){
        $cq=CourseQuiz::find($id);
        $cq->CQname=$request->CQname;
         $cq->slugid=md5($request->CourseQuiz .time());
        //   //image
        //   $filename = $request->image->getClientOriginalName();
        //   $request->image->move(('images'),$filename);
        //   $quizcategory->image = $filename;
        
        $cq->save();

        return redirect()->route('manage.course.quiz');
    }

    public function destroy($slug){
    $sub=CourseQuiz::where('slugid',$slug)->first();
    if (!empty($sub)) {
        $sub->delete();
        session()->flash('success', 'Service has been deleted !!!');
    } else {
        session()->flash('error', 'Please try again !!!');
    }

    return redirect()->route('manage.course.quiz');
  }
}
