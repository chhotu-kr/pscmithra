<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PdfSubscription;
use Illuminate\Http\Request;

class PdfSubscriptionController extends Controller
{
    //
    public function index()
    {
        $data['pdf_subs'] = PdfSubscription::all();

        return view('ecommerce.managePdfsubscription', $data);
    }

    public function create()
    {
        $data['pdf_subs'] = PdfSubscription::all();

        return view('ecommerce.insertPdfsubs', $data);
    }

    public function store(Request $request)
    {
        $pdf_subs = new PdfSubscription();
        $pdf_subs->name = $request->name;
        $pdf_subs->slugid = md5($request->name . time());
        $pdf_subs->type = $request->type;
        $pdf_subs->Date = $request->date;
        $pdf_subs->save();
        return redirect()->route('manage.pdfsubs');
    }

    public function edit($id)
    {

        $data['pdf_subs'] = PdfSubscription::find($id);

        return view('ecommerce.editPdfsubs', $data);
    }

    public function update(Request $request, $id)
    {
        $pdf_subs = PdfSubscription::find($id);
        $pdf_subs->name = $request->name;
        $pdf_subs->slugid = md5($request->name . time());
        $pdf_subs->type = $request->type;

        $pdf_subs->save();
        return redirect()->route('manage.pdfsubs');
    }

    public function destroy($slug)
    {
        $item = PdfSubscription::where('slugid', $slug)->first();

        if (!empty($item)) {
            $item->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
        return redirect()->route('manage.pdfsubs');
    }
}
