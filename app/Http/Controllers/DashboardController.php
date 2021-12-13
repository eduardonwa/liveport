<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Profile $profile, Project $projects)
    {   
        $profile = Profile::get();
        $projects = Project::paginate(8);

        return view('dashboard', compact('profile', 'projects'));
    }
}