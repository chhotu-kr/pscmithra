<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
class QuestionApiController extends Controller
{
    //
    public function index(){
        return Question::all();
    }
}
