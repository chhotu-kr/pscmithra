<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class ApiCourseController extends Controller
{
    //
    public function index(){
        return Course::all();
    }
}
