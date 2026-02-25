<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CurrentProject;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CurrentProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentProjects = CurrentProject::with('project')->latest()->simplePaginate(10);
        $projects = Project::all();

        return view('admin.current_projects.index', compact('currentProjects', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('current_projects', 'public')
            : null;

        CurrentProject::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'location' => $request->location,
            'size' => $request->size,
            'status' => $request->status,
            'image' => $imagePath,
            'project_id' => $request->project_id,
        ]);

        return redirect()->route('admin.current_projects.index')
            ->with('success', 'Current project created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CurrentProject $currentProject)
    {
        $this->validateRequest($request);

        $imagePath = $currentProject->image;

        if ($request->hasFile('image')) {
            if ($currentProject->image) {
                Storage::disk('public')->delete($currentProject->image);
            }
            $imagePath = $request->file('image')->store('current_projects', 'public');
        }

        $currentProject->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'location' => $request->location,
            'size' => $request->size,
            'status' => $request->status,
            'image' => $imagePath,
            'project_id' => $request->project_id,
        ]);

        return redirect()->route('admin.current_projects.index')
            ->with('success', 'Current project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CurrentProject $currentProject)
    {
        if ($currentProject->image) {
            Storage::disk('public')->delete($currentProject->image);
        }

        $currentProject->delete();

        return redirect()->route('admin.current_projects.index')
            ->with('success', 'Current project deleted successfully.');
    }

    // ══════════════════════════════════════
    // VALIDATION
    // ══════════════════════════════════════
    private function validateRequest(Request $request, bool $imageRequired = false): array
    {
        return $request->validate([
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
            'image' => ($imageRequired ? 'required' : 'nullable').'|image|max:2048',
            'project_id' => 'required|exists:projects,id',
        ]);
    }

    // ══════════════════════════════════════
    // IMAGE UPLOAD HELPER
    // ══════════════════════════════════════
    private function handleImageUpload($file): string
    {
        $filename = uniqid('current_project_').'.webp';
        $path = 'current_projects/'.$filename;

        Storage::disk('public')->makeDirectory('current_projects');

        Image::make($file)
            ->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('webp', 80)
            ->save(storage_path('app/public/'.$path));

        return $path;
    }
}
