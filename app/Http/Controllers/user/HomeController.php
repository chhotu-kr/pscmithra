<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //...............Home...............//

    public function get_ViewHome(){
        return view('user.Viewhome');
    }
    //..............Category...............//
    public function get_Category(){
        return view('user.category');
    }
   //................CategoryDetails................//
    public function get_ViewCatDetails(){
        return view('user.ViewCategorydetails');
    }
   //...............Blog...................//
    public function get_ViewBlog(){
        return view('user.Blog');
    }
    //...............BlogDetails..............//

    public function get_ViewBlogDetails(){
        return view('user.BlogDetails');
    }
    //...............Course...............//
    public function get_ViewCourse(){
        return view('user.ViewCourse');
    }
    //................CourseDetails..............//
   
    public function get_ViewCourseDetails(){
        return view('user.ViewCoursedetails');
    }
    //..............Quiz.............//

    public function get_ViewQuiz(){
        return view('user.ViewQuiz');
    }
    //...............Login...............//

    public function get_Login(){
        return view('user.Login');
    }
    //................Register.................//

    public function get_Register(){
        return view('user.Register');
    }
   
}
