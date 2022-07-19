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
    public function index(Request $request)
    {
        //
        // $data['id']= $id;
        // $data['examquestion']=SecondQuestion::with('question.secondquestion')->get();
    //   echo $request->segment(1);
        // $data['secondquestion']=SecondQuestion::all();
        // $data['value']=$request->segment(2);
        // $data['language']=Language::all();
        // $data['question']=Question::all();

        // return view('admin/manageQuestion',$data);
    }

    
    public function create($id)
    {
        //

        $data['secondquestion']=$id;
        $data['language']=Language::all();
        $data['question']=Question::all();

        return view('admin/insertSecondQuestion',$data);
       
    }

    
    public function store(Request $request)
    {
        //
        // return dd($request);
        $data= new SecondQuestion();
        $data->language_id=$request->language_id;
        $data->question_id=$request->question_id;
        $data->slugid=md5($request->question .time());
        $data->question=$request->question;
        $data->option1=$request->option1;
        $data->option2=$request->option2;
        $data->option3=$request->option3;
        $data->option4=$request->option4;
        
        // $data->slugid=md5($request->secondquestion . time());
        $data->save();

        return redirect()->route("manage.question",$request->question_id);

        // SecondQuestion::create([
        //     'language_id' => $request->language->languagename,
        //     'question' => $request->question,
        //     'option1' => $request->option1,
        //     'option2' => $request->option2,
        //     'option3' => $request->option3,
        //     'option3' => $request->option4,
        //   ]);

        //   $questionId = SecondQuestion::select('question_id')->where('question_id', $request->eID)->get()->toArray();
       

        //            $data=SecondQuestion::where->('',)whereNotIn('id',$questionId)->get();
          
        //    return dd($data);
          
        //   return response()->json(['success'=>'Form is successfully submitted!']);
    }

    
    public function show(SecondQuestion $secondQuestion)
    {
        //
    }

    
    public function edit(SecondQuestion $secondQuestion,$id)
    {
        //
        $data['secondquestion']=$id;
        $data['language']=Language::all();
        $data['question']=Question::all();
        $data['secondquestion']=SecondQuestion::find($id);

        return view('admin.editSecondQuestion',$data);

    }

    
    public function update(Request $request, SecondQuestion $secondQuestion)
    {
        //
        $secondQuestion->language_id=$request->language_id;
        $secondQuestion->question_id=$request->question_id;
        $secondQuestion->slugid=md5($request->question .time());
        $secondQuestion->question=$request->question;
        $secondQuestion->option1=$request->option1;
        $secondQuestion->option2=$request->option2;
        $secondQuestion->option3=$request->option3;
        $secondQuestion->option4=$request->option4;
    
        // $secondQuestion->slugid=$request->slugid;
        $secondQuestion->save();

        return redirect()->route("manage.question",$request->question_id);
    }

    
    public function delete(SecondQuestion $secondQuestion,$slug)
    {
        //
        $sub=SecondQuestion::where('slugid', $slug)->first();

        
        
        if (!empty($sub)) {
            $sub->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
        return redirect()->back();
    }
}
