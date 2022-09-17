<?php

namespace App\Http\Livewire\User;

use App\Models\order;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderHistory extends Component
{
    use WithPagination;

    public $orderItem = NULL;
    public function orderItem($id)
    {

        $user_id = Auth::user();
        $data = order::where("user_id", $user_id->id)->where("slugid", $id)->with('orderItem.product')->get();

        if (count($data) == 0) {
            return response()->json(['msg' => 'No Order Found', 'status' => true]);
        } else {
            $data = $data[0]->orderItem->map(function ($item) {
                return [
                    'status' => $item->status,
                    'tittle' => $item->product->title,
                    'type' => $item->product->type,
                    'price' => $item->product->price,
                    'bannerimage' => $item->product->bannerimage,
                ];
            });

            $this->orderItem = $data;
        }
        $this->render();
    }
    public function render()
    {

      if($this->orderItem == NULL){
        return view('livewire.user.order-history', [

            'orderdata' => order::where("user_id", Auth::id())->paginate(10),
           
        ]);
      }
      if($this->orderItem != NULL){
        return view('livewire.user.order-history', [

            'orderitem' => $this->orderItem::paginate(10),
           
        ]);
      }
       
    }
}
