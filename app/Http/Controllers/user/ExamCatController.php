<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Examination;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ExamCatController extends Controller
{
    public function exam(){

        $data['examination']=Examination::all();
        $data['category']=Category::all();
        return view("user/examcat",$data);
    }

    public function filter($subcategory_id){
    
        $data['subcategory']=SubCategory::all();
        $data['category']=Category::all();
        $data['examination']=Examination::where('subcategory_id',$subcategory_id)->get();
        return view('user/examcat',$data);
    }
    public function subcat($cat_id){
        $data['subcategory']= SubCategory::where('category_id',$cat_id)->get();
        return $data;
    }
}
