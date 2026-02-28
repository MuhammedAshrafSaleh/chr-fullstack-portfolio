<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectPlan;
use Illuminate\Support\Facades\Storage;
class ProjectPlanController extends Controller
{
     public function index()
    {
        $projects     = Project::all();
        $projectPlans = ProjectPlan::with('project')->latest()->get();

        return view('admin.projects.project_plans', compact('projectPlans', 'projects'));
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

        $imagePath = $request->file('image')->store('uploads/project_plans', 'public');

        ProjectPlan::create([
            'project_id' => $request->project_id,
            'image'      => $imagePath,
            'title'      => $request->title,
            'subtitle'   => $request->subtitle,
        ]);

        return redirect()->route('admin.project_plans.index')
                         ->with('success', 'Project plan created successfully.');
    }

    public function update(Request $request, ProjectPlan $projectPlan)
    {
        $request->validate([
            'project_id'   => 'required|exists:projects,id',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'title.en'     => 'required|string|max:255',
            'title.ar'     => 'required|string|max:255',
            'subtitle.en'  => 'required|string|max:255',
            'subtitle.ar'  => 'required|string|max:255',
        ]);

        $imagePath = $projectPlan->image;

        if ($request->hasFile('image')) {
            if ($projectPlan->image && Storage::disk('public')->exists($projectPlan->image)) {
                Storage::disk('public')->delete($projectPlan->image);
            }
            $imagePath = $request->file('image')->store('uploads/project_plans', 'public');
        }

        $projectPlan->update([
            'project_id' => $request->project_id,
            'image'      => $imagePath,
            'title'      => $request->title,
            'subtitle'   => $request->subtitle,
        ]);

        return redirect()->route('admin.project_plans.index')
                         ->with('success', 'Project plan updated successfully.');
    }

    public function destroy(ProjectPlan $projectPlan)
    {
        if ($projectPlan->image && Storage::disk('public')->exists($projectPlan->image)) {
            Storage::disk('public')->delete($projectPlan->image);
        }

        $projectPlan->delete();

        return redirect()->route('admin.project_plans.index')
                         ->with('success', 'Project plan deleted successfully.');
    }
}
