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
use App\Models\QuizCategory;
use App\Models\QuizChapter;
use App\Models\QuizExamination;
use App\Models\QuizSubCategory;
use App\Models\QuizTopic;
use App\Models\SecondQuestion;
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
                $q->where('users_id', $user_id->id);
            }])
            // ->leftjoin('attemped_exams', function ($join) use ($user_id) {

            //     $join->on('examinations.id', '=', 'attemped_exams.examinations_id')->where('attemped_exams.users_id', $user_id->id);
            // })
            // //  ->select('examinations.*' , 'attemped_exams.*', DB::raw('(CASE WHEN attemped_exams.type = "result"  THEN 0 ELSE (CASE WHEN attemped_exams.remain_time != 0  THEN attemped_exams.remain_time ELSE examinations.time_duration  END)END) AS ddr'))            
            // ->select('examinations.*', DB::raw('(CASE WHEN attemped_exams.type = "resume" THEN "Resume" 
            //  WHEN attemped_exams.type IS NULL or attemped_exams.type = "" THEN "Start" ELSE "Result" END) AS is_user'))

            ->get()->map(function ($item) {
                //    return $item;

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

    //     $sm_id = $request->sm_id;
    //     if (empty($sm_id)) {
    //         if ($sm_id != 0) {
    //             return response()->json(['msg' => 'Enter SmChapter Id', 'status' => $request->sm_id]);
    //         }
    //     }
    //     if ($sm_id == 0) {
    //         $data = Study::select('name', 'id', 'content')->where('sm_categories_id', $sm_categories_id)->where('sm_chapters_id', $sm_chapters_id)->get();
    //         return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    //     } else {
    //         $data = Study::select('name', 'id', 'content')->where('sm_categories_id', $sm_categories_id)->where('sm_chapters_id', $sm_chapters_id)->where('id', $sm_id)->get();
    //         return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    //     }
    // }
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
        $examination_id =  Examination::select('id')->where("slugid", $request->examination)->first();

        if (!$examination_id) {
            return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
        }
        $get = AttempedExam::where('examinations_id', $examination_id->id)->where('users_id', $user_id->id)->first();
        if (empty($get)) {
            $Attemp = new AttempedExam();
            $Attemp->slugid = md5($request->user . time());
            $Attemp->examinations_id = $examination_id->id;
            $Attemp->users_id = $user_id->id;
            $Attemp->language_id = $request->language;
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
            return response()->json(['msg' => 'Exam already exist', 'status' => false]);
        }
        //   mockattempquestion::insert($insertData);


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

    public function get_Quiz(Request $request)
    {
        // if (empty($request->user)) {
        //     return response()->json(['msg' => 'Enter User', 'status' => false]);
        // }
        // $user_id =  User::select('id')->where("slugid", $request->user)->first();
        // if (!$user_id) {
        //     return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
        // }
        $category_id = $request->category_id;
        if (empty($category_id)) {
            return response()->json(['msg' => 'Enter Category Id', 'status' => false]);
        }



        $data = QuizExamination::where('quiz_categories_id', $category_id)
            ->where('quiz_sub_categories_id', $request->subcategory_id)->where('quiz_chapters_id', $request->quizChapter)
            ->where('quiz_topics_id', $request->topic_id)
            // ->leftjoin('attemped_exams', function ($join) {
            //     $join->on('examinations.id', '=', 'attemped_exams.examinations_id')->where('attemped_exams.users_id', 1);
            // })
            //->select('examinations.*', DB::raw('(CASE WHEN attemped_exams.remain_time = 0 and attemped_exams.type = "result"   THEN 0 ELSE examinations.time_duration  END) AS ddr'))            
            ->get();
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


        $data = AttempedExam::with(['examination.examQ.question.mockAttemp' => function ($q) use ($testId, $user_id) {
            $q->where('attemped_exams_id', $testId->id)->where('users_id', $user_id->id);
        }])->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('examinations_id', $examination_id->id)
            ->get()
            ->map(function ($d) use ($htm1, $html1, $html2, $html3, $html4, $html5) {

                if ($d['type'] != "resume") {
                    return "Test not resume";
                } else if ($d['type'] = "resume") {

                    $examremaintime = 0;
                    if ($d->type == 'resume' && $d->remain_time == 0) {
                        $examremaintime = $d->examination->time_duration;
                    } else if ($d->type == 'resume' && $d->remain_time != 0) {
                        $examremaintime = $d->remain_time;
                    }

                    return collect([
                        "testID" => $d->slugid,
                        "languageId" => $d->language->id,
                        "languageName" => $d->language->languagename,
                        "examId" => $d->examination->slugid,
                        "time" => $examremaintime,
                        "wMarks" => $d->examination->wrongmarks,
                        "rMarks" => $d->examination->rightmarks,
                        'noQues' => $d->examination->noQues,
                        "questionslist" => $d->examination->examQ->map(function ($fff) use ($htm1, $html1, $html2, $html3, $html4, $html5) {
                            return collect([
                                "questionId" => $fff->question->id,
                                "attempID" => $fff->question->mockAttemp->id,
                                "s" => $fff->question->mockAttemp->QuesSeen,
                                "optSel" => $fff->question->mockAttemp->QuesSelect,
                                "time" => $fff->question->mockAttemp->time,
                                "question" => $fff->question->secondquestion

                                    ->map(function ($ques) use ($htm1, $html1, $html2, $html3, $html4, $html5) {
                                        return collect([
                                            "id" => $ques->language->id,
                                            "language" => $ques->language->languagename,
                                            "QuestioninHtml" => $htm1 . $ques->question . $html1 . $ques->option1  . $html2 . $ques->option2 . $html3 . $ques->option3 . $html4 . $ques->option4 . $html5
                                        ]);
                                    })

                            ]);
                        })
                    ]);
                }
            });
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }


    public function submitExam(Request $request)
    {

        if (empty($request->userId)) {
            return response()->json(['msg' => 'Enter User', 'status' => false]);
        }
        $user_id =  User::select('id')->where("slugid", $request->userId)->first();
        if (!$user_id) {
            return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
        }

        if (empty($request->examId)) {
            return response()->json(['msg' => 'Enter Examination', 'status' => false]);
        }
        $examination_id =  Examination::select('id')->where("slugid", $request->examId)->first();

        if (!$examination_id) {
            return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
        }

        if (empty($request->testId)) {
            return response()->json(['msg' => 'Enter Examination', 'status' => false]);
        }
        $testId =  AttempedExam::select('id')->where("slugid", $request->testId)->first();

        if (!$testId) {
            return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
        }

        // $attemp = AttempedExam::where("slugid", $request->testId)->where("examinations_id", $examination_id->id)
        //     ->where("users_id", $user_id->id)
        //     ->
        //     //get();
        //     update([
        //         "remain_time" => 407,
        //         "type" => $request->type
        //         ]
        //     );

//             foreach($request->array as $index => $value){
                
// $dd = mockattempquestion::where('id',$value['attempID'])->where('attemped_exams_id',$testId->id)->
// update([
//             "QuesSeen" => "true",
//             "QuesSelect" => $value['optSel'],
//             "time"=>$value['time']
//             ]
//         );

        // SELECT * FROM `questions`as u LEFT JOIN mockattempquestions as d  ON u.id = d.questions_id WHERE users_Id = 1 AND  attemped_exams_id = 5;

               // echo json_encode($value);
                
          //  }

//        return response()->json($dd);
    
}

   
}