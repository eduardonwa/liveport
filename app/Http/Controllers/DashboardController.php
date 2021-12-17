<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Profile $profile, Project $projects)
    {   
        $profile = Profile::get();
        $projects = Project::paginate(8);
        $user = User::with('profile')->first();

        return view('dashboard', compact('profile', 'projects', 'user'));
    }
}