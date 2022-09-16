<?php

namespace App\Http\Livewire\Sessionalpdf;

use Livewire\Component;
use App\Models\userPdfSubscriptions;
use Auth;
class Pdf extends Component
{  

    public $data;
    public function mount(){
        // if (Auth::user()) {
        //     $user_id = Auth::id();
        //   }
        //   $user_id =  User::where("slugid", $request->user)->first();
        //   if (!$user_id) {
        //     return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
        //   }
        //   $data  =  userPdfSubscriptions::where("user_id", $user_id->id)->with('pdf')->get();
        //   $data = $data->map(function ($item) {
      
        //     return [
        //       'id' => $item->slugid,
        //       "name" => $item->pdf->name,
        //       "On" => $item->pdf->Date,
        //       "type" => $item->pdf->type,
        //     ];
        //   });
         
        $user_id=Auth::id();
        $this->data  =  userPdfSubscriptions::where("user_id", $user_id)->with('pdf')->get();
          $this->data = $data->map(function ($item) {
      
            return [
              'id' => $item->slugid,
              "name" => $item->pdf->name,
              "On" => $item->pdf->Date,
              "type" => $item->pdf->type,
            ];
        });

    }
    public function render()
    {
        return view('livewire.sessionalpdf.pdf');
    }
}
