<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\QuizCategory;
use App\Models\Product;
use App\Models\QuizChapter;
use App\Models\SecondQuestion;
use App\Models\SubCategory;
use App\Models\QuizSubCategory;
use App\Models\QuizTopic;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{
    //...............Home...............//

    public function get_ViewHome(){
        $data['category']=Category::all();
            $data['subcategory']=SubCategory::all();
            $data['pro']=Product::all();
            return view('user.Viewhome',$data);
       
    }

    public function filter($category_id){
        if($category_id==Null){
                $data['category']=Category::all();
              
                return view('user.Viewhome',$data);
            }
              else{
                 $data['category']=Category::all();
              $data['subcategory']=SubCategory::where('category_id',$category_id)->get();
            return view('user.Viewhome',$data);
              }  
    }
    //..............Category...............//
    public function get_Category(){
        $data['subcategory']=SubCategory::all();
        $data['cate']=Category::all();
       
        return view('user.category',$data);
    }

    //...............subcategory..............

    // public function get_SubCat($category_id){
    //  $data['subcategory']=SubCategory::where('category_id',$category_id)->get();

    //  return view('user.category',$data);
    // }
   //................CategoryDetails................//
    public function get_ViewCatDetails($id){
        
        $data['catdetail'] = $id;
        return view('user.ViewCategorydetails',$data);
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

    public function get_Quiz(){
        //   $data['quizcat']=$id;
        $data['quizcat'] = QuizCategory::all();
        $data['quizsubcat'] = QuizSubCategory::all();
        return view('user.ViewQuiz',$data);
    }
    //..............Quiz Detail...........//
    public function get_ViewQuizDetail($id){
        $quizData = QuizCategory::where('id',$id)->first(); 
        if($quizData->ifnested == "true"){
            $data['quizdetail'] = $id;
        }
        else{
            return redirect()->route('view.quizpage' ,["cat" => $id]);

        }
        return view('user.QuizCategory',$data);
    }

    //............... Quiz Chapter..............//
   public function get_Quiz_SubCategory($id){
    $sub = QuizSubCategory::where('id',$id)->first();

    if($sub->ifnested == "true"){
        $data['chapter']= $id;
    }
    else{
        return redirect()->route('view.quizpage', ["sub_cat" => $id]);
    }
    return view("user.Quiz_QuizChapter",$data);
   }
   //..............Topic Page..................//

   public function get_TopicPage($id){
    $cha = QuizChapter::where('id',$id)->first();

    if($cha->ifnested == "true"){
        $data['topic']= $id;
    }
    else{
        return redirect()->route('view.quizpage', ['chapter' => $id]);
    }
    return view("user.Quiz_TopicPage",$data);
   
   }
   //...............Quiz Page..................//
   public function get_QuizPage(Request $req,$cat=null,$sub_cat = null,$chapter = null,$topic=null){
    return view('user.QuizPage');

   }
   //.................Mock Test................//
   public function get_MockTest(Request $request){

    //return dd($request);
       $data['cat_id'] = $request->cat_id;
       $data['sub_cat_id'] = $request->sub_cat_id;
       $data['cat'] = SubCategory::find($request->sub_cat_id)->first();
    return view('user.MockTest',$data);
}
    //..............StudyMetrial.................//

    public function get_Study_Metrial(){
        return view('user.StudyMetrial');
    }
  
    //...............Login...............//

    public function get_Login(){
        return view('user.Login');
    }
    //................Register.................//

    public function get_Register(){
        return view('user.Register');
    }
   //..................QuizCategory...............//

   public function get_QuizCate(){
    $data['cate']=QuizCategory::all();
   
    return view('user.QuizCategory',$data);
   }
   //..................QuizSubCategory...............//

   public function get_QuizSubCate(){
    $data['sub']=QuizSubCategory::all();
   
    return view('user.QuizSubcategory',$data);
   }
   //..................QuizChapter...............//

   public function get_QuizChapt(){
    $data['chap']=QuizChapter::all();
  
    return view('user.QuizChapter',$data);
   }

   //..............liveQuiz................//

   public function Quiz_Result(){
    return view('user.liveQuiz');
   }
}
