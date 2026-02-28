<?php

namespace App\Http\Controllers\Admin\WebsiteLinks;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocialMediaController extends Controller
{
      public function index()
    {
        $socialMedias = SocialMedia::latest()->get();
        return view('admin.website_links.social_media', compact('socialMedias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'link'     => 'required|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('social_media', 'public');

        SocialMedia::create([
            'image' => $imagePath,
            'title' => $request->input('title'),
            'link'  => $request->input('link'),
        ]);

        return redirect()->route('admin.social_media.index')
            ->with('success', 'Social media created successfully.');
    }

    public function update(Request $request, SocialMedia $socialMedia)
    {
        $request->validate([
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'link'     => 'required|string|max:255',
        ]);

        $data = [
            'title' => $request->input('title'),
            'link'  => $request->input('link'),
        ];

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($socialMedia->image);
            $data['image'] = $request->file('image')->store('social_media', 'public');
        }

        $socialMedia->update($data);

        return redirect()->route('admin.social_media.index')
            ->with('success', 'Social media updated successfully.');
    }

    public function destroy(SocialMedia $socialMedia)
    {
        Storage::disk('public')->delete($socialMedia->image);
        $socialMedia->delete();

        return redirect()->route('admin.social_media.index')
            ->with('success', 'Social media deleted successfully.');
    }
}
