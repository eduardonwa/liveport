<?php

namespace App\Http\Controllers;

use App\Models\Toolbox;
use Illuminate\Http\Request;

class ToolBoxController extends Controller
{
    public function store(Toolbox $tool)
    {
        $tool = request()->validate([
            'tool' => ['string', 'required']
        ]);

        $tool['user_id'] = auth()->id();

        $toolObject = new Toolbox($tool);
        $toolObject->save();

        return redirect('/profile')->with('new_tool', 'Way to go!');
    }

    public function destroy(Toolbox $toolbox)
    {
        $toolbox->delete();
        return redirect('/profile');
    }
}