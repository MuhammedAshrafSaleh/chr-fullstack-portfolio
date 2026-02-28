<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProjectServiceController extends Controller
{
   public function index()
    {
        $projects        = Project::all();
        $projectServices = ProjectService::with('project')->latest()->get();

        return view('admin.projects.project_services', compact('projectServices', 'projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id'   => 'required|exists:projects,id',
            'image'        => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'title.en'     => 'required|string|max:255',
            'title.ar'     => 'required|string|max:255',
            'subtitle.en'  => 'required|string|max:255',
            'subtitle.ar'  => 'required|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('uploads/project_services', 'public');

        ProjectService::create([
            'project_id' => $request->project_id,
            'image'      => $imagePath,
            'title'      => $request->title,
            'subtitle'   => $request->subtitle,
        ]);

        return redirect()->route('admin.project_services.index')
                         ->with('success', 'Project service created successfully.');
    }

    public function update(Request $request, ProjectService $projectService)
    {
        $request->validate([
            'project_id'   => 'required|exists:projects,id',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'title.en'     => 'required|string|max:255',
            'title.ar'     => 'required|string|max:255',
            'subtitle.en'  => 'required|string|max:255',
            'subtitle.ar'  => 'required|string|max:255',
        ]);

        $imagePath = $projectService->image;

        if ($request->hasFile('image')) {
            if ($projectService->image && Storage::disk('public')->exists($projectService->image)) {
                Storage::disk('public')->delete($projectService->image);
            }
            $imagePath = $request->file('image')->store('uploads/project_services', 'public');
        }

        $projectService->update([
            'project_id' => $request->project_id,
            'image'      => $imagePath,
            'title'      => $request->title,
            'subtitle'   => $request->subtitle,
        ]);

        return redirect()->route('admin.project_services.index')
                         ->with('success', 'Project service updated successfully.');
    }

    public function destroy(ProjectService $projectService)
    {
        if ($projectService->image && Storage::disk('public')->exists($projectService->image)) {
            Storage::disk('public')->delete($projectService->image);
        }

        $projectService->delete();

        return redirect()->route('admin.project_services.index')
                         ->with('success', 'Project service deleted successfully.');
    }
}
