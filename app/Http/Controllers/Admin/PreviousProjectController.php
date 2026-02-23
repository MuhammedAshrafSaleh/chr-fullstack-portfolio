<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PreviousProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PreviousProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = PreviousProject::latest()->simplePaginate(10);

        return view('admin.previous_projects.index', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->validationRules(isUpdate: false));

        $data = $this->prepareData($validated);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('previous_projects', 'public');
        }

        PreviousProject::create($data);

        return redirect()->route('admin.previous_projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PreviousProject $previousProject)
    {
        $validated = $request->validate($this->validationRules(isUpdate: true, id: $previousProject->id));

        $data = $this->prepareData($validated);

        if ($request->hasFile('image')) {
            if ($previousProject->image) {
                Storage::disk('public')->delete($previousProject->image);
            }
            $data['image'] = $request->file('image')->store('previous_projects', 'public');
        }

        $previousProject->update($data);

        return redirect()->route('admin.previous_projects.index')
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PreviousProject $previousProject)
    {
        if ($previousProject->image) {
            Storage::disk('public')->delete($previousProject->image);
        }

        $previousProject->delete();

        return redirect()->route('admin.previous_projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    private function validationRules(bool $isUpdate, int $id = 0): array
    {
        return [
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
        ];
    }

    private function prepareData(array $validated): array
    {
        return [
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'] ?? ['en' => null, 'ar' => null],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'size' => $validated['size'],
            'status' => $validated['status'],
        ];
    }
}
