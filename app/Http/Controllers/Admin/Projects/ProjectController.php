<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Models\CurrentProject;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('currentProject')->latest()->simplePaginate(10);
        $currentProjects = CurrentProject::orderBy('id')->get();

        return view('admin.projects.projects', compact('projects', 'currentProjects'));
    }

    /**
     * Store a newly created project.
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_project_id' => 'required|exists:current_projects,id',
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'subtitle.en' => 'required|string|max:255',
            'subtitle.ar' => 'required|string|max:255',
            'longitude' => 'required|numeric|between:-180,180',
            'latitude' => 'required|numeric|between:-90,90',
        ]);

        Project::create([
            'current_project_id' => $request->current_project_id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);

        return redirect()->route('admin.projects.index')
            ->with('success', __('Project created successfully.'));
    }

    /**
     * Update the specified project.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'current_project_id' => 'required|exists:current_projects,id',
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'subtitle.en' => 'required|string|max:255',
            'subtitle.ar' => 'required|string|max:255',
            'longitude' => 'required|numeric|between:-180,180',
            'latitude' => 'required|numeric|between:-90,90',
        ]);

        $project->update([
            'current_project_id' => $request->current_project_id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);

        return redirect()->route('admin.projects.index')
            ->with('success', __('Project updated successfully.'));
    }

    /**
     * Remove the specified project.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', __('Project deleted successfully.'));
    }
}
