<?php

namespace App\Http\Controllers\Admin\ConstructionUpdates;

use App\Http\Controllers\Controller;
use App\Models\ConstructionUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConstructionUpdateController extends Controller
{
    public function index()
    {
        $constructionUpdates = ConstructionUpdate::latest()->simplePaginate(10);

        return view('admin.construction_updates.index', compact('constructionUpdates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/quicktime,video/x-ms-wmv|max:51200',
        ]);

        $data = [
            'title' => $request->input('title'),
        ];

        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('construction_updates/videos', 'public');
        }

        ConstructionUpdate::create($data);

        return redirect()->route('admin.construction_updates.index')
            ->with('success', __('Construction update created successfully.'));
    }

    public function update(Request $request, ConstructionUpdate $constructionUpdate)
    {
        $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/quicktime,video/x-ms-wmv|max:51200',
        ]);

        $data = [
            'title' => $request->input('title'),
        ];

        if ($request->hasFile('video')) {
            // Delete old video
            if ($constructionUpdate->video) {
                Storage::disk('public')->delete($constructionUpdate->video);
            }
            $data['video'] = $request->file('video')->store('construction_updates/videos', 'public');
        }

        $constructionUpdate->update($data);

        return redirect()->route('admin.construction_updates.index')
            ->with('success', __('Construction update updated successfully.'));
    }

    public function destroy(ConstructionUpdate $constructionUpdate)
    {
        if ($constructionUpdate->video) {
            Storage::disk('public')->delete($constructionUpdate->video);
        }

        $constructionUpdate->delete();

        return redirect()->route('admin.construction_updates.index')
            ->with('success', __('Construction update deleted successfully.'));
    }
}
