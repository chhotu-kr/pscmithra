<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Book;
use App\Models\Pdf;
use App\Models\Course;
use App\Models\BookProduct;
use App\Models\CourseProduct;
use App\Models\PdfProduct;
use App\Models\PdfSubscription;
use App\Models\PdfSubscriptionProduct;
// use App\Models\PlanProduct;
use App\Models\ProductPlan;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get_Book(){
      $data=Book::all();
     
    
         
        return response()->json($data);
    }

    public function get_Course(){
        $data=Course::all();
        return response()->json($data);
    }
    public function get_Pdf(){
        $data=Pdf::all();
        return response()->json($data);
    }

    public function get_PdfSubscription(){
        $data=PdfSubscription::all();
        return response()->json($data);
    
    }
    public function index()
    {
        //
        $data['product']=Product::all();
        $data['subject']=Subject::all();
        $data['topic']=Topic::all();
        
        return view('ecommerce.manageProduct',$data);
    }

    
    public function create()
    {
        //
        $data['product']=Product::all();
        $data['subject']=Subject::all();
        $data['topic']=Topic::all();
        return view('ecommerce.insertProduct',$data);
    }

    
    public function store(Request $request)
    {
        //
       
        $data = new Product();
        $data->subject_id=$request->subject_id;
        $data->topic_id=$request->topic_id;
        $data->slugid=md5("bfghfhgf" .time()."gfhgf");
        $data->title=$request->title;
        $data->description=$request->description;
        $data->type=$request->type;
        $data->price=$request->price;
          //image work
          $filename = $request->bannerimage->getClientOriginalName();
          $request->bannerimage->move(('images'),$filename);
          $data->bannerimage = $filename;
        
        
        $data->bycount=$request->bycount;
        $data->save();

        if($request->type=='book'){
            $book_product=new BookProduct();
            $book_product->product_id=$data->id;
            $book_product->book_id=$request->data;
            $book_product->slugid=md5("ghjfh" .time()."hjfhjfjhfghf");
            $book_product->save();
        }
        else if($request->type=='course'){
            $course_product=new CourseProduct();
            $course_product->product_id=$data->id;
            $course_product->slugid=md5("ghtrjfh" .time()."hjfhjf33fghf");
            $course_product->course_id=$request->data;

            $course_product->save();
        }
        else if($request->type=='pdf'){
            $pdf_product=new PdfProduct();
            $pdf_product->product_id=$data->id;
            $pdf_product->slugid=md5("ghjfhtyt" .time()."hjfwrehfghf");
            $pdf_product->pdf_id=$request->data;

            $pdf_product->save();
        }
        else if($request->type=='ebook'){
            $pdfsubs=new PdfSubscriptionProduct();
            $pdfsubs->product_id=$data->id;
            // $pdfsubs->slugid=md5("ghjfyfdt" .time()."hjfwhfgfffhf");
            $pdfsubs->pdf_subscriptions_id=$request->data;

            $pdfsubs->save();
        }else if($request->type='plan'){

            if(!empty($request->liveexamduration) ||!empty($request->liveexam)){
                $planproduct = new ProductPlan();
                $planproduct->product_id=$data->id;
                $planproduct->liveexam=$request->liveexam;
                $planproduct->examduration=$request->liveexamduration;
                $planproduct->save();
                
             }
            
         }
        return redirect()->route('product.index');
    }

    
    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
        $data['product']=$product;
        $data['subject']=Subject::all();
        $data['topic']=Topic::all();
        return view('ecommerce.editProduct',$data);
    }
//    public function get_BookEdit($id){
//     $data=Book::find($id);
//     return response()->json('$data');
//    }
    
    public function update(Request $request, Product $product,$id)
    {
        //
      
        $product->slugid=md5($request->product .time());
        $product->title=$request->title;
        $product->description=$request->description;
        $product->pdf=$request->pdf;
        $product->price=$request->price;
        //image work
        $filename = $request->bannerimage->getClientOriginalName();
        $request->bannerimage->move(('images'),$filename);
        $product->bannerimage = $filename;
      
        $product->bycount=$request->bycount;
        $product->save();

        // if($request->type=='book'){
        //      $book_product=BookProduct::find($id);
        //     $book_product->product_id=$product->id;
        //     $book_product->book_id=$request->data;
        //     $book_product->slugid=md5("ghjfh" .time()."hjfhjfjhfghf");
        //     $book_product->save();
        // }
        return redirect()->route('product.index');
    }

    
    public function destroy(Product $product)
    {
        //
        // $item= Product::where('slugid')->first();
        
        // if (!empty($item)) {
        //     $item->delete();
        //     session()->flash('success', 'Service has been deleted !!!');
        // } else {
        //     session()->flash('error', 'Please try again !!!');
        // }
        $product->delete();
        return redirect()->route('product.index');

        
    }
}
