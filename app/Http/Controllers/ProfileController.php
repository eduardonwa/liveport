<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Profile $profile)
    {
        $profile = Profile::get();
        $qualities = Auth::user()->qualities;
        $toolbox = Auth::user()->tools;

        return view('profile.index', compact('profile', 'qualities', 'toolbox'));
    }

    public function create()
    {   
        return view('profile.create');
    }

    public function store(Profile $profile)
    {
        $profile = request()->validate([
            'full_name' => ['required'],
            'bio' => ['required'],
            'linkedin_url' => ['url', 'nullable'],
            'optional' => ['nullable']
        ]);

        $profile['user_id'] = auth()->id();
        $profileObject = new Profile($profile);
        $profileObject->save();

        return redirect('/profile')->with('profile_created', 'Ay, new profile created!');
    }

    public function edit(Profile $profile)
    {   
        $profile = Auth::user()->profile;
        return view('profile.edit', compact('profile'));
    }

    public function update(Profile $profile, Request $request)
    {   
        $profile->update($this->validateProfile($request));
        return redirect('/profile')->with('edit_profile', 'You\'ve now changed your profile!');
    }

    protected function validateProfile($request) 
    {
        return $request->validate([
            'full_name' => ['required'],
            'bio'  => ['required'],
            'linkedin_url'  => ['url', 'nullable'],
            'optional' => ['nullable'],
        ]);
    }
}