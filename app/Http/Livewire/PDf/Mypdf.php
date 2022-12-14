<?php

namespace App\Http\Livewire\Pdf;
use App\Models\userPdf;
use Livewire\Component;
use Auth;
class Mypdf extends Component
{
    public $data=[];

    public function mount(){

      $user_id=Auth::user();  
    $data  =   UserPdf::where("user_id", $user_id)->with('pdf')->get();
    if (count($data) == 0) {
        // $this->data = $data->map(function ($item) {
        //     return collect ([
        //       "pdf" => $item->pdf->pdf_url,
        //       "name" => $item->pdf->name,
        //     ]);
        //   });
        // return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }

    $data = $data->map(function ($item) {
      return collect ([
        "pdf" => $item->pdf->pdf_url,
        "name" => $item->pdf->name,
      ]);
    });
   
      // dd($data);
    
    }
    public function render()
    {  
        return view('livewire.pdf.mypdf');
    }
}
