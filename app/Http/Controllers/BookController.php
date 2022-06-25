<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Product;
use Illuminate\Http\Request;

class BookController extends Controller
{
    
    public function index()
    {
        //
        $data['product']=Product::all();
        $data['book']=Book::all();
        return view('admin.ecommerce.insertBook',$data);
    }

    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
        $data = new Book();
        $data->product_id=$request->product_id;
        $data->slugid=md5($request->pdf .time());
        $data->address=$request->address;
        $data->save();
        return redirect('/pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    
    public function edit(Book $book)
    {
        //
    }

    
    public function update(Request $request, Book $book)
    {
        //
    }

    
    public function destroy(Book $book)
    {
        //
    }
}
