<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Blog;
use App\Models\AttempedExam;
use App\Models\BlogCategory;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Study;
use App\Models\Exam;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Examination;
use App\Models\Category;
use App\Models\ExamQuestion;
use App\Models\Language;
use App\Models\mockattempquestion;
use App\Models\Question;
use App\Models\quizAttemp;
use App\Models\QuizAttemptQuestion;
use App\Models\QuizCategory;
use App\Models\QuizChapter;
use App\Models\QuizExamination;
use App\Models\QuizSubCategory;
use App\Models\QuizTopic;
use App\Models\SecondQuestion;
use App\Models\QuizQuestion;
use App\Models\SubCategory;
use App\Models\StudymetrialCategory;
use App\Models\StudymetrialChapter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\map;

class Apiv1Controller extends Controller
{
    public function index($contact)
    {
        $user = User::where('contact', $contact)->first();
        if (!$user) {
            return response()->json(['msg' => 'Account not exist', 'status' => true]);
        }
        return response()->json(['msg' => 'Account allready exist', 'status' => false]);
    }

    //user signup api

    public function api_signup(Request $request)
    {


        if (empty($request->contact)) {
            return response()->json(['msg' => 'Enter Mobile Number', 'status' => false]);
        }
        if (empty($request->password)) {
            return response()->json(['msg' => 'Enter Password', 'status' => false]);
        }
        $user = User::where('contact', $request->contact)->first();
        if ($user) {
            return response()->json(['msg' => 'Account Already Exist', 'status' => false]);
        }
        $user = new User();
        $user->name = $request->name;
        $user->contact = $request->contact;
        $user->slugid = md5($request->name . time());
        $user->password = Hash::make($request->password);


        $user->save();
        $user['type'] = 'mobile';
        // $accessToken = $user->createToken('authToken')->accessToken;

        // return response([ 'user' => $user, 'access_token' => $accessToken]);
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $user]);
    }

    public function api_sendOTP(Request $request)
    {
        if (empty($request->contact)) {
            return response()->json(['status' => false, 'msg' => 'Enter mobile number']);
        }
        $randomNumber = random_int(1000, 9999);
        $data['otp'] = $randomNumber;
        return response()->json(['status' => true, 'msg' => 'Otp Send', 'data' => $data]);
    }

    //user login api
    public function api_login(Request $request)
    {

        // $mobileData = $request->post('contact');
        // $password = $request->post('password');

        // $getUserDetail = null;



        // if (empty($mobileData)) {
        //     return response()->json(['status' => false, 'msg' => 'Enter mobile number']);
        // } 
        // if (empty($password)) {
        //     return response()->json(['status' => false, 'msg' => 'Enter Password']);
        // }  



        // $auth = $request->only("contact","password");

        // if(Auth::attempt($auth)){
        //     $user = Auth::user();
        //     return response()->json(['status' =>true,'msg'=>'User Exist','data'=>$user,'pas'=>$password]);
        // } else{

        //     return response()->json(['status' =>true,'msg'=>'User Exist','data'=>,'pas'=>$password]);
        // }




        if (empty($request->type)) {
            return response()->json(['msg' => 'Enter Login Type', 'status' => false]);
        }



        if ($request->type === "mobile") {
            if (empty($request->contact)) {
                return response()->json(['msg' => 'Enter Mobile Number', 'status' => false]);
            }
            if (empty($request->password)) {
                return response()->json(['msg' => 'Enter Password', 'status' => false]);
            }

            $user = User::where('contact', $request->contact)->first();
            if (!$user) {
                return response()->json(['msg' => 'user not found.', 'status' => false,]);
            }

            if (!Hash::check($request->password, $user->password)) {
                return response()->json(['msg' => 'Enter correct Password', 'status' => false]);
            } else {
                //auth()->login($user);
                // $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
                // return response()->json(['token' => $token], 200);
                $user['type'] = $request->type;
                return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $user]);
            }
        } else if ($request->type === "gmail") {
            if (empty($request->email)) {
                return response()->json(['msg' => 'Enter Email', 'status' => false]);
            }
            if (empty($request->password)) {
                return response()->json(['msg' => 'Enter Password', 'status' => false]);
            }
            if (empty($request->name)) {
                return response()->json(['msg' => 'Enter Name', 'status' => false]);
            }
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $user['type'] = $request->type;
                return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $user]);
            } else {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->slugid = md5($request->name . time());
                $user->password = Hash::make($request->password);
                $user->save();
                $user['type'] = $request->type;
                return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $user]);
            }
        }

        // $accessToken = $user->createToken('authToken')->accessToken;

        // return response([ 'user' => $user, 'access_token' => $accessToken]);




    }


    //category

    public function mockTestCategory()
    {
        $data = Category::all();
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }


    public function subcategory($category_id)
    {
        $data = SubCategory::where('category_id', $category_id)->get();

        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
        //  echo $data;
    }


    public function get_StudyMetrial()
    {
        $data = StudymetrialCategory::all();
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }
    // public function get_StudyChapter($sm_categories_id){

    // public function get_StudyMetrial(){
    //     return StudymetrialCategory::all();
    // }








    public function get_StudyChapter($sm_categories_id)
    {
        $data = StudymetrialChapter::where('sm_categories_id', $sm_categories_id)->get();
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }


    // .............Examination...........
    public function get_Examination(Request $request)
    {
        if (empty($request->user)) {
            return response()->json(['msg' => 'Enter User', 'status' => false]);
        }
        $user_id =  User::select('id')->where("slugid", $request->user)->first();
        if (!$user_id) {
            return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
        }
        $category_id = $request->category_id;
        if (empty($category_id)) {
            return response()->json(['msg' => 'Enter Category Id', 'status' => false]);
        }
        $subcategory_id = $request->subcategory_id;
        if (empty($subcategory_id)) {
            return response()->json(['msg' => 'Enter SubCategory Id', 'status' => false]);
        }

        $data = Examination::where('category_id', $category_id)->where('subcategory_id', $subcategory_id)
            ->with('category', 'subcategory', 'lang.language')->with(['attm' => function ($q) use ($user_id) {
                $q->where('users_id', $user_id->id)->where('mocktesttype', 'normal');
            }])

            ->get()
            ->map(function ($item) {
                $free = $item->isFree;
                $type = "Buy";
                $TestID = "";

                if (empty($item->attm)) {

                    if ($free) {
                        $type = "Start";
                        $TestID = "";
                    } else {
                    }
                } else {
                    $type = $item->attm->type;
                    $TestID =  $item->attm->slugid;
                }
                return collect([
                    "testId" => $TestID,
                    "id" => $item->slugid,
                    "categoryId" => $item->category->id,
                    "name" => $item->exam_name,
                    "categoryName" => $item->category->category,
                    "subbCategoryId" => $item->subcategory->id,
                    "subCategoryName" => $item->subcategory->subcategory,
                    "totalTimeinMints" => $item->time_duration,
                    "totalQues" => $item->noQues,
                    "type" => $type,
                    "totalTimeinMints" => $item->time_duration,
                    "languages" => $item->lang->map(function ($lang) {
                        return collect([
                            "name" => $lang->language->languagename,
                            "id" => $lang->language->id
                        ]);
                    })
                ]);
            });
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }

    // ..........studymetrial API...........

    public function get_SMetrial(Request $request)
    {
        $sm_categories_id = $request->sm_categories_id;
        if (empty($sm_categories_id)) {
            return response()->json(['msg' => 'Enter SmCategory Id', 'status' => false]);
        }
        $sm_chapters_id = $request->sm_chapters_id;
        if (empty($sm_chapters_id)) {
            return response()->json(['msg' => 'Enter SmChapter Id', 'status' => false]);
        }

        $data = Study::select('name', 'id')->where('sm_categories_id', $sm_categories_id)->where('sm_chapters_id', $sm_chapters_id)->get();
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }


    //............product Api..............



    //............product Api..............


    public function get_SMetrial_data(Request $request)
    {
        $sm_categories_id = $request->categories_id;
        if (empty($sm_categories_id)) {
            return response()->json(['msg' => 'Enter SmCategory Id', 'status' => false]);
        }
        $sm_chapters_id = $request->chapters_id;
        if (empty($sm_chapters_id)) {
            return response()->json(['msg' => 'Enter SmChapter Id', 'status' => false]);
        }

        $sm_chapters_id = $request->chapters_id;
        if (empty($sm_chapters_id)) {
            return response()->json(['msg' => 'Enter SmChapter Id', 'status' => false]);
        }
        $sm_id = $request->sm_id;
        if (empty($sm_id)) {
            if ($sm_id != 0) {
                return response()->json(['msg' => 'Enter SmChapter Id', 'status' => $request->sm_id]);
            }
        }
        if ($sm_id == 0) {
            $data = Study::select('name', 'id', 'content')->where('sm_categories_id', $sm_categories_id)->where('sm_chapters_id', $sm_chapters_id)->get();
            return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
        } else {
            $data = Study::select('name', 'id', 'content')->where('sm_categories_id', $sm_categories_id)->where('sm_chapters_id', $sm_chapters_id)->where('id', $sm_id)->get();
            return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
        }
    }


    public function preareExam(Request $request)
    {
        if (empty($request->user)) {
            return response()->json(['msg' => 'Enter User', 'status' => false]);
        }
        $user_id =  User::select('id')->where("slugid", $request->user)->first();
        if (!$user_id) {
            return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
        }
        if (empty($request->examination)) {
            return response()->json(['msg' => 'Enter Examination', 'status' => false]);
        }
        $examination_id =  Examination::select('id', 'time_duration')->where("slugid", $request->examination)->first();
        if (!$examination_id) {
            return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
        }

        if (!$request->examtype) {
            return response()->json(['msg' => 'Invalid Exam Type', 'status' => false]);
        }

        $get = AttempedExam::where('examinations_id', $examination_id->id)->where('mocktesttype', $request->examtype)->where('users_id', $user_id->id)->first();
        if (empty($get)) {




            $Attemp = new AttempedExam();
            $Attemp->slugid = md5($request->user . time());
            $Attemp->examinations_id = $examination_id->id;
            $Attemp->users_id = $user_id->id;
            $Attemp->language_id = $request->language;
            $Attemp->remain_time = $examination_id->time_duration * 60;
            $Attemp->mocktesttype = $request->examtype;
            $Attemp->save();

            $examQuestion =  ExamQuestion::where('examination_id', $examination_id->id)->pluck('question_id');
            // $insertData = [];
            foreach ($examQuestion as $value) {

                $mock = new mockattempquestion();
                $mock->users_id =  $user_id->id;
                $mock->questions_id = $value;
                $mock->attemped_exams_id = $Attemp->id;
                $mock->save();
            }
            return response()->json(['msg' => 'Exam Created', 'status' => true, 'data' => ['testId' => $Attemp->slugid, "examinationId" => $request->examination]]);
        } else {

            if ($request->examtype == "reattemp") {
                $get->lastQues = 0;
                $get->type = "resume";
                $get->language_id = $request->language;
                $get->remain_time = $examination_id->time_duration * 60;
                $get->save();

                $testId = $get->id;
                $data =   mockattempquestion::where('attemped_exams_id', $testId)->where('users_id', $user_id->id)->update([
                    "QuesSeen" => "false",
                    "QuesSelect" => "",
                    "time" => 0,
                ]);


                return response()->json(['msg' => 'Exam Created', 'status' => true, 'data' => ['testId' => $get->slugid, "examinationId" => $request->examination]]);
            } else {
                return response()->json(['msg' => 'Exam already exist', 'status' => false]);
            }
        }
        //   mockattempquestion::insert($insertData);


    }

    //.......................quiz prepareExam.......................//

    public function preareQuizExam(Request $request)
    {
        if (empty($request->user)) {
            return response()->json(['msg' => 'Enter User', 'status' => false]);
        }
        $user_id =  User::select('id')->where("slugid", $request->user)->first();
        if (!$user_id) {
            return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
        }
        if (empty($request->quizexamination)) {
            return response()->json(['msg' => 'Enter QuizExamination', 'status' => false]);
        }
        $quiz_examinations_id =  QuizExamination::select('id', 'time_duration')->where("slugid", $request->quizexamination)->first();

        if (!$quiz_examinations_id) {
            return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
        }
        if (!$request->examtype) {
            return response()->json(['msg' => 'Invalid Exam Type', 'status' => false]);
        }


        //$Quiz = new quizAttemp();
        //$Quiz->slugid = md5($request->user . time());
        // $Quiz->quiz_examinations_id = $quiz_examinations_id->id;
        //$Quiz->users_id = $user_id->id;
        //$Quiz->language_id = $request->language;
        //$Quiz->save();

        $get = quizAttemp::where('quiz_examinations_id', $quiz_examinations_id->id)->where('mocktesttype', $request->examtype)->where('users_id', $user_id->id)->first();
        if (empty($get)) {
            $Quiz = new quizAttemp();
            $Quiz->slugid = md5($request->user . time());
            $Quiz->quiz_examinations_id = $quiz_examinations_id->id;
            $Quiz->users_id = $user_id->id;
            $Quiz->language_id = $request->language;
            $Quiz->remain_time = $quiz_examinations_id->time_duration * 60;
            $Quiz->mocktesttype = $request->examtype;
            $Quiz->save();

            $quizQuestion =  QuizQuestion::where('quiz_examinations_id', $quiz_examinations_id->id)->pluck('question_id');
            foreach ($quizQuestion as $value) {

                $mock = new QuizAttemptQuestion();
                $mock->users_id =  $user_id->id;
                $mock->question_id = $value;
                $mock->quiz_attemps_id = $Quiz->id;
                $mock->save();
            }
            return response()->json(['msg' => 'Quiz Created', 'status' => true, 'data' => ['testId' => $Quiz->slugid, "examinationId" => $request->quizexamination]]);
        } else {

            if ($request->examtype == "reattemp") {
                return response()->json(['msg' => 'Quiz Created', 'status' => true, 'data' => ['testId' => $get->slugid, "examinationId" => $request->quizexamination]]);
            } else {
                return response()->json(['msg' => 'Quiz already exist', 'status' => false]);
            }
        }
    }



    public function get_Product()
    {
        $data = Product::all();
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }


    public function getProductFilter()
    {
        $data = Product::where('type');
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }

    public function Add_To_Cart()
    {
        $data = Cart::all();

        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }

    public function DeleteCart(Cart $cart)
    {
        $cart->delete();

        return response()->json(['msg' => 'Data deleted', 'status' => true, 'data' => $cart]);
    }

    public function get_Verification($code)
    {
        $coupon = Coupon::where('code', $code)->first();
        if (!$coupon) {

            return response()->json(['msg' => 'Coupon not exist', 'status' => true]);
        } else {
            return response()->json(['msg' => 'Coupon allready used', 'status' => false]);
        }
    }

    ///////////////////////////Quiz////////////////////////////////////////////////////

    public function quizCategory(Request $request)
    {

        $data = QuizCategory::withCount('subcategory')->get();
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }
    public function quizSubCategory(Request $request)
    {


        if (empty($request->category)) {
            return response()->json(['msg' => 'Enter Cateogry', 'status' => false]);
        }
        $data = QuizSubCategory::where('quiz_categories', $request->category)->withCount('chapter')->get();



        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }
    public function quizChapter(Request $request)
    {

        if (empty($request->subCategory)) {
            return response()->json(['msg' => 'Enter SubCateogry', 'status' => false]);
        }
        $data = QuizChapter::where('quiz_sub_categories', $request->subCategory)->withCount('topic')->get();
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }
    public function quizTopic(Request $request)
    {
        if (empty($request->chapter)) {
            return response()->json(['msg' => 'Enter Chapter', 'status' => false]);
        }

        $data = QuizTopic::where('quiz_chapters', $request->chapter)->get();
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }


    public function get_QuizExamination(Request $request)
    {
        if (empty($request->user)) {
            return response()->json(['msg' => 'Enter User', 'status' => false]);
        }
        $user_id =  User::select('id')->where("slugid", $request->user)->first();
        if (!$user_id) {
            return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
        }
        $quiz_categories_id = $request->quiz_categories_id;
        if (empty($quiz_categories_id)) {
            return response()->json(['msg' => 'Enter QuizCategory Id', 'status' => false]);
        }
        $quiz_sub_categories_id = $request->quiz_sub_categories_id;

        $quiz_chapters_id = $request->quiz_chapters_id;

        $quiz_topics_id = $request->quiz_topics_id;


        $data = QuizExamination::where('quiz_categories_id', $quiz_categories_id)->where('quiz_sub_categories_id', $quiz_sub_categories_id)
            ->where('quiz_chapters_id', $quiz_chapters_id)->where('quiz_topics_id', $quiz_topics_id)
            ->with('quizCat', 'quizsubcat', 'quizChat', 'quiztopic', 'lang.language')->with(['quizattm' => function ($qc) use ($user_id) {
                $qc->where('users_id', $user_id->id);
            }])


            ->get()
            ->map(function ($item) {
                //    return $item;

                $free = $item->isFree;
                $type = "Buy";
                $TestID = "";

                if (empty($item->quizattm)) {

                    if ($free) {
                        $type = "Start";
                    } else {
                    }
                } else {
                    $type = $item->quizattm->type;
                    $TestID =  $item->quizattm->slugid;
                }



                return collect([
                    "testId" => $TestID,
                    "id" => $item->slugid,

                    "name" => $item->exam_name,
                    "totalTimeinMints" => $item->time_duration,
                    "totalQues" => $item->noquizques,
                    "type" => $type,
                    "totalTimeinMints" => $item->time_duration,
                    "languages" => $item->lang->map(function ($lang) {
                        return collect([

                            "name" => $lang->language->languagename,
                            "id" => $lang->language->id,

                        ]);
                    })
                ]);
            });
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }


    public function __checkUser(Request $request)
    {
        if (empty($request->user)) {
            return ['msg' => 'Enter User', 'status' => false];
        }
        $user_id =  User::select('id')->where("slugid", $request->user)->first();
        if (!$user_id) {
            return ['msg' => 'Invalid User ID', 'status' => false];
        } else {
            return;
        }
    }

    public function getBlogCategory()
    {

        $data = BlogCategory::all();

        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }

    public function getBlog(Request $request)
    {

        // if (empty($request->category_id)) {
        //     return response()->json(['msg' => 'Enter Category id', 'status' => false]);
        // }
        $data = Blog::where('category_id', $request->category_id)->get();

        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }



    public function getExamData(Request $request)
    {
        if (empty($request->user)) {
            return response()->json(['msg' => 'Enter User', 'status' => false]);
        }
        $user_id =  User::select('id')->where("slugid", $request->user)->first();
        if (!$user_id) {
            return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
        }
        if (empty($request->examination)) {
            return response()->json(['msg' => 'Enter Examination', 'status' => false]);
        }
        $examination_id =  Examination::select('id')->where("slugid", $request->examination)->first();

        if (!$examination_id) {
            return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
        }

        if (empty($request->testId)) {
            return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
        }
        $testId =  AttempedExam::select('id')->where("slugid", $request->testId)->first();

        if (!$testId) {
            return response()->json(['msg' => 'Invalid Test Id', 'status' => false]);
        }


        $bodyStart  = `
        <!DOCTYPE html><html class="no-js" lang="zxx">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="http://3.111.120.100/newlms/assets/css/vendor/bootstrap.min.css">
            <link rel="stylesheet" href="http://3.111.120.100/newlms/assets/css/app.css">
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;500&family=Roboto:wght@300;500&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
.span {
    color: black;
    font-size: 1.4rem;
}

p {
  margin: 0;
}
h3 {
      font-size: 20px;
}
.box-shadows {
       box-shadow: none;
    padding: 10px;
    margin-bottom: 30px;
    border: 1px solid #e5dfdf;
}
.accordion {
  margin-bottom: 30px;
}
.according_tab .card-header button {
      border: 0;
      font-size: 18px;
      text-decoration: none;
      color: #000;
      padding: 0;
}
.card-header {
    padding: 0 10px;
}
.solutions {

}
.solutions p {
      font-size: 18px;
    color: #000;
}
.checkbox-custom, .radio-custom {
    opacity: 0;
    position: absolute;  
        height: 40px; 
}

.checkbox-custom, .checkbox-custom-label, .radio-custom, .radio-custom-label {
    display: inline-block;
    vertical-align: middle;
    margin: 5px;
    cursor: pointer;
}
input[type="checkbox"]~label, input[type="radio"]~label {
      border: 1px solid #b0a7a7;
    width: 100%;
    padding: 8px;
}
.checkbox-custom-label, .radio-custom-label {
    position: relative;
}

.checkbox-custom + .checkbox-custom-label:before, .radio-custom + .radio-custom-label:before {
    content: '';
    background: #fff;
    border: 2px solid #ddd;
    display: inline-block;
    vertical-align: middle;
    width: 20px;
    height: 20px;
    padding: 2px;
    margin-right: 10px;
    text-align: center;
}

.checkbox-custom:checked + .checkbox-custom-label:before {
    content: "\f00c";
    font-family: 'FontAwesome';
    background: rebeccapurple;
    color: #fff;
}

.radio-custom + .radio-custom-label:before {
    border-radius: 0 !important;
    width: 100%;
    height: 42px;
    opacity: 0;
}

.radio-custom:checked + .radio-custom-label:before {
  content: '';
   /*  content: "\f00c";
   font-family: 'FontAwesome';
    color: #000;*/
    position: absolute;
    top: 0;
    width: 100%;
    height: 42px;
    border-radius: 0 !important;
    z-index: -1;
    border-color: #03a9f4;
    opacity: 1;
}

.checkbox-custom:focus + .checkbox-custom-label, .radio-custom:focus + .radio-custom-label {
  outline: 1px solid #ddd; /* focus style */
}
input[type="radio"]~label::after {
  opacity: 0 !important;
}
.card-header {
  background-color: transparent;
  text-align: center;
      border: none;
}
button:focus {outline:0;}
.question-answer {
  display: flex;
    justify-content: end;
    margin-top: 10px;
}
.question-answer p {

}
.question-answer p svg{
    width: 35px;
    height: 35px;
    cursor: pointer;
    border-radius: 50px;
    padding: 2px;
    margin-right: 15px;
}
@media (max-width: 767px) {
	.radio-custom:checked + .radio-custom-label:before {
		    height: 100% !important;
	}
}
.bi-check2 {
      color: #fff;
    background: green;
}
.bi-check-all {
  color: #fff;
    background: red;
}
.bi-x {
  color: #fff;
    background: #3f51b5;
}
</style>

  </head>
<body>





<div class="d-grid gap-2 mt-4 box-shadows">
    <h4 class="question">`;

       
        $html1 = `</h4><div class="btn" onclick="myFunction(this)" id="1" value="selOpt1">
        <input id="radio-1" class="radio-custom" name="radio-group" type="radio">
        <label for="radio-1" class="radio-custom-label">A. <span>`;
        $html2 = `</span></label>
        </div>
        <div class="btn" onclick="myFunction(this)" id="2" value="selOpt2">
            <input id="radio-2" class="radio-custom"name="radio-group" type="radio">
            <label for="radio-2" class="radio-custom-label">B. <span>`;

        $html3 = `</span></label>
        </div>
        <div class="btn" onclick="myFunction(this)" id="3" value="selOpt3">
            <input id="radio-3" class="radio-custom" name="radio-group" type="radio">
            <label for="radio-3" class="radio-custom-label">C. <span>`;
        $html4 = `</span></label>
        </div>
        <div class="btn" onclick="myFunction(this)" id="4" value="selOpt4">
            <input id="radio-4" class="radio-custom" name="radio-group" type="radio">
            <label for="radio-4" class="radio-custom-label">D. <span>`;
        $html5 = `</span></label>
        </div>
        </div>       
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        
        
        <script>
            function myFunction(elem) {
                console.log("selOpt" + elem.id)
                  JSInterface.select("selOpt" + elem.id);        
            }
        </script>
        
        </body>
        
        </html>`;
       

        


        $data = AttempedExam::with(['examination.examQ.question.mockAttemp' => function ($q) use ($testId, $user_id) {
            $q->where('attemped_exams_id', $testId->id)->where('users_id', $user_id->id);
        }])->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('examinations_id', $examination_id->id)
            ->get()
            ->map(function ($d) use ($bodyStart,$html1,$html2,$html3,$html4,$html5) {

                if ($d['type'] != "resume") {
                    return "Test not resume";
                } else if ($d['type'] = "resume") {

                    return [
                        "testID" => $d->slugid,
                        "languageId" => $d->language->id,
                        "languageName" => $d->language->languagename,
                        "examId" => $d->examination->slugid,
                        "lastQues" => $d->lastQues,
                        "type" => $d->mocktesttype,
                        "time" => $d->remain_time,
                        "languages" => $d->examination->lang->map(function ($langg) {
                            return ["id" => $langg->language->id, "language" => $langg->language->languagename,];
                        }),
                        "wMarks" => $d->examination->wrongmarks,
                        "rMarks" => $d->examination->rightmarks,
                        'noQues' => $d->examination->noQues,
                        "questionslist" => $d->examination->examQ->map(function ($fff) use ($bodyStart,$html1,$html2,$html3,$html4,$html5) {


            

                            return collect([
                                "questionId" => $fff->question->mockAttemp->id,
                                "s" => $fff->question->mockAttemp->QuesSeen,
                                "optSel" => $fff->question->mockAttemp->QuesSelect,
                                "time" => $fff->question->mockAttemp->time,
                                "question" => $fff->question->secondquestion

                                    ->map(function ($ques) use ($bodyStart,$html1,$html2,$html3,$html4,$html5) {




                                        return collect([
                                            "id" => $ques->language->id,
                                            "language" => $ques->language->languagename,
                                            "QuestioninHtml" => $bodyStart.$ques->question .$html1.$ques->option1  . $html2 . $ques->option2 . $html3 . $ques->option3 . $html4 . $ques->option4 . $html5
                                        ]);
                                    })
                            ]);
                        })
                    ];
                }
            });
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }

    public function get_QuizExamData(Request $request)
    {
        if (empty($request->user)) {
            return response()->json(['msg' => 'Enter User', 'status' => false]);
        }
        $user_id =  User::select('id')->where("slugid", $request->user)->first();
        if (!$user_id) {
            return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
        }
        if (empty($request->quizexamination)) {
            return response()->json(['msg' => 'Enter QuizExamination', 'status' => false]);
        }
        $quiz_examinations_id =  QuizExamination::select('id')->where("slugid", $request->quizexamination)->first();

        if (!$quiz_examinations_id) {
            return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
        }

        if (empty($request->testId)) {
            return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
        }
        $testId =  quizAttemp::select('id')->where("slugid", $request->testId)->first();

        if (!$testId) {
            return response()->json(['msg' => 'Invalid Test Id', 'status' => false]);
        }


        $htm1  = '<!DOCTYPE html><html class="no-js" lang="zxx">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="http://3.111.120.100/newlms/assets/css/vendor/bootstrap.min.css">
            <link rel="stylesheet" href="http://3.111.120.100/newlms/assets/css/app.css">
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;500&family=Roboto:wght@300;500&display=swap" rel="stylesheet">
        </head>
        
        <body>
            <style type="text/css">
                .btn {
                    background-color: whitesmoke;
                    border: 1.5px solid black;
                    border-radius: 10px;
                    padding: 5px;
                    text-align: start;
                }
        
                .span {
                    color: black;
                    font-size: 1.4rem;
                }
            </style>
            <div class="m-4">
                <div class="">';

        $html1 =  '</div>
                <div class="d-grid gap-2 mt-4">
                    <div class="btn" onclick="myFunction(this)" id="1" value="selOpt1">
                        <div class="row align-items-center">
                            <span class="col-auto span">A.</span>
                            <div type="text" class="col">';
        $html2  = '</div>
                            </div>
                        </div>
                        <div class="btn" onclick="myFunction(this)" id="2" value="selOpt2">
                            <div class="row align-items-center">
                                <span class="col-auto span">B.</span>
                                <div type="text" class="col">';
        $html3 = ' </div>
                                </div>
                            </div>
                            <div class="btn" onclick="myFunction(this)" id="3" value="selOpt3">
                                <div class="row align-items-center">
                                    <span class="col-auto span">C.</span>
                                    <div type="text" class="col">';
        $html4 = '</div>
                                    </div>
                                </div>
                                <div class="btn" onclick="myFunction(this)" id="4">
                                    <div class="row align-items-center">
                                        <span class="col-auto span">D.</span>
                                        <div type="text" class="col">';
        $html5 =  '</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function myFunction(elem) {
                                    for (let i = 0; i < 5; i++) {
                                        if (elem.id == i) {
                    
                                            $("#" + i).css("border", "1.5px solid #90ee02");
                                            JSInterface.select("selOpt" + elem.id);
                                        } else {
                                            
                                            $("#" + i).css("border", "1.5px solid");
                                        }
                                    }
                                }
                            </script>
                        </body>
                        
                        </html>';


        $data = quizAttemp::with(['examination.quizexamQ.question.quizAttemp' => function ($q) use ($testId, $user_id) {
            $q->where('quiz_attemps_id', $testId->id)->where('users_id', $user_id->id);
        }])->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('quiz_examinations_id', $quiz_examinations_id->id)
            ->get()
            ->map(function ($d) use ($htm1, $html1, $html2, $html3, $html4, $html5) {

                if ($d['type'] != "resume") {
                    return "Test not resume";
                } else if ($d['type'] = "resume") {

                    return collect([
                        "testID" => $d->slugid,
                        "languageId" => $d->language->id,
                        "languageName" => $d->language->langagename,
                        "languages" => $d->examination->lang->map(function ($langg) {

                            return [
                                "id" => $langg->language->id,
                                "language" => $langg->language->languagename,
                            ];
                        }),
                        "quizid" => $d->examination->slugid,
                        "lastQues" => $d->lastQues,
                        "type" => $d->mocktesttype,
                        "lastQues" => $d->lastQues,
                        "time" => $d->remain_time,
                        "wMarks" => $d->examination->wrongmarks,
                        "rMarks" => $d->examination->rightmarks,
                        'noQues' => $d->examination->noQues,
                        "questionslist" => $d->examination->quizexamQ->map(function ($fff) use ($htm1, $html1, $html2, $html3, $html4, $html5) {
                            return collect([
                                "questionId" => $fff->question->id,
                                "s" => $fff->question->mockAttemp->QuesSeen,
                                "optSel" => $fff->question->mockAttemp->QuesSelect,
                                "time" => $fff->question->mockAttemp->time,
                                "question" => $fff->question->secondquestion

                                    ->map(function ($ques) use ($htm1, $html1, $html2, $html3, $html4, $html5) {
                                        return collect([
                                            "id" => $ques->language->id,
                                            "language" => $ques->language->languagename,
                                            //"QuestioninHtml" => $htm1. $ques->question .$html1. $ques->option1  .$html2. $ques->option2 .$html3. $ques->option3 .$html4 . $ques->option4 .$html5
                                        ]);
                                    })

                            ]);
                        })
                    ]);
                }
            });
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }


    public function get_QuizSolutions(Request $request)
    {
        if (empty($request->user)) {
            return response()->json(['msg' => 'Enter User', 'status' => false]);
        }
        $user_id =  User::select('id')->where("slugid", $request->user)->first();
        if (!$user_id) {
            return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
        }
        if (empty($request->quizexamination)) {
            return response()->json(['msg' => 'Enter QuizExamination', 'status' => false]);
        }
        $quiz_examinations_id =  QuizExamination::select('id')->where("slugid", $request->quizexamination)->first();

        if (!$quiz_examinations_id) {
            return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
        }

        if (empty($request->testId)) {
            return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
        }

        $testId = quizAttemp::select('id')->where("slugid", $request->testId)->first();


        if (!$testId) {
            return response()->json(['msg' => 'Invalid Test Id', 'status' => false]);
        }


        $htm1  = '<!DOCTYPE html><html class="no-js" lang="zxx">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="http://3.111.120.100/newlms/assets/css/vendor/bootstrap.min.css">
            <link rel="stylesheet" href="http://3.111.120.100/newlms/assets/css/app.css">
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;500&family=Roboto:wght@300;500&display=swap" rel="stylesheet">
        </head>
        
        <body>
            <style type="text/css">
                .btn {
                    background-color: whitesmoke;
                    border: 1.5px solid black;
                    border-radius: 10px;
                    padding: 5px;
                    text-align: start;
                }
        
                .span {
                    color: black;
                    font-size: 1.4rem;
                }
            </style>
            <div class="m-4">
                <div class="">';

        $html1 =  '</div>
                <div class="d-grid gap-2 mt-4">
                    <div class="btn" onclick="myFunction(this)" id="1" value="selOpt1">
                        <div class="row align-items-center">
                            <span class="col-auto span">A.</span>
                            <div type="text" class="col">';
        $html2  = '</div>
                            </div>
                        </div>
                        <div class="btn" onclick="myFunction(this)" id="2" value="selOpt2">
                            <div class="row align-items-center">
                                <span class="col-auto span">B.</span>
                                <div type="text" class="col">';
        $html3 = ' </div>
                                </div>
                            </div>
                            <div class="btn" onclick="myFunction(this)" id="3" value="selOpt3">
                                <div class="row align-items-center">
                                    <span class="col-auto span">C.</span>
                                    <div type="text" class="col">';
        $html4 = '</div>
                                    </div>
                                </div>
                                <div class="btn" onclick="myFunction(this)" id="4">
                                    <div class="row align-items-center">
                                        <span class="col-auto span">D.</span>
                                        <div type="text" class="col">';
        $html5 =  '</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function myFunction(elem) {
                                    for (let i = 0; i < 5; i++) {
                                        if (elem.id == i) {
                    
                                            $("#" + i).css("border", "1.5px solid #90ee02");
                                            JSInterface.select("selOpt" + elem.id);
                                        } else {
                                            
                                            $("#" + i).css("border", "1.5px solid");
                                        }
                                    }
                                }
                            </script>
                        </body>
                        
                        </html>';



        $data = quizAttemp::with(['quizexamination.quizexamQ.question.quizAttemp' => function ($q) use ($testId, $user_id) {
            $q->where('quiz_exams_id', $testId->id)->where('users_id', $user_id->id);
        }])->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('quiz_examinations_id', $quiz_examinations_id->id)
            ->get()
            ->map(function ($d) use ($htm1, $html1, $html2, $html3, $html4, $html5) {

                //  $data = quizAttemp::with(['examination.quizexamQ.question.quizAttemp' => function ($q) use ($testId, $user_id) {
                //           $q->where('quiz_attemps_id', $testId->id)->where('users_id', $user_id->id);
                //     }])->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('quiz_examinations_id', $quiz_examinations_id->id)
                //       ->get()
                //    ->map(function ($d) use ($htm1, $html1, $html2, $html3, $html4, $html5) {


                if ($d['type'] != "resume") {
                    return "Test not resume";
                } else if ($d['type'] = "resume") {

                    return collect([
                        "testID" => $d->slugid,
                        "languageId" => $d->language->id,
                        "languageName" => $d->language->langagename,
                        "languages" => $d->examination->lang->map(function ($langg) {

                            return [
                                "id" => $langg->language->id,
                                "language" => $langg->language->languagename,
                            ];
                        }),
                        "quizid" => $d->examination->slugid,
                        "lastQues" => $d->lastQues,
                        "type" => $d->mocktesttype,
                        "lastQues" => $d->lastQues,
                        "time" => $d->remain_time,
                        "wMarks" => $d->examination->wrongmarks,
                        "rMarks" => $d->examination->rightmarks,
                        'noQues' => $d->examination->noQues,
                        "questionslist" => $d->examination->quizexamQ->map(function ($fff) use ($htm1, $html1, $html2, $html3, $html4, $html5) {
                            // $aaa="";
                            // if($fff->question->rightans===$fff->question->mockAttemp->QuesSelect){
                            // $aaa =true;
                            // }else{
                            //     $aaa= false;
                            // }
                            return collect([
                                "questionId" => $fff->question->id,
                                "s" => $fff->question->mockAttemp->QuesSeen,
                                "optSel" => $fff->question->mockAttemp->QuesSelect,
                                "time" => $fff->question->mockAttemp->time,
                                "isRight" => false,
                                "question" => $fff->question->secondquestion

                                    ->map(function ($ques) use ($htm1, $html1, $html2, $html3, $html4, $html5) {
                                        return collect([
                                            "id" => $ques->language->id,
                                            "language" => $ques->language->languagename,
                                            //"QuestioninHtml" => $htm1. $ques->question .$html1. $ques->option1  .$html2. $ques->option2 .$html3. $ques->option3 .$html4 . $ques->option4 .$html5
                                        ]);
                                    })

                            ]);
                        })
                    ]);
                }
            });
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }


    public function getExamSolution(Request $request)
    {
        if (empty($request->user)) {
            return response()->json(['msg' => 'Enter User', 'status' => false]);
        }
        $user_id =  User::select('id')->where("slugid", $request->user)->first();
        if (!$user_id) {
            return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
        }
        if (empty($request->examination)) {
            return response()->json(['msg' => 'Enter Examination', 'status' => false]);
        }
        $examination_id =  Examination::select('id')->where("slugid", $request->examination)->first();

        if (!$examination_id) {
            return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
        }

        if (empty($request->testId)) {
            return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
        }
        $testId =  AttempedExam::select('id')->where("slugid", $request->testId)->first();

        if (!$testId) {
            return response()->json(['msg' => 'Invalid Test Id', 'status' => false]);
        }


        $htm1  = '
        <!DOCTYPE html><html class="no-js" lang="zxx">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="http://3.111.120.100/newlms/assets/css/vendor/bootstrap.min.css">
            <link rel="stylesheet" href="http://3.111.120.100/newlms/assets/css/app.css">
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;500&family=Roboto:wght@300;500&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
.span {
    color: black;
    font-size: 1.4rem;
}

p {
  margin: 0;
}
h3 {
      font-size: 20px;
}
.box-shadows {
       box-shadow: none;
    padding: 10px;
    margin-bottom: 30px;
    border: 1px solid #e5dfdf;
}
.accordion {
  margin-bottom: 30px;
}
.according_tab .card-header button {
      border: 0;
      font-size: 18px;
      text-decoration: none;
      color: #000;
      padding: 0;
}
.card-header {
    padding: 0 10px;
}
.solutions {

}
.solutions p {
      font-size: 18px;
    color: #000;
}
.checkbox-custom, .radio-custom {
    opacity: 0;
    position: absolute;  
        height: 40px; 
}

.checkbox-custom, .checkbox-custom-label, .radio-custom, .radio-custom-label {
    display: inline-block;
    vertical-align: middle;
    margin: 5px;
    cursor: pointer;
}
input[type="checkbox"]~label, input[type="radio"]~label {
      border: 1px solid #b0a7a7;
    width: 100%;
    padding: 8px;
}
.checkbox-custom-label, .radio-custom-label {
    position: relative;
}

.checkbox-custom + .checkbox-custom-label:before, .radio-custom + .radio-custom-label:before {
    content: "";
    background: #fff;
    border: 2px solid #ddd;
    display: inline-block;
    vertical-align: middle;
    width: 20px;
    height: 20px;
    padding: 2px;
    margin-right: 10px;
    text-align: center;
}

.checkbox-custom:checked + .checkbox-custom-label:before {
    content: "\f00c";
    font-family: "FontAwesome";
    background: rebeccapurple;
    color: #fff;
}

.radio-custom + .radio-custom-label:before {
    border-radius: 0 !important;
    width: 100%;
    height: 42px;
    opacity: 0;
}
@media (max-width: 767px) {
	.radio-custom:checked + .radio-custom-label:before {
		    height: 100% !important;
	}
}
.radio-custom:checked + .radio-custom-label:before {
  content: "";
   /*  content: "\f00c";
   font-family: "FontAwesome";
    color: #000;*/
    position: absolute;
    top: 0;
    width: 100%;
    height: 42px;
    border-radius: 0 !important;
    z-index: -1;
    border-color: #03a9f4;
    opacity: 1;
}

.checkbox-custom:focus + .checkbox-custom-label, .radio-custom:focus + .radio-custom-label {
  outline: 1px solid #ddd; /* focus style */
}
input[type="radio"]~label::after {
  opacity: 0 !important;
}
.card-header {
  background-color: transparent;
  text-align: center;
      border: none;
}
button:focus {outline:0;}
.question-answer {
  display: flex;
    justify-content: end;
    margin-top: 10px;
}
.question-answer p {

}
.question-answer p svg{
    width: 35px;
    height: 35px;
    cursor: pointer;
    border-radius: 50px;
    padding: 2px;
    margin-right: 15px;
}
.bi-check2 {
      color: #fff;
    background: green;
}
.bi-check-all {
  color: #fff;
    background: red;
}
.bi-x {
  color: #fff;
    background: #3f51b5;
}
</style>

  </head>
<body>


<div class="according_tab">
 
  <div class="accordion" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Direction</button>
        </h2>
      </div>

      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
        ';
        $htmlDirection = '</div>
        </div>
      </div>
    
    </div>
  </div>
  
  
  <div class="d-grid gap-2 mt-4 box-shadows">
      <h4 class="question">';

        $html1 =  '</h4>
        <div onclick="myFunction(this)" id="1">
            <input id="radio-1" class="radio-custom" name="radio-group" type="radio">
            <label for="radio-1" class="radio-custom-label"><span> A.</span>
            ';
        $html2  = '</label>
        </div>
        <div onclick="myFunction(this)" id="2">
            <input id="radio-2" class="radio-custom"name="radio-group" type="radio">
            <label for="radio-2" class="radio-custom-label"><span>B.</span>';
        $html3 = ' </label>
        </div>
        <div onclick="myFunction(this)" id="3">
            <input id="radio-3" class="radio-custom" name="radio-group" type="radio">
            <label for="radio-3" class="radio-custom-label"><span>C.</span>';
        $html4 = '</label>
        </div>
        <div onclick="myFunction(this)" id="4">
            <input id="radio-4" class="radio-custom" name="radio-group" type="radio">
            <label for="radio-4" class="radio-custom-label"><span>D.</span>';
        $htmlexplain = '</label>
            </div>       
        <div class="box-shadows explanation">';
        $html5 =  '</div> 

 


        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
        </body>
        
        </html>';


        $data = AttempedExam::with(['examination.examQ.question.mockAttemp' => function ($q) use ($testId, $user_id) {
            $q->where('attemped_exams_id', $testId->id)->where('users_id', $user_id->id);
        }])->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('examinations_id', $examination_id->id)
            ->get()
            ->map(function ($d) use ($htm1, $htmlDirection, $html1, $html2, $html3, $html4, $htmlexplain, $html5) {

                if ($d['type'] == "resume") {
                    return "Test not Complete";
                } else if ($d['type'] == "result") {

                    return [
                        "testID" => $d->slugid,
                        "languageId" => $d->language->id,
                        "languageName" => $d->language->languagename,
                        "examId" => $d->examination->slugid,
                        "lastQues" => $d->lastQues,
                        "type" => $d->mocktesttype,
                        "time" => $d->remain_time,
                        "languages" => $d->examination->lang->map(function ($langg) {
                            return ["id" => $langg->language->id, "language" => $langg->language->languagename,];
                        }),
                        "wMarks" => $d->examination->wrongmarks,
                        "rMarks" => $d->examination->rightmarks,
                        'noQues' => $d->examination->noQues,
                        "questionslist" => $d->examination->examQ->map(function ($fff) use ($htm1, $htmlDirection, $html1, $html2, $html3, $html4, $htmlexplain, $html5) {
                            $aaa = false;
                            if ($fff->question->rightans == $fff->question->mockAttemp->QuesSelect) {
                                $aaa = true;
                            } else {
                                $aaa = false;
                            }
                            return collect([
                                "questionId" => $fff->question->mockAttemp->id,
                                "seen" => $fff->question->mockAttemp->QuesSeen,
                                "optSel" => $fff->question->mockAttemp->QuesSelect,
                                "time" => $fff->question->mockAttemp->time,
                                "isRight" => $aaa,
                                "question" => $fff->question->secondquestion

                                    ->map(function ($ques) use ($htm1, $htmlDirection, $html1, $html2, $html3, $html4, $htmlexplain, $html5) {
                                        return collect([
                                            "id" => $ques->language->id,
                                            "language" => $ques->language->languagename,
                                            "QuestioninHtml" => $htm1 . $ques->direction . $htmlDirection . $ques->question . $html1 . $ques->option1  . $html2 . $ques->option2 . $html3 . $ques->option3 . $html4 . $ques->option4 . $htmlexplain . $ques->explanation . $html5
                                        ]);
                                    })
                            ]);
                        })
                    ];
                }
            });
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }


    public function submitExam(Request $request)
    {





        if (empty($request->user)) {
            return response()->json(['msg' => 'Enter User', 'status' => false]);
        }

        $user =  User::select('id')->where('slugid', $request->user)->first();

        if (!$user) {
            return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
        }

        if (empty($request->examination)) {
            return response()->json(['msg' => 'Enter Examination', 'status' => false]);
        }

        $examination_id =  Examination::where("slugid", $request->examination)->first();

        if (!$examination_id) {
            return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
        }

        $type = "resume";
        if ($request->type == "submit") {
            $type = "result";
        }

        $rMarks  = $examination_id->rightmarks;
        $wMarks = "-" . $examination_id->wrongmarks;

        $testId = AttempedExam::where("slugid", $request->testId)->where("examinations_id", $examination_id->id)
            ->where("users_id", $user->id)->first();

        $total = Question::leftjoin('mockattempquestions', function ($join) use ($rMarks, $wMarks) {
            $join->on('questions.id', '=', 'mockattempquestions.questions_id');
        })->select(
            'questions.*',
            'mockattempquestions.*',
            DB::raw('(CASE WHEN questions.rightans = mockattempquestions.QuesSelect THEN ' . $rMarks . '
               ELSE ' . $wMarks . ' END) AS total')
        )->where('users_id', $user->id)->where('attemped_exams_id', $testId->id)->get();
        $total = $total->sum('total');
        $testIds = $testId->update(
            [
                "remain_time" => $request->time,
                "lastQues" => $request->currentpostion,
                "type" => $type,
                "totalmarks" => $total,
            ]
        );

        foreach ($request->array as $index => $value) {
            if ((!empty($value['optSel'])) && $value["seenType"] != "false") {

                $dd = mockattempquestion::where('id', $value['questionId'])->where('users_id', $user->id)->where('attemped_exams_id', $testId->id)->update(
                    [
                        "QuesSeen" => $value["seenType"],
                        "QuesSelect" => $value['optSel'],
                        "time" => $value['time']
                    ]
                );
            }



            // SELECT * FROM `questions`as u LEFT JOIN mockattempquestions as d  ON u.id = d.questions_id WHERE users_Id = 1 AND  attemped_exams_id = 5;

            // echo json_encode($value);

        }

        return response()->json(['msg' => 'Test Submited', 'status' => true, 'data' => ['examtype' => $testId->mocktesttype]]);
    }

    public function get_Result(Request $request)
    {
        $user_id = $request->userId;
        if (empty($user_id)) {
            return response()->json(['msg' => 'Enter User Id', 'status' => false]);
        }
        $test_id = $request->testId;
        if (empty($test_id)) {
            return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
        }
        $examination_id = $request->quizexaminationid;
        if (empty($examination_id)) {
            return response()->json(['msg' => 'Enter Examination Id', 'status' => false]);
        }

        $dda[] = [
            "QuestionNo" => 1, 'color' => "#FF0000"
        ];

        $dda[] = [
            "QuestionNo" => 2, 'color' => "#008000"
        ];
        $dda[] = [
            "QuestionNo" => 3, 'color' => "#C0C0C0"
        ];
        $dda[] = [
            "QuestionNo" => 4, 'color' => "#C0C0C0"
        ];
        $dda[] = [
            "QuestionNo" => 5, 'color' => "#008000"
        ];
        $dda[] = [
            "QuestionNo" => 6, 'color' => "#FF0000"
        ];
        $dda[] = [
            "QuestionNo" => 7, 'color' => "#C0C0C0"
        ];
        $dda[] = [
            "QuestionNo" => 8, 'color' => "#008000"
        ];
        $dda[] = [
            "QuestionNo" => 9, 'color' => "#FF0000"
        ];
        $dda[] = [
            "QuestionNo" => 10, 'color' => "#C0C0C0"
        ];
        $dda[] = [
            "QuestionNo" => 11, 'color' => "#C0C0C0"
        ];
        return response()->json(['msg' => 'Data Fatched', 'status' => true, 'data' => [
            'Attemped' => 10, 'Accuracy' => 15.3, 'Score' => 2.3, 'Percentile' => 3.5, 'Rank' => 594242, 'wrong' => 5, 'right' => 8, "question" =>
            $dda
        ]]);
    }

    public function getexam_Result(Request $request)
    {
        if (empty($request->userId)) {
            return response()->json(['msg' => 'Enter User', 'status' => false]);
        }
        $user_id =  User::select('id')->where("slugid", $request->userId)->first();
        if (!$user_id) {
            return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
        }
        if (empty($request->examinationId)) {
            return response()->json(['msg' => 'Enter Examination', 'status' => false]);
        }
        $examination_id =  Examination::select('id')->where("slugid", $request->examinationId)->first();

        if (!$examination_id) {
            return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
        }

        if (empty($request->testId)) {
            return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
        }
        $testId =  AttempedExam::select('id')->where("slugid", $request->testId)->first();

        if (!$testId) {
            return response()->json(['msg' => 'Invalid Test Id', 'status' => false]);
        }

        $data = AttempedExam::with(
            ['examination' => function ($q) use ($testId, $user_id) {

                $q->with(['examQ' => function ($q) use ($testId, $user_id) {

                    $q->with(['question.mockAttemp' => function ($q) use ($testId, $user_id) {
                        $q->where('attemped_exams_id', $testId->id)->where('users_id', $user_id->id)->orderBy('questions_id', 'DESC');
                    }]);
                }])->with(['attm' => function ($aa) {
                    $aa->where('mocktesttype', 'reattemp');
                }]);
            }]
        )
            ->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('examinations_id', $examination_id->id)

            ->get()



            ->map(function ($d) {

                if ($d['type'] == "resume") {
                    return "Test not Complete";
                } else if ($d['type'] == "result") {

                    return [
                        "testID" => $d->slugid,
                        "examId" => $d->examination->slugid,
                        "type" => $d->mocktesttype,
                        "time" => ($d->examination->time_duration * 60) - $d->remain_time,
                        "languages" => $d->examination->lang->map(function ($langg) {
                            return ["id" => $langg->language->id, "language" => $langg->language->languagename,];
                        }),
                        "wMarks" => $d->examination->wrongmarks,
                        "rMarks" => $d->examination->rightmarks,
                        'noQues' => $d->examination->noQues,
                        "reAttempId" => $d->examination->attm->slugid,

                        "questionslist" => $d->examination->examQ->map(function ($fff, $key) {

                            $res = "skip";
                            if ($fff->question->mockAttemp->QuesSeen == "true") {
                                if (empty($fff->question->mockAttemp->QuesSelect)) {
                                    $color = "#797980";
                                    $res = "visited";
                                } else if ($fff->question->rightans != $fff->question->mockAttemp->QuesSelect) {
                                    $color = "#FF0000";
                                    $res = "wrong";
                                } else if ($fff->question->rightans = $fff->question->mockAttemp->QuesSelect) {
                                    $color = "#008000";
                                    $res = "right";
                                }
                            } else {
                                $color = "#3e3a3a";
                                $res = "skip";
                            }


                            return collect([
                                "questionId" => $fff->question->id,
                                "color" => $color,
                                "final" => $res,
                                "asdasd" => $key + 1
                            ]);
                        }),

                    ];
                }
            })[0];


        $data['visted'] = count($data['questionslist']->where('final', 'visited'));
        $data['right'] = count($data['questionslist']->where('final', 'right'));
        $data['wrong'] = count($data['questionslist']->where('final', 'wrong'));
        $data['skip'] = count($data['questionslist']->where('final', 'skip'));


        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }
}
