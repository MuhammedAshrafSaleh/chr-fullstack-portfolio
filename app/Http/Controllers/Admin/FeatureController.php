<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::latest()->simplePaginate(10);

        return view('admin.about.features', compact('features'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'desc.en' => 'required|string|max:1000',
            'desc.ar' => 'required|string|max:1000',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = [
            'title' => $request->input('title'),
            'desc' => $request->input('desc'),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('features', 'public');
        }

        Feature::create($data);

        return redirect()->route('admin.features.index')
            ->with('success', __('Feature created successfully.'));
    }

    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'desc.en' => 'required|string|max:1000',
            'desc.ar' => 'required|string|max:1000',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = [
            'title' => $request->input('title'),
            'desc' => $request->input('desc'),
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($feature->image) {
                Storage::disk('public')->delete($feature->image);
            }
            $data['image'] = $request->file('image')->store('features', 'public');
        }

        $feature->update($data);

        return redirect()->route('admin.features.index')
            ->with('success', __('Feature updated successfully.'));
    }

    public function destroy(Feature $feature)
    {
        if ($feature->image) {
            Storage::disk('public')->delete($feature->image);
        }

        $feature->delete();

        return redirect()->route('admin.features.index')
            ->with('success', __('Feature deleted successfully.'));
    }
}
