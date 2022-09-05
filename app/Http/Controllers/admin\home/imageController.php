<?php

namespace App\Http\Controllers\admin\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\image;
class imageController extends Controller
{
    //

    public function index(){
          $data['img']=image::all();
        return view('admin/home/insertImage',$data);
    }

    public function store(Request $request){
       $data=  new image();
       $data->name=$request->name;
       $data->altname=$request->altname;
       $data->slugid=md5($request->address .time());

       // image work

       $filename = $request->image->getClientOriginalName();
       $request->image->move(('upload'),$filename);
       $data->image = $filename;
       $data->save();

       return redirect()->route('manage.image');
    }

    public function edit($id){
        $data['img']=image::find($id);

        return view('admin/home/editImage',$data);
    }

    public function update(Request $request,$id){
         $data=  image::find($id);
       $data->name=$request->name;
       $data->altname=$request->altname;
       $data->slugid=md5($request->address .time());

       // image work

       $filename = $request->image->getClientOriginalName();
       $request->image->move(('upload'),$filename);
       $data->image = $filename;
       $data->save();

       return redirect()->route('manage.image');

    }

    public function destroy($slug){
     $data=image::where('slugid',$slug)->first();

     if(!empty($data)){
        $data->delete();
        session()->flash('success', 'Service has been deleted !!!'); 
      }

       else{
        session()->flash('error', 'Please try again !!!');
       } 

       return redirect()->route('manage.image');

    }

    
}