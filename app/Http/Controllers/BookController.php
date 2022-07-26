<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    //

    public function index(){
        $data['book']=Book::all();
        return view('ecommerce.insertBook',$data);
    }

    public function BookStore(Request $request){
        $data= new Book();
        $data->bookname=$request->bookname;
        $data->slugid=md5($request->bookname .time());
        $data->save();
        return redirect()->route('insert.book');

    }

    public function edit($id){
        $data['book']=Book::find($id);

        return view('ecommerce.editBook',$data);
    }

    public function update(Request $request,$id){
         $book=Book::find($id);
        $book->bookname=$request->bookname;
         $book->slugid=md5($request->bookname .time());
        $book->save();
        return redirect()->route('insert.book');
 
    }

    public function destroy($slug){
        $item= Book::where('slugid', $slug)->first();
        
        if (!empty($item)) {
            $item->delete();
            session()->flash('success', 'Service has been deleted !!!');
        } else {
            session()->flash('error', 'Please try again !!!');
        }
        return redirect()->route('insert.book');
    }
}
