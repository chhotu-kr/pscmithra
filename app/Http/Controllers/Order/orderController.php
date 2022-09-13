<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Address;
use App\Models\Coupon;
class orderController extends Controller
{
    //
    public function index()

    {   $data['order'] = Order::all();
        return view("admin.manageOrder",$data);
    }

    
    public function create()
    {   
        $data['user'] = User::all();
        $data['address'] = Address::all();
        $data['coupon'] = Coupon::all();
        $data['order'] = Order::all();
        return view('ecommerce.Order.insertOrder',$data);
    }

    
    public function store(Request $request)
    {
        // $request->validate([

        //     'user_id'=>'required',
        //     'address_id'=>'required',
        //     'coupon_id'=>'required',
        //     'isDeliverd'=>'required',
        //     'isProcessing'=>'required',
        //     'isShipped'=>'required',
        //     'dateOfOrderd'=>'required',
        //     'ordered'=>'required',
        // ]);

        $data = new Order();
        $data->user_id = $request->user_id;
        $data->address_id = $request->address_id;
        $data->coupon_id = $request->coupon_id;
        $data->isDeliverd = $request->isDeliverd;
        $data->isProcessing = $request->isProcessing;
        $data->isShipped = $request->isShipped;
        $data->dateofordered = $request->dateofordered;
        $data->ordered = $request->ordered;
        $data->save();

        return redirect()->route('order.index');
    }

   
    public function show()
    {
        //
    }

    
    public function edit($id)
    {
        $data['user'] = User::all();
        $data['address'] = Address::all();
        $data['coupon'] = Coupon::all();
        $data['order'] = Order::find($id);
        return view('ecommerce.Order.editOrder');
    }

  
    public function update(Request $request,$id)
    {
        // $request->validate([

        //     'user_id'=>'required',
        //     'address_id'=>'required',
        //     'coupon_id'=>'required',
        //     'isDeliverd'=>'required',
        //     'isProcessing'=>'required',
        //     'isShipped'=>'required',
        //     'dateOfOrderd'=>'required',
        //     'ordered'=>'required',
        // ]);
        $order = Order::find($id);
        $order->user_id = $request->user_id;
        $order->address_id = $request->address_id;
        $order->coupon_id = $request->coupon_id;
        $order->isDeliverd = $request->isDeliverd;
        $order->isProcessing = $request->isProcessing;
        $order->isShipped = $request->isShipped;
        $order->dateOfOrderd = $request->dateOfOrderd;
        $order->ordered = $request->ordered;
        $order->save();

        return redirect()->route('order.index');
    }

   
    public function destroy()
    {
        //
    }
}
