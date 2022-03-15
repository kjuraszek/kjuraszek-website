<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = json_decode(file_get_contents(public_path() . "/data/projects.json"), true);
        return $projects;
    }
}
