<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ItemPdfSubscription;
use App\Models\PdfSubscription;
use App\Models\Product;
use Illuminate\Http\Request;

class ItemPdfSubscriptionController extends Controller
{
    //
    // public function get_product(){
    //     $data=Product::all();
    //     return response()->json($data);
    // }
    public function index(){
        // $data['itempdfsubs']=ItemPdfSubscription::where('pdf_subscriptions_id',$pdf_subscriptions_id)->get();
        $data['itempdfsubs']=ItemPdfSubscription::all();

        return view('ecommerce.manageItempdfsubs',$data);
    }

    public function create(){
        $data['item_pdfsubs']=ItemPdfSubscription::all();
        $data['pdf_subs']=PdfSubscription::all();
        
        return view('ecommerce.insertItempdfsub',$data);
    }

    public function store(Request $request){
        $item_pdfsubs= new ItemPdfSubscription();
        $item_pdfsubs->name=$request->name;
        $item_pdfsubs->url=$request->url;
        $item_pdfsubs->pdf_subscriptions_id=$request->pdf_subscriptions_id;
        $item_pdfsubs->slugid=md5($request->name .time());
        $item_pdfsubs->save();

        return redirect()->route('manage.item');



    }

    public function edit($id){
        $data['item_pdfsubs']=ItemPdfSubscription::find($id);
        $data['pdf_subs']=PdfSubscription::all();

        return view('ecommerce.editItemPdf',$data);
    }

    public function update(Request $request,$id){
        $item_pdfsubs=ItemPdfSubscription::find($id);
        $item_pdfsubs->name=$request->name;
        $item_pdfsubs->url=$request->url;
        $item_pdfsubs->pdf_subscriptions_id=$request->pdf_subscriptions_id;
        $item_pdfsubs->slugid=md5($request->name .time());
        $item_pdfsubs->save();

        return redirect()->route('manage.item');

    }

    public function delete($slug){
        $item=ItemPdfSubscription::where('slugid', $slug)->first();
        
        if (!empty($item)) {
            $item->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
        return redirect()->route('manage.item');
    }
}
