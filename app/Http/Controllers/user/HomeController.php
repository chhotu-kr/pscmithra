<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // home page

    public function index(){
        
        return view("user.home");
    }


            // Exam courses

    // public function exam(){

    //     return view('exam.bpsc');
    // }

    // public function bba(){

    //     return view('exam.bba');
    // }

    // public function bca(){

    //     return view('exam.bca');
    // }

    // public function biology(){

    //     return view('exam.biology');
    // }

    // public function bsc(){

    //     return view('exam.bsc');
    // }

    // public function chemistery(){

    //     return view('exam.chemistery');
    // }

    // public function commerce(){

    //     return view('exam.commerce');
    // }

    // public function math(){

    //     return view('exam.math');
    // }

    // public function physics(){

    //     return view('exam.physics');
    // }


    // // About Pages

    // public function about(){

    //     return view('about');
    // }

    //  // course Pages

    //  public function course(){

    //     return view('courses');
    // }

    //  // Pattern Pages

    //  public function pattern(){

    //     return view('pattern');
    // }

    //  // Pricing Page

    //  public function pricing(){

    //     return view('pricing');
    // }

    //  // syllabus Page

    //  public function syllabus(){

    //     return view('syllabus');
    // }
    //  // contact Page 

    //  public function contact(){

    //     return view('contact');
    
    //  }
}
