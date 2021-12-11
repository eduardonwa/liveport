<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Quality;
use App\Models\Toolbox;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $profile = Profile::get();
        $qualities = Quality::get();
        $projects = Project::get();
        $tools = Toolbox::get();

        $toolbox = collect($tools); // collect items in the collections variable
        $panels = $toolbox->splitIn(2); // split in
        $panels->all();

        return view('welcome', compact(
            'profile', 
            'tools',
            'panels',
            'qualities', 
            'projects'
        ));
    }
}
