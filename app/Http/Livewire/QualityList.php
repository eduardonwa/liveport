<?php

namespace App\Http\Livewire;

use App\Models\Quality;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class QualityList extends Component
{   
    public $checked = [];

    public $listeners = [
		'refreshQualityList' => '$refresh',
	];

    public function deleteQuality($qualityId)
    {
        $this->qualityId = Auth::user()->qualities;
        $this->qualityId = Quality::where('id', $qualityId)->first();
        $this->qualityId->delete();
    }
    
    public function removeQualities()
    {
        Quality::whereKey($this->checked)->delete();
        $this->checked = [];

        session()->flash('removed_qualities', 'Some qualities were deleted');
    }

    public function render()
    {
        return view('livewire.quality-list', [
            'qualities' => Auth::user()->qualities()->get()
        ]);
    }
}