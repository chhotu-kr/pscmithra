<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subject;
use App\Models\Topic;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        //
        $data['product']=Product::all();
        $data['subject']=Subject::all();
        $data['topic']=Topic::all();
        
        return view('admin.ecommerce.manageProduct',$data);
    }

    
    public function create()
    {
        //
        $data['product']=Product::all();
        $data['subject']=Subject::all();
        $data['topic']=Topic::all();
        return view('admin.ecommerce.insertProduct',$data);
    }

    
    public function store(Request $request)
    {
        //
        $data = new Product();
        $data->subject_id=$request->subject_id;
        $data->topic_id=$request->topic_id;
        $data->slugid=md5($request->product .time());
        $data->title=$request->title;
        $data->description=$request->description;
        $data->type=$request->type;
        $data->price=$request->price;
          //image work
          $filename = $request->bannerimage->getClientOriginalName();
          $request->bannerimage->move(('images'),$filename);
          $data->bannerimage = $filename;
        
        
        $data->bycount=$request->bycount;
        $data->save();
        return redirect()->route('product.index');
    }

    
    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
        $data['product']=$product;
        $data['subject']=Subject::all();
        $data['topic']=Topic::all();
        return view('admin.ecommerce.editProduct',$data);
    }

    
    public function update(Request $request, Product $product)
    {
        //
      
        $product->slugid=md5($request->product .time());
        $product->title=$request->title;
        $product->description=$request->description;
        $product->pdf=$request->pdf;
        $product->price=$request->price;
        //image work
        $filename = $request->bannerimage->getClientOriginalName();
        $request->bannerimage->move(('images'),$filename);
        $product->bannerimage = $filename;
      
        $product->bycount=$request->bycount;
        $product->save();
        return redirect()->route('product.index');
    }

    
    public function destroy(Product $product)
    {
        //
        // $item= Product::where('slugid')->first();
        
        // if (!empty($item)) {
        //     $item->delete();
        //     session()->flash('success', 'Service has been deleted !!!');
        // } else {
        //     session()->flash('error', 'Please try again !!!');
        // }
        $product->delete();
        return redirect()->route('product.index');

        
    }
}
