<?php

namespace App\Http\Controllers;

//use App\Models\Exam;
use App\Models\Topic;
use App\Models\Subject;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    //

    public function show($subject_id){

        $data['topic']= Topic::where("subject_id",$subject_id)->get();
        $data['subject']= Subject::all();

        return view('admin.manageTopic',$data);
    }

   public function insert(Request $request){
    // $data['topic']= Topic::where("sub_name","0")->get();
        $data= new Topic();
        $data->topic_name= $request->topic_name;
        $data->subject_id= $request->subject_id;
        $data->save();
        return redirect()->back();
    }
    public function edit( topic $topic,$id){
        $data['subject']= Subject::all();
        $data['topic']= Topic::find($id);
        return view('admin/editTopic',$data);
      }
  
      public function update(Request $re, topic $topic, $id ){
        $topic = Topic::find($id);
        $topic->topic_name=$re->topic_name;
        $topic->subject_id=$re->subject_id;
      
        
        $topic->save();
        return redirect('/admin/manage');
      }

    public function destroy($id){
        $req = Topic::find($id);
        $req->delete();
        return redirect('/admin/manage');
    }
}
