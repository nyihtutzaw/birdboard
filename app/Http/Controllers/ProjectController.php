<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects=\App\Project::all();
        return view("projects.view",compact('projects'));
    }

    public function store(Request $request)
    {

        $attributes=$request->validate([
            "title"=>"required",
            "description"=>"required"
        ]);

        \App\Project::create($attributes);
        return redirect("/projects");
    }

    public function show(\App\Project $project)
    {
        return view("projects.show",compact('project'));
    }
}
