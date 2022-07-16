<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Exam;
use App\Models\Examination;
use App\Models\Category;
use App\Models\StudymetrialCategory;
use App\Models\StudymetrialChapter;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Validator;
class Apiv1Controller extends Controller
{
    public function index($contact){
        $user = User::where('contact',$contact)->first();
        if(!$user){
            return response()->json(['msg' => 'Account not exist','status'=>true]);
        }
        return response()->json(['msg' => 'Account allready exist','status'=>false]);
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

        if(empty($request->contact))
        {
            return response()->json(['msg' => 'Enter Mobile Number','status'=>false]);
        }
        if(empty($request->password))
        {
            return response()->json(['msg' => 'Enter Password','status'=>false]);
        }

        $user = User::where('contact',$request->contact)->first();
        if(!$user){
            return response()->json(['msg' => 'user not found.','status'=>false,]);
        }
        
        if (!Hash::check($request->password,$user->password)) {
            return response()->json(['msg' => 'Enter correct Password','status'=>false]);
        } else {
            //auth()->login($user);
            // $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            // return response()->json(['token' => $token], 200);

            return response()->json(['msg' => 'Data Fetched','status'=>true,'data'=>$user]);
        }

    }


    //category

    public function category($exam_id){
     $data['category']=Category::where('exam_id',$exam_id)->get();
    
     return response()->json(['msg'=>'Data Fetched','status'=>true,'data'=>$data]);
    }

    public function subcategory($category_id){
      
     $data=SubCategory::where('category_id',$category_id)->get();
   
     return response()->json(['msg'=>'Data Fetched','status'=>true,'data'=>$data]);
    //  echo $data;
    }

    public function get_StudyMetrial(){
        return StudymetrialCategory::all();
    }
    public function get_StudyChapter($studymetrialcategory_id){

       $data=StudymetrialChapter::where('studymetrialcategory_id',$studymetrialcategory_id)->get();
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
