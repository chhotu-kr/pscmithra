<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use App\Models\Product;
use Illuminate\Http\Request;

class PdfController extends Controller
{
   
    public function index()
    {
        //
        $data['product']=Product::all();
        $data['pdf']=Pdf::all();
        return view('admin.ecommerce.managePdf',$data);
    }

    
    public function create()
    {
        //
        $data['product']=Product::all();
        $data['pdf']=Pdf::all();
        return view('admin.ecommerce.insertPdf',$data);
    }

    
    public function store(Request $request)
    {
        //
        $data = new Pdf();
        $data->product_id=$request->product_id;
        $data->slugid=md5($request->pdf .time());
        $data->pdf_url=$request->pdf_url;
        $data->save();
        return redirect()->route('pdf.index');
    }

   
    public function show(Pdf $pdf)
    {
        //
    }

    public function edit(Pdf $pdf)
    {
    
        $data['product']=Product::all();
        $data['pdf']=$pdf;
        return view('admin.ecommerce.editPdf',$data);
    }

    
    public function update(Request $request, Pdf $pdf)
    {
         $pdf->product_id=$request->product_id;
         $pdf->slugid=md5($request->screenshot .time());
         $pdf->pdf_url=$request->pdf_url;
         $pdf->save();
         return redirect()->route('pdf.index');
    }

    
    public function destroy(Pdf $pdf)
    {
        //
        // $sub= Pdf::where('slugid', $slug)->first();
        
        // if (!empty($sub)) {
        //     $sub->delete();
        //     session()->flash('success', 'Service has been deleted !!!');
        // } else {
        //     session()->flash('error', 'Please try again !!!');
        // }
        $pdf->delete();
        return redirect()->route('pdf.index');
    }
}
