<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\SecondQuestion;
use App\Models\Topic;
use App\Models\Subject;
use App\Models\Language;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class QuestionController extends Controller
{
   
    


    public function index($question_id)
    {
       $data['secondquestion']= SecondQuestion::where('question_id',$question_id)->get();
        $data['question_id']= $question_id;
       $data['language']= Language::all();
        $data['topic']= Topic::all();
        $data['subject']= Subject::all();
        
        return view('admin/manageQuestion',$data);
    }
      /*
    public function filter(Request $request,$cat_id){
        $id=Subject::find($cat_id);
        $data['topic']=Topic::where('subject_id',$id)->get();
        return view('admin/manageQuestion',$data);
    }


    */

    public function create()
    {
        //
         
        $data['question']= Question::all();
        $data['secondquestion']= SecondQuestion::all();
        $data['language']= Language::all();
        
        $data['topic']= Topic::all();
        $data['subject']= Subject::all();
        

       return view('admin/insertQuestion',$data);
    }

    
    public function store(Request $request)
    {
        //

// foreach($request->data as $ss){
//     echo json_encode($ss['lang']);
// }

        $data= new Question();
        $data->subject_id=$request->subject_id;
        $data->topic_id=$request->topic_id;
        $data->name=$request->name;
        
        $data->rightans=$request->rightans;
        $data-> slugid = md5('asdad' . time().'asd');
        $data->isverified=$request->isVerified;
        $data->save();

        // return dd($data);
        
        foreach($request->data as $ss){
            $que= new SecondQuestion();
            $que->language_id=$ss['lang'];
            $que->question_id=$data->id;
            $que->question=$ss['question'];
            $que->direction =$ss['dir'];
            $que->explanation=$ss['exp'];
            $que->option1=$ss['opt1'];
            $que->option2=$ss['opt2'];
            $que->option3=$ss['opt3'];
            $que->option4=$ss['opt4'];
            $que->slugid=md5('asde'.$ss['lang'].'asdasd'. time());
            $que->save();
        }
        
        
          return redirect()->back();
    }
   

   
    public function show(Question $question)
    {
        //

        $data['question']= Question::all();
    
       return view('admin/manageQuiz',$data);

    }

    
    public function edit(Question $question,$id)
    {
        //
        $data['subject']=Subject::all();
        $data['topic']=Topic::all();
        $data['question']=Question::find($id);
        return view('admin.editQuestion',$data);
    }

    
    public function update(Request $request, Question $question,$id)
    {
        //
         $question=Question::find($id);
        $question->subject_id=$request->subject_id;
        $question->topic_id=$request->topic_id;
        $question->name=$request->name;
        $question->rightans=$request->rightans;
        $question-> slugid = md5($request->question . time());
        $question->isverified=$request->isVerified;
        $question->save();
        return redirect()->route('manage.quiz');
    }

    
    public function destroy(Question $question,$slug)
    {
        //
        $sub = Question::where('slugid', $slug)->first();
        if (!empty($sub)) {
            $sub->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
        return redirect('/manageQuiz');
    }
}
