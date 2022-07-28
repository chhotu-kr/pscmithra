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
        $data->name=$request->name;
        $data->slug=md5($request->author .time());

        $data->save();

        return redirect()->route('insert.index');
    }

    public function edit($id){
    $data['author']=Author::find($id);

    return view('ecommerce.editAuthor',$data);
    }

    public function update(Request $request,$id){
      $author=Author::find($id);
      $author->name=$request->name;
      $author->slug=md5($request->author .time());
      $author->save();

        return redirect()->route('insert.index');
    }

    public function destroy($slug){
        $item=Author::where('slug',$slug)->first();

        if(!empty($item)){
            $item->delete();
            session()->flash('success', 'Service has been deleted !!!'); 
        }

        else{
            session()->flash('error', 'Please try again !!!');
        } 

        return redirect()->route('insert.index');
    }
}
