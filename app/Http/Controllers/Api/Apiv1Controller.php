<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AttempedExam;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Study;
use App\Models\Exam;
use App\Models\Examination;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\StudymetrialCategory;
use App\Models\StudymetrialChapter;



use Illuminate\Support\Facades\Validator;

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

    public function category($exam_id)
    {
        $data = Category::where('exam_id', $exam_id)->get();
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }


    public function subcategory(Request $request)
    {
        $exam_id = $request->exam_id;
        $category_id = $request->category_id;



        if (empty($exam_id)) {
            return response()->json(['msg' => 'Enter Exam Id', 'status' => false]);
        }
        if (empty($category_id)) {
            return response()->json(['msg' => 'Enter Category Id', 'status' => false]);
        }

        $data = SubCategory::where('category_id', $category_id)->get();

        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
        //  echo $data;
    }


    public function get_StudyMetrial()
    {
        $data = StudymetrialCategory::all();
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }




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
        $exam_id = $request->exam_id;
        if (empty($exam_id)) {
            return response()->json(['msg' => 'Enter Exam Id', 'status' => false]);
        }
        $category_id = $request->category_id;
        if (empty($category_id)) {
            return response()->json(['msg' => 'Enter Category Id', 'status' => false]);
        }
        $subcategory_id = $request->subcategory_id;
        if (empty($subcategory_id)) {
            return response()->json(['msg' => 'Enter SubCategory Id', 'status' => false]);
        }
        $Attemp = array();
        $Attemp = AttempedExam::where('users_id', $user_id->id)->pluck('examinations_id')->toArray();
        $data = Examination::where('exam_id', $exam_id)->where('category_id', $category_id)->where('subcategory_id', $subcategory_id)->get();

        foreach ($data as $single) {
            if (in_array($single->id, $Attemp)) {
                $single['type'] = "Start";
            } else {
                $single['type'] = "Result";
            }
        }


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
        $Attemp->save();
        return response()->json(['msg' => 'Exam Created', 'status' => true, 'data' => $Attemp]);
    }



    // public function getExamination($category_id){
    //     $data['examination']=Examination::where('category_id',$category_id)->get();

    //     return response($data);

    //     // echo $data;
    // }

    // public function get_Detail($slugid){
    //     $data['user']=User::where('slugid',$slugid)->get();

    //     return response($data);
    // }




}
