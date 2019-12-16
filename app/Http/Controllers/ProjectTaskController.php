<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
    public function store(\App\Project $project)
    {
        request()->validate(["body"=>"required"]);
        $project->addTask(request("body"));
        return redirect($project->path());
    }
}
