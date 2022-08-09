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
            ->with('category', 'subcategory','lang.language')->with(['attm' => function ($q) use ($user_id) {
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
               

                if (empty($item->attm)) {
                    
                    if ($free) {
                        $type = "Start";
                    } else {

                    }

                } else {
                    $type = $item->attm->type;
                }
                return collect([
                    "id" => $item->slugid,
                    "categoryId" => $item->category->id,
                    "categoryName" => $item->category->category,
                    "subbCategoryId" => $item->subcategory->id,
                    "subCategoryName" => $item->subcategory->subcategory,
                    "totalTimeinMints" => $item->time_duration,
                    "totalQues" => $item->noQues,
                    "type" => $type,
                    "totalTimeinMints" => $item->time_duration,
                    "languages"=>$item->lang->map(function($lang){
                        return collect([
"name"=>$lang->language->languagename,
"id"=>$lang->language->id
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

        $Attemp = new AttempedExam();
        $Attemp->slugid = md5($request->user . time());
        $Attemp->examinations_id = $examination_id->id;
        $Attemp->users_id = $user_id->id;
        $Attemp->language_id = $request->language;
        $Attemp->save();

        $examQuestion =  ExamQuestion::where('examination_id', $examination_id->id)->pluck('question_id');
        $insertData = [];
        foreach ($examQuestion as $value) {
            $insertData[]  = [
                'users_id' =>  $user_id->id,
                'questions_id' => $value
            ];
        }
        mockattempquestion::insert($insertData);

        return response()->json(['msg' => 'Exam Created', 'status' => true, 'data' => $Attemp]);
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


    public function getExamData()
    {

        //  $data = Examination::with(['secondquestion','secondquestion.language'])->get();
        //     //$data = ExamQuestion::with(['secondquestion','secondquestion.language'])->get();
        //     $data = ExamQuestion::where('examination_id',1)->leftjoin('second_questions as s','exam_questions.examination_id','s.question_id')
        //     ->join('languages as o','s.language_id','o.id')
        //     ->select('*',DB::raw('(concat(s.question," sdasdadad ",s.option1)) as '.['asd asda']))

        // //$data = SecondQuestion::where('question_id',2) ->join('languages as o','language_id','o.id') ->select('o.languagename',DB::raw('(concat(question," sdasdadad ",option1)) as question'))
        // ->get();


        // foreach($data as $t){

        //     $data [$t['languagename'].'Html']=$t['question'];
        // }

        $data = AttempedExam::with('examination.examQ.question.secondquestion.language','language')->with(['examination.examQ.question.mockAttemp' => function ($q) {
            $q->where('users_id', 1);
        }])->where('examinations_id', 1)->where('users_id', 1)->
            // with(['examQ' => function ($query) {
            //     $query->with(['secondquestion' => function ($quu) {
            //         $quu->leftjoin('languages', 'languages.id', 'language_id');
            //     }]);
            // }], 'assa')

            // ->with(['attm' => function ($query) {
            //     $query->select('*', DB::raw('(CASE WHEN type = "resume" THEN "Resume" ELSE "Result" END) AS is_user'))
            //     ->where('users_id', 2);

            // }])
            // ->get()

            // ->leftjoin('attemped_exams', function ($join) {
            //     $join->on('examinations.id', '=', 'attemped_exams.examinations_id')->where('attemped_exams.users_id', 2);
            // })
            // ->select('examinations.*' , 'attemped_exams.*', DB::raw('(CASE WHEN attemped_exams.type = "result" THEN 0 ELSE END) AS ddr'))            
            //  
            get()
            ->map(function ($d) {

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
                        "languageId"=>$d->language->id,
                        "languageName"=>$d->language->languagename,

                        "examId" => $d->examination->id,
                        "time" => $examremaintime,
                        "wMarks" => $d->examination->wrongmarks,
                        "rMarks" => $d->examination->rightmarks,
                        'noQues' => $d->examination->noQues,
                        "questionslist" => $d->examination->examQ->map(function ($fff) {
                            return collect([
                                "questionId" => $fff->question->id,
                                "ques" => $fff->secondquestion->map(function ($ques) {
                                    return $ques->language->languagename;
                                }),
                                "question" => $fff->secondquestion

                                    ->map(function ($ques) {
                                        return collect([
                                            "language" => $ques->language->languagename,
                                            "QuestioninHtml" => $ques->direction . $ques->question . $ques->option1 . $ques->option2 . $ques->option3 . $ques->option4
                                        ]);
                                    })

                            ]);
                        })
                    ]);
                }
            });


        // $data = SecondQuestion::leftJoin('languages','languages.id','language_id')->get()

        // $data = $data->map(function ($user, $key) {
        //     $examremaintime = 0;
        //     if ($user->attm->type == 'resume' && $user->attm->remain_time == 0) {
        //         $examremaintime = $user->time_duration;
        //     } else if ($user->attm->type == 'resume' && $user->attm->remain_time != 0) {
        //         $examremaintime = $user->attm->remain_time;
        //     }




        //     return collect([
        //         "rightmarks" => $user->rightmarks,
        //         "wmarks" => $user->wrongmarks,
        //         "time" => $examremaintime,
        //         "examID"=>$user->slugid
        //     ]);
        // });



        //     return $user->examQ->map(function($key){
        //         return $key['secondquestion']->map(function($keya){
        // $ff =   $keya->languagename .' asda';
        //     return collect([
        //      $ff  => $keya->languagename
        //     ]);         
        //         });

        //     });
        // return collect([
        //     'id' => $user->id
        // ]); 

        // "id": 1,
        //             "language_id": 1,
        //             "question_id": 2,
        //             "question": "<p>safsdfsdf</p>",
        //             "option1": "<p>sdfsdfsdfsdfsdf</p>",
        //             "option2": "<p>sdfsdfsdfs</p>",
        //             "option3": "<p>sdfsdfsdfsdf</p>",
        //             "option4": "<p>dsfsdfsdfsdfsdf</p>",
        //             "slugid": "nihil",
        //             "created_at": "2022-07-29T10:47:05.000000Z",
        //             "updated_at": "2022-07-29T10:47:05.000000Z",
        //             "": "et"

        // });

        return response()->json($data);
    }
}
