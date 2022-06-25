<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
class ApiSubjectController extends Controller
{
    //
    public function index(){
        return Subject::all();
    }
}
