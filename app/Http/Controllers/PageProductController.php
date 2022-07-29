<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageProduct;
use App\Models\Product;
class PageProductController extends Controller
{
    //

    public function index()
    {
        //
        $data['page']= PageProduct::all();
        $data['product']=Product::all();
        return view('Background.insertPageProduct',$data);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
        $data= new PageProduct();
        $data->slugid=md5($request->pageproduct .time());
        $data->products_id=$request->products_id;
        $data->pagename=$request->pagename;
        //image work
        
        return redirect()->route('manage.page');
    }
    // public function subCategory($category_id){
    //     $data['subcategory'] = SubCategory::where("category_id",$category_id)->get();
    //     $data['category']=Category::all();
    //     return view('admin/insertsubCategory',$data);
    // }

      
    public function show()
    {
        //
    }

    
    public function edit($id)
    {
        //
      
        $data['page']=PageProduct::find($id);
        $data['product']=Product::all();

        return view('Background.editPageProduct',$data);
    }

    
    public function update(Request $request,$id)
    {
        //
        $page=PageProduct::find($id);
        $page->slugid=md5($request->subcategory .time());
        $page->products_id=$request->products_id;
        $page->pagename=$request->pagename;
         //image
       
        return redirect()->route('manage.page');
    }

    
    public function destroy($slug)
    {
        //
        $item = PageProduct::where('slugid',$slug)->first();
        
        if(!empty($item)){
            $item->delete();
            session()->flash('success', 'Service has been deleted !!!'); 
        }

        else{
            session()->flash('error', 'Please try again !!!');
        } 
        return redirect()->route('manage.page');
    }
}
