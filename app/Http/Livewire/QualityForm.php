<?php

namespace App\Http\Livewire;

use App\Models\Quality;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class QualityForm extends Component
{
    public $quality;

    protected $rules = [
        'quality' => 'required|min:6',
    ];

    public function submitForm()
    {
        $qualities = Quality::create([
            'user_id' => Auth::user()->id,
            'quality' => $this->quality
        ]);

        $this->validate();
        
        $this->emit('refreshQualityList');
        
        $this->reset();
    }

    public function render()
    {
        return view('livewire.quality-form');
    }
}