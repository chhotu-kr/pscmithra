<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TestiMonials;
use App\Models\User;
class TestiMonialsController extends Controller
{
    //

    public function index(){

        $data['testmonials']=TestiMonials::all();
        $data['user']=User::all();

        return view('Testimonials.insertTestimonials',$data);
    }

    public function store(Request $request){
      
        $data= new TestiMonials();
        $data->user_id=$request->user_id;
        $data->message=$request->message;

        $data->save();

        return redirect()->route('insert.testimonials');

    }
    public function edit($id){
        $data['testmonials']=TestiMonials::find($id);
        $data['user']=User::all();
   
        return view('Testimonials.editTestimonials',$data);
    }

    public function update(Request $request,$id){
        $test_monials= $data=TestiMonials::find($id);
        $test_monials->user_id=$reuqest->user_id;
        $test_monials->message=$request->message;

        $test_monials->save();

        return redirect()->route('insert.testimonials');  
    }

    public function destroy($slug){
       $sub=TestiMonials::where('slugid',$slug)->first();
         if(!empty($sub)){
              $sub->delete();
               session()->flash('success', 'Service has been deleted !!!');
           }

         else{

               session()->flash('error', 'Please try again !!!');


            }
            return redirect()->route('insert.testimonials');  
    }
}
