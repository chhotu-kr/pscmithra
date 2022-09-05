<?php

namespace App\Http\Controllers\admin\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\page;
class pageController extends Controller
{
    //

    public function index(){
        $data['page']=page::all();
      return view('admin/home/insertPage',$data);
  }

  public function store(Request $request){
     $data=  new page();
     $data->name=$request->name;
     $data->altname=$request->altname;
     $data->slugid=md5($request->address .time());

     // image work

     $filename = $request->image->getClientOriginalName();
     $request->image->move(('upload'),$filename);
     $data->image = $filename;
     $data->save();

     return redirect()->route('manage.page');
  }

  public function edit($id){
      $data['page']=page::find($id);

      return view('admin/home/editPage',$data);
  }

  public function update(Request $request,$id){
       $data=  page::find($id);
     $data->name=$request->name;
     $data->altname=$request->altname;
     $data->slugid=md5($request->address .time());

     // image work

     $filename = $request->image->getClientOriginalName();
     $request->image->move(('upload'),$filename);
     $data->image = $filename;
     $data->save();

     return redirect()->route('manage.page');

  }

  public function destroy($slug){
   $data=page::where('slugid',$slug)->first();

   if(!empty($data)){
      $data->delete();
      session()->flash('success', 'Service has been deleted !!!'); 
    }

     else{
      session()->flash('error', 'Please try again !!!');
     } 

     return redirect()->route('manage.page');

  }

}