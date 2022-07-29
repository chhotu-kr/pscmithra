<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BackgroundImage;
use Illuminate\Http\Request;

class BackgroundImageController extends Controller
{
    //
    public function index()
    {
        //
        $data['bi']=BackgroundImage::all();
       
       return view('Background.insertBackimage',$data);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
        $data = new BackgroundImage();
        $data->slugid=md5($request->backgroundimage .time());
       
        $data->pagename=$request->pagename;
        //image
        $filename = $request->image->getClientOriginalName();
        $request->image->move(('images'),$filename);
        $data->image = $filename;
        $data->save();
        return redirect()->route('manage.image');
    }

    
    public function show()
    {
        //
    }

    
    public function edit($id)
    {
        //
      
        $data['bi']=BackgroundImage::find($id);

        return view('Background.editBackimage',$data);
    }

    
    public function update(Request $request,$id)
    {
        //
        $bi=BackgroundImage::find($id);
        $bi->slugid=md5($request->backgroundimage .time());
       
        $bi->pagename=$request->pagename;
         //image
         $filename = $request->image->getClientOriginalName();
         $request->image->move(('images'),$filename);
         $bi->image = $filename;
        $bi->save();
        return redirect()->route('manage.image');
        
    }

    
    public function destroy($slug)
    {
        //
        $item = BackgroundImage::where('slugid',$slug)->first();
        
        if(!empty($item)){
            $item->delete();
            session()->flash('success', 'Service has been deleted !!!'); 
        }

        else{
            session()->flash('error', 'Please try again !!!');
        } 

        return redirect()->route('manage.image');
       
    }
}
