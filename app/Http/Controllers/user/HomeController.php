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
use App\Models\image;
use App\Models\User;
use App\Models\TestiMonials;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Component\HttpFoundation\RequestStack;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class HomeController extends Controller
{
    //...............Home...............//



    public function get_ViewHome()
    {
        $data['category'] = Category::all();
        $data['subcategory'] = SubCategory::all();

        $data['product'] = Product::paginate(2);
        $data['img']=Image::all();
        $data['user']=User::all();
        $data['testimonials']=TestiMonials::all();
        return view('user.Viewhome', $data);
    }

    public function filter($category_id)
    {
        if ($category_id == NUll) {
            $data['category'] = Category::all();

            return view('user.Viewhome', $data);
        } else {
            $data['category'] = Category::all();
            $data['subcategory'] = SubCategory::where('category_id', $category_id)->get();
            return view('user.Viewhome', $data);
        }
    }
    //..............Category...............//
    public function get_Category()
    {
        $data['subcategory'] = SubCategory::all();
        $data['cate'] = Category::all();
        $data['category'] = Category::where('id', 1)->first();
        return view('user.category', $data);
    }

    //...............subcategory..............


    public function get_SubCat($category_id)
    {
        $data['subcategory'] = SubCategory::where('category_id', $category_id)->get();

        return view('user.category', $data);
    }
    //................CategoryDetails................//
    public function get_ViewCatDetails($id)
    {

        $data['catdetail'] = $id;
        return view('user.ViewCategorydetails', $data);
    }
    //...............Blog...................//
    public function get_ViewBlog()
    {
        return view('user.Blog');
    }
    //...............BlogDetails..............//

    public function get_ViewBlogDetails()
    {
        return view('user.BlogDetails');
    }
    //...............Course...............//
    public function get_ViewCourse()
    {
        return view('user.ViewCourse');
    }
    //................CourseDetails..............//

    public function get_ViewCourseDetails()
    {
        return view('user.ViewCoursedetails');
    }
    //..............Quiz.............//

    public function get_Quiz()
    {
        //   $data['quizcat']=$id;
        $data['img'] = Image::all();
        $data['quizcat'] = QuizCategory::all();
        $data['quizsubcat'] = QuizSubCategory::all();
        $data['quiz_cat'] = QuizCategory::where('id', 1)->first();
        return view('user.ViewQuiz', $data);
    }
    //..............Quiz Detail...........//
    public function get_ViewQuizDetail($cat_id)
    {
        $quizData = QuizCategory::where('id', $cat_id)->first();
        if ($quizData->ifnested == "true") {
            $data['quizdetail'] = $cat_id;
        } else {
            return redirect()->route('view.quizpage', ["cat_id" => $cat_id]);
        }
        return view('user.QuizCategory', $data);
    }

    //............... Quiz Chapter..............//
    public function get_Quiz_SubCategory(Request $req)
    {
        $sub = QuizSubCategory::where('id',$req->sub_cat_id)->first();

        if ($sub->ifnested == "true") {
            $data['sub_cat_id'] = $req->sub_cat_id;
            $data['cat_id'] = $req->cat_id;
        } else {
            return redirect()->route('view.quizpage', ['cat_id'=>$req->cat_id,"sub_cat_id" => $req->sub_cat_id]);
        }
        return view("user.Quiz_QuizChapter", $data);
    }
    //..............Topic Page..................//

    public function get_TopicPage(Request $req)
    {   
        $cha = QuizChapter::where('id', $req->chapter_id)->first();

        if ($cha->ifnested == "true") {
            $data['chapter_id'] = $req->chapter_id;
            $data['cat_id'] = $req->cat_id;
            $data['sub_cat_id'] = $req->sub_cat_id;
        } else {
            return redirect()->route('view.quizpage', ['cat_id'=>$req->cat_id,"sub_cat_id" => $req->sub_cat_id,"chapter_id" => $req->chapter_id]);
        }
        return view("user.Quiz_TopicPage", $data);
    }
    //...............Quiz Page..................//
    public function get_QuizPage(Request $req)
    {
      if(FacadesAuth::user()){
        $data['cat'] = $req->cat_id;
        $data['sub_cat'] = $req->sub_cat_id;
        $data['chapter'] = $req->chapter_id;
        $data['topic'] = $req->topic_id;
        // return $data;
        return view('user.QuizPage', $data);
      }
    }
    //..............Quiz pAge Start.............//

    public function get_QuizPageStart(Request $req)
    {
      if(FacadesAuth::user()){
        $data['data'] = $req->data;
        return view('user.QuizAttemptStart', $data);
      }
    }

    //.................Mock Test................//
    public function get_MockTest(Request $request)
    {

        //return dd($request);
        if (FacadesAuth::user()) {
            $data['cat_id'] = $request->cat_id;
            $data['sub_cat_id'] = $request->sub_cat_id;
            $data['cat'] = SubCategory::find($request->sub_cat_id)->first();
            return view('user.MockTest', $data);
        } else {
            return redirect()->route('user.login');
        }
    }
    //..............Mock Test Start..............//
    public function get_MockTestStart(Request $req)
    {
        $data['data'] = $req->data;

        return view('user.MockTestStart', $data);
    }
    //.............Privacy policy................//
    public function privacy_policy()
    {
        return view('user.privacy_policy');
    }
    //..............Term and condition..........//

    public function term()
    {
        return view('user.termscondition');
    }
    //..............Refund.......................//
    public function refund()
    {
        return view('user.refundCancel');
    }

    //..............StudyMetrial.................//

    public function get_Study_Metrial()
    {
        return view('user.StudyMetrial');
    }

    //...............Login...............//

    public function get_Login()
    {
        return view('user.Login');
    }
    //................Register.................//

    public function get_Register()
    {
        return view('user.Register');
    }
    //..................QuizCategory...............//

    public function get_QuizCate()
    {
        $data['cate'] = QuizCategory::all();

        return view('user.QuizCategory', $data);
    }
    //..................QuizSubCategory...............//

    public function get_QuizSubCate()
    {
        $data['sub'] = QuizSubCategory::all();

        return view('user.QuizSubcategory', $data);
    }
    //..................QuizChapter...............//

    public function get_QuizChapt()
    {
        $data['chap'] = QuizChapter::all();

        return view('user.QuizChapter', $data);
    }

    //..............liveQuiz................//

    public function Quiz_Result()
    {
        return view('user.liveQuiz');
    }

    public function Live_Quiz_Start(Request $req)
    {
        // dd($req['data']);
        $data['data'] = $req->data;
        return view('user.LiveQuizStart', $data);
    }
    //..............Quiz Result........../
    public function get_QuizResult(Request $req)
    {
        $data['testid'] = $req->testID;
        $data['examinationId'] = $req->examId;

        return view('user.Quiz_Result', $data);
    }

    //..................Mocktest Result..........//
    public function get_MockTestResult(Request $req)
    {
        // dd($req->data);
        $data['testid'] = $req->testID;
        $data['examinationId'] = $req->examId;

        return view('user.MockTest_Result', $data);
    }
    //................ LiveQuiz Result ...........//
    public function get_LiveQuizResult(Request $req)
    {
        $data['testid'] = $req->testID;
        $data['examinationId'] = $req->examId;
        return view('user.LiveQuizResult', $data);
    }

    //...............Quiz Soltuion..............//
    public function get_QuizSolution(Request $req)
    {
        $data['testid'] = '764997571f7f069be9f8bd2379d5119a';
        $data['examinationId'] = 'slugid';
        return view('user.Quiz_Solution', $data);
    }
    //................Mocktest Solution...........//
    public function get_MocktestSolution(Request $req)
    {
        $data['testid'] = '764997571f7f069be9f8bd2379d5119a';
        $data['examinationId'] = 'slugid';
        return view('user.Mocktest_Solution', $data);
    }
    //................Live Quiz Solution...............//
    public function get_LiveQuizSolution(Request $req)
    {
        $data['testid'] = '1c7fbe15ce1e9e273d3c0b87228c3e27';
        $data['examinationId'] = 'b21fe25aeca7503589c1440ec84161c4';
        return view('user.LiveQuiz_Solution', $data);
    }
    //..........................User Dashboard  Controller..........................//

    public function get_profile()
    {
        $data['user'] = auth()->user();
        $data['current_user'] = auth()->user();
        // dd($data);
        return view('user.profile.userprofile', $data);
    }

    public function user_Dashboard()
    {
        // $data['user']=User::all();
        return view('user.profile.userDashboard');
    }
}
