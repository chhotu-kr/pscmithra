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

    public function edit($id){
    $data['author']=Author::find($id);

    return view('ecommerce.insertAuthor',$data);
    }

    public function update(Request $request,$id){
      $author=Author::find($id);
      $author->name=$request->name();
      $author->slugid=md5($request->author .time());
      $author->save();

        return redirect()->route('insert.index');
    }

    public function destroy($slug){
        $sub=Author::where('slugid',$slug)->first();
    }
}
