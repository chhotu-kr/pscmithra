<?php

namespace App\Http\Livewire\User;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCard extends Component
{
    public $order;
    public function mount(){
        $user_id = Auth::id();
      $this->order = Cart::where('user_id', $user_id)->get();
    }
    public function removeFromCart($id)
    {
        $user_id = Auth::id(); 
        $item = Cart::where([['user_id', $user_id],['products_id',$id]])->first();

        if($item->qty ==  1){
            $item->delete();
            $this->mount();
        }
        else{
            $item->qty--;
            $item->save();
            $this->mount();
        }

    }
    public function addtoCart($id)
    {
        $user_id = Auth::id(); 
        $item = Cart::where([['user_id', $user_id],['products_id',$id]])->first();

        $item->qty++;
        $item->save();
        $this->mount();

    }

    public function removeitemfromCart($id){
        $user_id = Auth::id(); 
        $item = Cart::where([['user_id', $user_id],['products_id',$id]])->first();

        $item->delete();
        $this->mount();
    }
    public function render()
    {
        return view('livewire.user.cart-card');
    }
}
