<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    
    public function index()
    {    
        $data['language']=Language::all();
        return view('admin.manageLanguage',$data);
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
        $data= new Language();
        $data->languagename=$request->languagename;
        $data->slugid=md5($request->language .time());
        $data->save();

        return redirect('/language');
    }

    
    public function show(Language $language)
    {
        //
    }

    
    public function edit(Language $language,$id)
    {
        //
       $data['language'] = Language::find($id);
       return view('admin.editLanguage',$data);
    }

    
    public function update(Request $request, Language $language)
    {
        //
   
       
       
        $language->languagename=$request->languagename;
       
        $language->save();

        return redirect('/language');
    }

    
    public function slugDelete(Language $language,$slug)
    {
        //
        $sub = Language::where('slugid', $slug)->first();
        if (!empty($sub)) {
            $sub->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
        return redirect('/language');

    }
}
