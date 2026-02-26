<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Models\CurrentProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CurrentProjectController extends Controller
{
    public function index()
    {
        $currentProjects = CurrentProject::latest()->simplePaginate(10);

        return view('admin.current_projects.index', compact('currentProjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'subtitle.en' => 'nullable|string|max:255',
            'subtitle.ar' => 'nullable|string|max:255',
            'description.en' => 'required|string',
            'description.ar' => 'required|string',
            'location.en' => 'required|string|max:255',
            'location.ar' => 'required|string|max:255',
            'size.en' => 'required|string|max:255',
            'size.ar' => 'required|string|max:255',
            'status.en' => 'required|string|max:255',
            'status.ar' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['title', 'subtitle', 'description', 'location', 'size', 'status']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('current_projects', 'public');
        }

        CurrentProject::create($data);

        return redirect()->route('admin.current_projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function update(Request $request, CurrentProject $currentProject)
    {
        $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'subtitle.en' => 'nullable|string|max:255',
            'subtitle.ar' => 'nullable|string|max:255',
            'description.en' => 'required|string',
            'description.ar' => 'required|string',
            'location.en' => 'required|string|max:255',
            'location.ar' => 'required|string|max:255',
            'size.en' => 'required|string|max:255',
            'size.ar' => 'required|string|max:255',
            'status.en' => 'required|string|max:255',
            'status.ar' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['title', 'subtitle', 'description', 'location', 'size', 'status']);

        if ($request->hasFile('image')) {
            if ($currentProject->image) {
                Storage::disk('public')->delete($currentProject->image);
            }
            $data['image'] = $request->file('image')->store('current_projects', 'public');
        }

        $currentProject->update($data);

        return redirect()->route('admin.current_projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(CurrentProject $currentProject)
    {
        if ($currentProject->image) {
            Storage::disk('public')->delete($currentProject->image);
        }

        $currentProject->delete();

        return redirect()->route('admin.current_projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
