<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Project $projects)
    {
        $projects = Project::with('user')->paginate(8);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {   
        return view('projects.create');
    }

    public function store(Project $project)
    {
        $project = request()->validate([
            'title' => ['required'],
            'description' => ['required'],
            'display_date' => ['required'],
            'url' => ['url', 'nullable']
        ]);

        $project['user_id'] = auth()->id();
        
        $projectObject = new Project($project);
        $projectObject->save();

        return redirect('/projects')->with('new_project', 'New project added, nice!');
    }

    public function edit(Project $project, $id)
    {   
        $project = Project::where('id', $id)->first();
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project, Request $request)
    {   
        $project->update($this->validateProject($request));
        return redirect('/projects')->with('edit_project', 'Project edited, cool!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects');
    }

    protected function validateProject($request) 
    {
        return $request->validate([
            'title' => ['required'],
            'description'  => ['required'],
            'display_date'  => ['required'],
            'url' => ['url'],
        ]);
    }
}