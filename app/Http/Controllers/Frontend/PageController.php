<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PreviousProject;

class PageController extends Controller
{
    public function previousProjects()
    {
        $projects = PreviousProject::latest()->get();

        return view('frontend.previous_projects.previous_projects', compact('projects'));
    }
}
