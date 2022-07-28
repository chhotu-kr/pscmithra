<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QuizCategory;
use Illuminate\Http\Request;

class QuizCategoryController extends Controller
{
    //

    public function index(){
        $data['quizcategory']=QuizCategory::all();
        return view('quiz.insertQuizCat',$data);
    }

    public function store(Request $request){
        $data= new QuizCategory();
        $data->name=$request->name;
        $data->slugid=md5($request->quiz_Category .time());
         //image
         $filename = $request->image->getClientOriginalName();
         $request->image->move(('images'),$filename);
         $data->image = $filename;
       
        $data->save();

        return redirect()->route('quiz.category');
    }

    public function edit($id){
        $data['quizcategory']=QuizCategory::find($id);
        return view('quiz/editQuizCat',$data);  
    }
    public function update(Request $request,$id){
        $quizcategory=QuizCategory::find($id);
        $quizcategory->name=$request->name;
         $quizcategory->slugid=md5($request->quiz_Category .time());
          //image
          $filename = $request->image->getClientOriginalName();
          $request->image->move(('images'),$filename);
          $quizcategory->image = $filename;
        
        $quizcategory->save();

        return redirect()->route('quiz.category');
    }

    public function destroy($slug){
    $sub=Quizcategory::where('slugid',$slug)->first();
    if (!empty($sub)) {
        $sub->delete();
        session()->flash('success', 'Service has been deleted !!!');
    } else {
        session()->flash('error', 'Please try again !!!');
    }

    return redirect()->route('quiz.category');
  }
}
