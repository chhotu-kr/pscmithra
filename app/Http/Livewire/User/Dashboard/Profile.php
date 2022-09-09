<?php

namespace App\Http\Livewire\User\Dashboard;

use Livewire\Component;
use App\Models\User;
use Auth;
class Profile extends Component
{
    public $user;

    public function mount(){
        // $this->user = $user;
        $this->user=Auth::user();
       
 
    }
    public function render()
    {
        return view('livewire.user.dashboard.profile');
    }
}
