<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
class ExamCategoryController extends Controller
{
    // public function getMocktest(){
    //     $data=Category::with('subcat')->where('exam_id',1)->get();
    //    // return dd($data);
    //     return view('user.category',compact('data'));
    // }
    // public function getQuiztest(){
    //     $data=Category::where('exam_id',2)->get();
    //     return view('user.category',compact('data'));
    // }
    // public function getLivetest(){
    //     $data=Category::where('exam_id',3)->get();
    //     return view('user.category',compact('data'));
    // }

    // // ...........SubCategory Function............

    // public function getCat_Mocktest(){
    //     $data=SubCategory::where('category_id',1)->get();
    //     return view('user.category',compact('data'));
    // }
    // public function getCat_Quiztest(){
    //     $data=SubCategory::where('category_id',2)->get();
    //     return view('user.category',compact('data'));
    // }
    // public function getCat_Livetest(){
    //     $data=SubCategory::where('category_id',3)->get();
    //     return view('user.category',compact('data'));
    // }
}
