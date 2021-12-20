<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
            'profile_pic' => ['image', 'nullable'],
            'linkedin_url' => ['url', 'nullable'],
            'optional' => ['nullable']
        ]);

        $profile['user_id'] = auth()->id();
        
        if(request()->has('profile_pic')) {
            $profile['profile_pic'] = request()->file('profile_pic')->store('profiles');
        }

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
        $data = $this->validateProfile($request);

        if (request()->hasFile('profile_pic')) {
            Storage::delete($profile->profile_pic);             
            $data['profile_pic'] = Storage::disk('public')->put('profiles', $request->file('profile_pic'));
        }

        $profile->update($data);
        
        return redirect('/profile')->with('edit_profile', 'You\'ve now changed your profile!');
    }

    protected function validateProfile($request) 
    {
        return $request->validate([
            'full_name' => ['required'],
            'bio'  => ['required'],
            'profile_pic' => ['image', 'nullable'],
            'linkedin_url'  => ['url', 'nullable'],
            'optional' => ['nullable'],
        ]);
    }
}