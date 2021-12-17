<?php

namespace App\Http\Livewire;

use App\Models\Toolbox;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ToolList extends Component
{   
    public $checked = [];
    
    public $listeners = [
        'refreshToolList' => '$refresh',
    ];

    public function deleteTool($toolId)
    {
        $this->toolId = Auth::user()->tools;
        $this->toolId = Toolbox::where('id', $toolId)->first();
        $this->toolId->delete();
    }

    public function removeTools()
    {
        Toolbox::whereKey($this->checked)->delete();
        $this->checked = [];

        session()->flash('removed_tools', 'Some tools were deleted');
    }

    public function render()
    {
        return view('livewire.tool-list', [
            'tools' => Auth::user()->tools()->get()
        ]);
    }
}