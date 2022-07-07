<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class ExamSubCatController extends Controller
{
    public function subcat(){

        $data['subcategory']=SubCategory::all();
        
        $data['category']=Category::all();

        return view("user/examsubcategory",$data);
    }
}
