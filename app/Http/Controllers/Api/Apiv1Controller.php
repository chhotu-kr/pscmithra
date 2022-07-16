<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Exam;
use App\Models\Examination;
use App\Models\category;
use App\Models\StudymetrialCategory;
use App\Models\StudymetrialChapter;
use App\Models\subcategory;
use Illuminate\Support\Facades\Validator;
class Apiv1Controller extends Controller
{
    public function index(){
        return User::all();
    }

    //user signup api

    public function api_signup(Request $request){
       
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'contact' => 'required',
                'password' => 'required|min:8'
            ]);
    
            if($validator->fails()){
                return response(['error' => $validator->errors()]);
            }
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'password' => Hash::make($request->password)
            ]);
    
            // $accessToken = $user->createToken('authToken')->accessToken;
    
            // return response([ 'user' => $user, 'access_token' => $accessToken]);
       return "inserted successfull";
      
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

        $user = User::where('contact',$request->contact)->first();
        if(!$user){
            return response()->json(['error' => 'user not found.'], 401);
        }
        
        if (!Hash::check($request->password,$user->password)) {
            return response()->json(['error' => 'please enter right password'], 401);
        } else {
            auth()->login($user);
            // $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            // return response()->json(['token' => $token], 200);

            return response()->json(['login' => 'User logIn']);
        }

    }


    //category

    public function category($exam_id){
     $data['category']=Category::where('exam_id',$exam_id)->get();
     $data['exam']=Exam::all();
     return response($data);
    }

    public function subcategory($category_id){
      
     $data['subcategory']=SubCategory::where('category_id',$category_id)->get();
   
     return response($data);
    //  echo $data;
    }

    public function get_StudyMetrial(){
        return StudymetrialCategory::all();
    }
    public function get_StudyChapter($studymetrialcategory_id){
       $data['studymetrialchapter']=StudymetrialChapter::where('studymetrialcategory_id',$studymetrialcategory_id)->get();
        return response()->json(['msg'=>'Data Fetched','status'=>true,'data'=>$data]);
    }

    // public function get_Examination($exam_id,$category_id,$subcategory_id){
    //     $data['examination']=Examination::where(['exam_id',$exam_id],['category_id',$category_id],['subcategory_id',$subcategory_id])->get();

    //     return response($data);

    //     // echo $data;
    // }
    public function get_Examination(Request $request){

        
        $exam_id=$request->exam_id;
        if(empty($exam_id)){
            return response()->json(['msg'=>'Enter Exam Id','status'=>false]);
        }
        $category_id=$request->category_id;
        if(empty($category_id)){
            return response()->json(['msg'=>'Enter Category Id','status'=>false]);
        }
        $subcategory_id=$request->subcategory_id;
        if(empty($subcategory_id)){
            return response()->json(['msg'=>'Enter SubCategory Id','status'=>false]);
        }

        $data=Examination::where('exam_id',$exam_id)->
        where('category_id',$category_id)->
        where('subcategory_id',$subcategory_id)->get();

        return response()->json(['msg'=>'Data Fetched','status'=>true,'data'=>$data]);
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
