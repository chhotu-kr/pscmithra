<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
class ApiSubCategoryController extends Controller
{
    //
    public function index(){
        return SubCategory::all();
    }
}
