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
        \App\Project::create(request(["title","description"]));
        return redirect("/projects");
    }
}
