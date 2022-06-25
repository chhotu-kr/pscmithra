<?php

namespace App\Http\Controllers;

use App\Models\Exam;
class ApiExamController extends Controller
{
    //
    public function index(){
        return Exam::all();
    }
}
