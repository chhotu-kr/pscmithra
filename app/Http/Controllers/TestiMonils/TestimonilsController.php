<?php

namespace App\Http\Controllers\TestiMonils;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TestiMonials;
use App\Models\User;
class TestimonilsController extends Controller
{
    //

    public function index(){
        $test_monials['testimonials']=TestiMonials::where('isVisble',1)->get();
        $test_monials['user']=User::all();
        return view('TestiMonials.insertTestmonials',$test_monials);
    }

    public function store(Request $request){
      $test_monials= new TestiMonials();
      $test_monials->user_id=$request->user_id;
      $test_monials->message=$request->message;
      $test_monials->save();

      return redirect()->route('manage.Testmonials');

    }

    public function edit($id){
        $test_monials['testimonials']=TestiMonials::find($id);
        $test_monials['user']=User::all();
        return view('TestiMonials.editTestmonials',$test_monials);
    }

    public function update(Request $request,$id){
      $test_monials= TestiMonials::find($id);
        $test_monials->user_id=$request->user_id;
        $test_monials->message=$request->message;
        $test_monials->save();
  
        return redirect()->route('manage.Testmonials');
    }

    public function destroy($id){
     $test_monials=TestiMonials::find($id);
     $test_monials->isVisble=0;
     $test_monials->save();

     return redirect()->route('manage.Testmonials');
    }
}
