<?php

namespace App\Http\Controllers;

use App\Models\SecondQuestion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Question;
class SecondQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['secondquestion']=SecondQuestion::all();
        $data['language']=Language::all();
        $data['question']=Question::all();

        return view('admin/insertSecondQuestion',$data);
    }

    
    public function create()
    {
        //
       
    }

    
    public function store(Request $request)
    {
        //
        return dd($request);
        // $data= new SecondQuestion();
        // $data->language_id=$request->language_id;
        // $data->question_id=$request->question_id;
        // $data->question=$request->question;
        // $data->option1=$request->option1;
        // $data->option2=$request->option2;
        // $data->option3=$request->option3;
        // $data->option4=$request->option4;
        
        // $data->slugid=md5($request->secondquestion . time());
        // $data->save();

        //return redirect('/secondquestion');
    }

    
    public function show(SecondQuestion $secondQuestion)
    {
        //
    }

    
    public function edit(SecondQuestion $secondQuestion,$id)
    {
        //
        $data['language']=Language::all();
        $data['question']=Question::all();
        $data['secondquestion']=SecondQuestion::find($id);

        return view('admin.editSecondQuestion',$data);

    }

    
    public function update(Request $request, SecondQuestion $secondQuestion)
    {
        //
        $secondQuestion->question_id=$request->question_id;
        $secondQuestion->question=$request->question;
        $secondQuestion->option1=$request->option1;
        $secondQuestion->option2=$request->option2;
        $secondQuestion->option3=$request->option3;
        $secondQuestion->option4=$request->option4;
    
        $secondQuestion->slugid=$request->slugid;
        $secondQuestion->save();

        return redirect('/secondquestion');
    }

    
    public function destroy(SecondQuestion $secondQuestion,$slug)
    {
        //
        $sub=SecondQuestion::where('slugid', $slug)->first();

        
        
        if (!empty($sub)) {
            $sub->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
        return redirect('/secondquestion');
    }
}
