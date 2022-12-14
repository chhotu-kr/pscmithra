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
        // $data['product']=Product::all();
        $data['pdf']=Pdf::all();
        return view('ecommerce.managePdf',$data);
    }

    
    public function create()
    {
        
        return view('ecommerce.insertPdf');
    }

    
    public function store(Request $request)
    {
        //
        
        $data = new Pdf();
        $data->name=$request->name;
        $data->slugid=md5($request->pdf .time());
        $filename = $request->url->getClientOriginalName();
        $request->url->move(('files'),$filename);
        $data->pdf_url = $filename;
        $data->save();
        return redirect()->route('pdf.index');
    }

   
    public function show(Pdf $pdf)
    {
        //
    }

    public function edit(Pdf $pdf)
    {
    
        // $data['product']=Product::all();
        $data['pdf']=$pdf;
        return view('ecommerce.editPdf',$data);
    }

    
    public function update(Request $request, Pdf $pdf)
    {
         $pdf->name=$request->name;
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
