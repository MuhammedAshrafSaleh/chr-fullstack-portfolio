<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectDetail;
use Illuminate\Http\Request;
class ProjectDetailController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $projectDetails = ProjectDetail::with('project')->latest()->get();

        return view('admin.projects.project_details', compact('projectDetails', 'projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'subtitle.en' => 'required|string|max:255',
            'subtitle.ar' => 'required|string|max:255',
        ]);

        ProjectDetail::create([
            'project_id' => $validated['project_id'],
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'],
        ]);

        return redirect()->route('admin.project_details.index')
            ->with('success', 'Project detail created successfully.');
    }

    public function update(Request $request, ProjectDetail $projectDetail)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'subtitle.en' => 'required|string|max:255',
            'subtitle.ar' => 'required|string|max:255',
        ]);

        $projectDetail->update([
            'project_id' => $validated['project_id'],
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'],
        ]);

        return redirect()->route('admin.project_details.index')
            ->with('success', 'Project detail updated successfully.');
    }

    public function destroy(ProjectDetail $projectDetail)
    {
        $projectDetail->delete();

        return redirect()->route('admin.project_details.index')
            ->with('success', 'Project detail deleted successfully.');
    }
}
