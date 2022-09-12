<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extra;
class ExtraController extends Controller
{
    //

    public function index(){
          $data['extra']=Extra::all();
        return view('Extra.insertExtra',$data);
    }

    public function store(Request $request){

        $data= new Extra();
        $data->name=$request->name;
        $data->type=$request->type;
        $data->slugid=md5($request->name .time());

        $data->save();

        return redirect()->route('insert.extra');

        
    }

    public function edit($id){

        $data['extra']=Extra::find($id);

        return view('Extra.editextra',$data);
    }

    public function update(Request $request,$id){
        $data= Extra::find($id);
        $data->name=$request->name;
        $data->type=$request->type;
        $data->slugid=md5($request->name .time());

        $data->save();

        return redirect()->route('insert.extra');

    }

    public function destroy($slug){

        $data=Extra::where('slugid',$slug)->first();

        if(!empty($data)){

            $data->delete();
            session()->flash('success', 'Service has been deleted !!!'); 
           
        }

        else{

            session()->flash('error', 'Please try again !!!');

        }

        return redirect()->route('insert.extra');
    }
}
