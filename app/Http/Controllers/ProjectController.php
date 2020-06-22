<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    //
    public function index () {
        $projects = Project::all()->sortByDesc("id");

        return view('projects.index', ['projects' => $projects]);
    }

    public function create () {
        return view('projects.create');
    }

    public function store (Request $request) {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        $project = new Project();
        $project->name = $request->name;

        $project->save();

        return redirect()->route('projects');
    }
}
