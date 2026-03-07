<?php

namespace App\Http\Controllers\Admin\ConstructionUpdates;

use App\Http\Controllers\Controller;
use App\Models\ConstructionUpdate;
use App\Models\ConstructionUpdateProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConstructionUpdateProjectController extends Controller
{
    public function index()
    {
        $updates = ConstructionUpdateProject::with('constructionUpdate')->latest()->simplePaginate(10);
        $constructionUpdates = ConstructionUpdate::latest()->get();

        return view('admin.construction_updates.edit_project', compact('updates', 'constructionUpdates'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'construction_update_id' => 'required|exists:construction_updates,id',
            'head.en' => 'required|string|max:255',
            'head.ar' => 'required|string|max:255',
            'subhead.en' => 'required|string|max:255',
            'subhead.ar' => 'required|string|max:255',
            'media' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048',
            'youtube_link' => 'nullable|url|max:255',
        ]);

        $mediaPath = null;
        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('construction_update_projects', 'public');
        }

        ConstructionUpdateProject::create([
            'construction_update_id' => $validated['construction_update_id'],
            'head' => $validated['head'],
            'subhead' => $validated['subhead'],
            'media' => $mediaPath,
            'youtube_link' => $validated['youtube_link'] ?? null,
        ]);

        return redirect()->route('admin.construction-update-project.index')
            ->with('success', 'Record created successfully.');
    }

    public function update(Request $request, ConstructionUpdateProject $constructionUpdateProject)
    {
        $validated = $request->validate([
            'construction_update_id' => 'required|exists:construction_updates,id',
            'head.en' => 'required|string|max:255',
            'head.ar' => 'required|string|max:255',
            'subhead.en' => 'required|string|max:255',
            'subhead.ar' => 'required|string|max:255',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,mp4,mov,avi|max:20480',
            'youtube_link' => 'nullable|url|max:255',
        ]);

        $mediaPath = $constructionUpdateProject->media;

        if ($request->hasFile('media')) {
            if ($mediaPath) {
                Storage::disk('public')->delete($mediaPath);
            }
            $mediaPath = $request->file('media')->store('construction_update_projects', 'public');
        }

        $constructionUpdateProject->update([
            'construction_update_id' => $validated['construction_update_id'],
            'head' => $validated['head'],
            'subhead' => $validated['subhead'],
            'media' => $mediaPath,
            'youtube_link' => $validated['youtube_link'] ?? null,
        ]);

        return redirect()->route('admin.construction-update-project.index')
            ->with('success', 'Record updated successfully.');
    }

    public function destroy(ConstructionUpdateProject $constructionUpdateProject)
    {
        if ($constructionUpdateProject->media) {
            Storage::disk('public')->delete($constructionUpdateProject->media);
        }

        $constructionUpdateProject->delete();

        return redirect()->route('admin.construction-update-project.index')
            ->with('success', 'Record deleted successfully.');
    }
}
