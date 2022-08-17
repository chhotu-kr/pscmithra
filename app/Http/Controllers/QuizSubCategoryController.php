<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuizSubCategory;
use App\Models\QuizCategory;
class QuizSubCategoryController extends Controller
{
    //
    public function index($quiz_categories){
        $data['quizsubcat']=QuizSubCategory::where('quiz_categories',$quiz_categories)->get();
        $data['id']=$quiz_categories;
        // $data['quizsubcat']=QuizSubCategory::all();
        // $data['quizcategory']=QuizCategory::all();
        return view('quiz.insertQuizSubCat',$data);
    }

    // public function filter($quiz_categories){
    //     $data['quizsubcat']=QuizSubCategory::where('quiz_categories',$quiz_categories)->get();
    //     $data['quizcategory']=QuizCategory::all();
    //     return view('quiz.insertQuizSubCat',$data);
    // }

    public function store(Request $request){
        $data= new QuizSubCategory();
        $data->name=$request->name;
        $data->ifnested=$request->ifnested;
        $data->quiz_categories=$request->quiz_categories;
        $data->slugid=md5($request->quiz_SubCategory .time());
         //image
         $filename = $request->image->getClientOriginalName();
         $request->image->move(('images'),$filename);
         $data->image = $filename;
        $data->save();

        return redirect()->back();
    }
    public function edit($id){
      $data['quizsubcat']=QuizSubCategory::find($id);
     
      $data['quizcategory']=QuizCategory::all();
      return view('quiz/editQuizSubcat',$data);
    }

    public function update(Request $request,$id){
       $quizsubcat= QuizSubCategory::find($id);
       $quizsubcat->name=$request->name;
        $quizsubcat->quiz_categories=$request->quiz_categories;
        $quizsubcat->slugid=md5($request->quiz_SubCategory .time());
         //image
         $filename = $request->image->getClientOriginalName();
         $request->image->move(('images'),$filename);
         $quizsubcat->image = $filename;
        $quizsubcat->save();

        return redirect()->back();
    }

    public function destroy($slug){
        $sub=QuizSubcategory::where('slugid',$slug)->first();
        if (!empty($sub)) {
            $sub->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
        return redirect()->back();
    
    }
}
