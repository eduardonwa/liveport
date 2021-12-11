<?php

namespace App\Http\Controllers;

use App\Models\Quality;
use Illuminate\Http\Request;

class QualityController extends Controller
{   
    public function store(Quality $quality)
    {
        $quality = request()->validate([
            'quality' => ['required', 'string'],
        ]);

        $quality['user_id'] = auth()->id();

        $qualityObject = new Quality($quality);
        $qualityObject->save();

        return redirect('/profile')->with('new_quality', 'Keep it up!');
    }

    public function destroy(Quality $quality)
    {
        $quality->delete();
        return redirect('/profile');
    }
}