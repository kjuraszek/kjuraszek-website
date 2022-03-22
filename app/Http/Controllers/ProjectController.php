<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = array();
        foreach (Project::all() as $project){
            $project['tags'] = $project->tags()->get()->pluck('name')->toArray();
            $projects[] = $project;
        }
        return $projects;
    }
}
