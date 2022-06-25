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
        return view('admin.ecommerce.insertScreenshot',$data);
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
        return redirect('/screenshot');
    }

    
    public function show(Screenshot $screenshot)
    {
        //
    }

    
    public function edit(Screenshot $screenshot)
    {
        //
        // $data['product']=Product::all();
        // $data['screenshot']=Screenshot::find('$id');

        // return view('admin.ecommerce.editScreenshot');
    }

    
    public function update(Request $request, Screenshot $screenshot)
    {
        //
        
        // $screenshot->product_id=$request->product_id;
        // $screenshot->slugid=md5($request->screenshot .time());
        // $screenshot->url=$request->url;
        // $screenshot->save();
        // return redirect('/screenshot');
    }

    
    public function destroy(Screenshot $screenshot,$slug)
    {
        //
        $item= Screenshot::where('slugid', $slug)->first();
        
        if (!empty($item)) {
            $item->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
        return redirect('/');
    }
}
