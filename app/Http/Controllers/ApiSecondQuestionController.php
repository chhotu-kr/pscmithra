<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SecondQuestion;
class ApiSecondQuestionController extends Controller
{
    //
    public function index(){
        return SecondQuestion::all();
    }
}
