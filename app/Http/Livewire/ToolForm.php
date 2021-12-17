<?php

namespace App\Http\Livewire;

use App\Models\Toolbox;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ToolForm extends Component
{   
    public $tool;

    protected $rules = [
        'tool' => 'required|min:6',
    ];

    public function submitForm()
    {
        $tools = Toolbox::create([
            'user_id' => Auth::user()->id,
            'tool' => $this->tool
        ]);

        $this->validate();

        $this->emit('refreshToolList');

        $this->reset();
    }
    
    public function render()
    {
        return view('livewire.tool-form');
    }
}