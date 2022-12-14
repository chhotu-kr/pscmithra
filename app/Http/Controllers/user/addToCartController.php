<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Coupon;
use App\Models\Address;
use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use App\Models\UserPdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class addToCartController extends Controller
{
    //

    public function index()
    {
        $user_id = Auth::id();
        // dd($user_id);
        $data['order'] = Cart::where('user_id', $user_id)->get();
        // dd($data);
        return view('user/cart/Cart', $data);
    }


    public function viewProduct($p_id)
    {
        $data['category'] = Category::all();
        $data['product'] = Product::find($p_id);
        return view("user/cart/viewproduct", $data);
    }
  
    public function checkOut()
    {

        $data['addresses'] = Address::where("user_id", Auth::id())->get();
        return view("user/cart/checkout", $data);
    }
   
    public function addTCart(Request $request, $p_id)
    {
        // dd($p_id);
        // $product=Product::find($p_id);
        // $user=Auth::user();
        // if($product){
        //    $order=get_order();
        //    if($order){
        //         $orderItem=OrderItem::where([['ordered',false],["order_id",$order->id],['product_id',$product->id]])->first();

        //         if($orderItem){
        //          $orderItem->qty +=1;
        //          $orderItem->save();
        //         }
        //         else{
        //            $oi=new OrderItem();
        //            $oi->ordered=false;
        //            $oi->product_id=$product->id;
        //            $oi->order_id=$order->id;
        //            $oi->save();

        //         }

        //    }


        //    else{
        //        //New Order Create
        //     // $ord=new Order();
        //     // $ord->ordered=false;
        //     // $ord->user_id=$user->id;
        //     // $ord->save();



        //     // $oi=new OrderItem();
        //     // $oi->ordered=false;
        //     // $oi->product_id=$product->id;
        //     // $oi->order_id=$ord->id;
        //     // $oi->save();

        //     return redirect()->route('user.login');

        //    }

        //    $ord=new Order();
        //    $ord->ordered=false;
        //    $ord->user_id=$user->id;
        //    $ord->save();



        //    $oi=new OrderItem();
        //    $oi->ordered=false;
        //    $oi->product_id=$product->id;
        //    $oi->order_id=$ord->id;
        //    $oi->save();



        // }   
        // return redirect()->route("usercart.index");
    }
   

    public function removeItemFromCart(Request $request, $p_id)
    {
        $product = Product::find($p_id);
        $user = Auth::user();
        if ($product) {
            $order = Order::where([['ordered', false], ['user_id', $user->id]])->first();
            if ($order) {
                $orderItem = OrderItem::where([['ordered', false], ["order_id", $order->id], ['product_id', $product->id]])->first();
                if ($orderItem) {
                    $orderItem->delete();
                }
            }
        }
        return redirect()->route("usercart.index");
    }
    private function checkCode($code)
    {
        $coupon = Coupon::where([['code', $code], ['status', 0]])->first();
        return $coupon;
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);

        if ($coupon = $this->checkCode($request->code)) {
            $order = get_order();
            $order->coupon_id = $coupon->id;
            $order->save();
            return redirect()->route('usercart.index');
        } else {
            return redirect()->route('usercart.index')->with("msg", "Invalid Coupon");
        }
    }

    public function removeCoupon()
    {
        $order = get_order();
        $order->coupon_id = null;
        $order->save();
        return redirect()->route('usercart.index');
    }

    static public function assignAddress($id)
    {
        $address = Address::findOrFail($id);
        $order = get_order();
        $order->address_id = $address->id;
        $order->save();

        // $this->insertUserPdf(['order_id'=>$order->id,'user_id'=>Auth::id(),'product_id'=>1,'pdf_id'=>1]);
        return redirect()->route('checkout');
    }

    public function addToCart(Request $request)
    {
      
        if (Auth::user()) {
            $user_id = Auth::id();
            $product = Cart::where([['products_id', $request->p_id], ['user_id', $user_id]])->first();
            if ($product) {
                $product->qty  = $product->qty + 1;
                $product->save();
                return redirect()->route('usercart.index');

            } else {
                $slugid = md5($user_id + time());

                $prd = new Cart();
                $prd->products_id = $request->p_id;
                $prd->slugid = $slugid;
                $prd->user_id = $user_id;
                $prd->qty = 1;
                $prd->save();
                return redirect()->route('usercart.index');
            }
        } else {
            return redirect()->route('user.login');
        }
    }
}
