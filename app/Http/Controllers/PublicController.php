<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Http\Controllers\Controller;
use App\Models\ExamQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    //

    public function index(){
        return view('userRegister.index');
    }
    public function adminIndex(){
       // dd(Auth::guard('admin')->user()->hasRole('author'));
        return view('adminRegister.dashboard');
    }
//     public function submit(Request $request){

//         $questionId = ExamQuestion::select('question_id')->where('exam_id', 1)->get()->toArray();
       

//         $data=Question::where->('',)whereNotIn('id',$questionId)->get();

// return dd($data);
//     }
}
