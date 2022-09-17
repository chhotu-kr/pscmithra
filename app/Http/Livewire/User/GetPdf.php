<?php

namespace App\Http\Livewire\User;

use App\Models\UserPdf;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GetPdf extends Component
{
    public function mount(){
        // $user_id = Auth::user();
        //   $data  =  UserPdf::where("user_id", $user_id->id)->with('pdf')->get();
        //   if (count($data) == 0) {
        //     return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
        //   }
        //   $data = $data->map(function ($item) {
        //     return [
        //       "pdf" => $item->pdf->pdf_url,
        //       "name" => $item->pdf->name,
        //     ];
        //   });
        //   dd($data);
    }

    public function render()
    {
        return view('livewire.user.get-pdf');
    }
}