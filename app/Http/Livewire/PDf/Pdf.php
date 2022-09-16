<?php

namespace App\Http\Livewire\PDf;
use App\Models\userPdf;
use Livewire\Component;
use Auth;
class Pdf extends Component
{

    public $data=[];

    public function mount(){
        // if (empty($request->user)) {
        //     return response()->json(['msg' => 'Enter User', 'status' => false]);
        //   }
        //   $user_id =  User::where("slugid", $request->user)->first();
        //   if (!$user_id) {
        //     return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
        //   }
      
      
        //   $data  =  userPdf::where("user_id", $user_id->id)->with('pdf')->get();
        //   if (count($data) == 0) {
        //     return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
        //   }
        //   $data = $data->map(function ($item) {
        //     return [
        //       "pdf" => $item->pdf->pdf_url,
        //       "name" => $item->pdf->name,
        //     ];
        //   });
        //   return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);

        $user_id=Auth::id();
        $data  =  userPdf::where("user_id", $user_id)->with('pdf')->get();

        if (count($data) == 0) {
            $this->data = $data->map(function ($item) {
                    return collect ([
                      "pdf" => $item->pdf->pdf_url,
                      "name" => $item->pdf->name,
                    ]);
                  });
              }
    }


    public function render()
    {
        return view('livewire.p-df.pdf');
    }
}
