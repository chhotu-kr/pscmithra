<?php

namespace App\Http\Controllers;

use App\Models\Screenshot;
use App\Models\Product;
use Illuminate\Http\Request;

class ScreenshotController extends Controller
{
    public function index()
    {
        //
        $data['product']=Product::all();
        $data['screenshot']=Screenshot::all();
        return view('ecommerce.insertScreenshot',$data);
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
        $data = new Screenshot();
        $data->product_id=$request->product_id;
        $data->slugid=md5($request->screenshot .time());
        $data->scr_url=$request->scr_url;
        $data->save();
        return redirect()->route('screenshot.index');
    }

    
    public function show(Screenshot $screenshot)
    {
        //
    }

    
    public function edit(Screenshot $screenshot)
    {
        
        $data['product']=Product::all();
        $data['screenshot']=$screenshot;

        return view('ecommerce.editScreenshot',$data);
    }

    
    public function update(Request $request, Screenshot $screenshot)
    {
        //
        
        $screenshot->product_id=$request->product_id;
        $screenshot->slugid=md5($request->screenshot .time());
        $screenshot->scr_url=$request->scr_url;
        $screenshot->save();
        return redirect()->route('screenshot.index');
    }

    
    public function destroy(Screenshot $screenshot)
    {
        
        $screenshot->delete();
        return redirect()->route('screenshot.index');
    }
}
