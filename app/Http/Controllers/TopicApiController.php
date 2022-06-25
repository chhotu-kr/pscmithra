<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
class TopicApiController extends Controller
{
    //
    public function index(){
        return Topic::all();
    }
    
}
