<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
class AuthorController extends Controller
{
    //

    public function index(){
        $data['author']=Author::all();

        return view('ecommerce.insertAuthor',$data);
    }

    public function store(Request $request){
        $data= new Author();
        $data->name=$request->name();
        $data->slugid=md5($request->author .time());

        $data->save();

        return redirect()->route('insert.index');
    }
}
