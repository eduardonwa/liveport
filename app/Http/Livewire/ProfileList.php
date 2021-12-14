<?php

namespace App\Http\Livewire;

use App\Models\Quality;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProfileList extends Component
{   
    public $listeners = [
		'refreshQualityList' => '$refresh'
	];

    public function render(Quality $quality)
    {
        return view('livewire.profile-list', [
            'quality' => Auth::user()->qualities
        ]);
    }
}
