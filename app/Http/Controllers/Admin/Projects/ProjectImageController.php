<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectImageController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $projectImages = ProjectImage::with('project')->latest()->get();

        return view('admin.projects.project_images', compact('projectImages', 'projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('uploads/project_images', 'public');

        ProjectImage::create([
            'project_id' => $request->project_id,
            'image' => $imagePath,
            'title' => $request->title,
        ]);

        return redirect()->route('admin.project_images.index')
            ->with('success', 'Project image created successfully.');
    }

    public function update(Request $request, ProjectImage $projectImage)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
        ]);

        $imagePath = $projectImage->image;

        if ($request->hasFile('image')) {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('uploads/project_images', 'public');
        }

        $projectImage->update([
            'project_id' => $request->project_id,
            'image' => $imagePath,
            'title' => $request->title,
        ]);

        return redirect()->route('admin.project_images.index')
            ->with('success', 'Project image updated successfully.');
    }

    public function destroy(ProjectImage $projectImage)
    {
        if ($projectImage->image && Storage::disk('public')->exists($projectImage->image)) {
            Storage::disk('public')->delete($projectImage->image);
        }

        $projectImage->delete();

        return redirect()->route('admin.project_images.index')
            ->with('success', 'Project image deleted successfully.');
    }
}
