<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Topic;

class SubController extends Controller
{

    public function sub(){

        $data['subject'] = Subject::all();

        return view('user.subject',$data);
    }
    
    public function subtopic($sub_id){
        
        $data['topic']= Topic::where('subject_id',$sub_id)->get();
        return $data;
    }
}
