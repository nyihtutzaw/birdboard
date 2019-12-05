<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    public function store(Request $request)
    {

        $attributes=$request->validate([
            "title"=>"required",
            "description"=>"required",
        ]);

        auth()->user()->projects()->create($attributes);

        
        return redirect("/home");
    }

    public function show(\App\Project $project)
    {
        if (auth()->user()->isNot($project->owner))
        {
            abort(403);
        }
        return view("projects.show",compact('project'));
    }


    public function create()
    {
        return view("projects.create");
    }

}
