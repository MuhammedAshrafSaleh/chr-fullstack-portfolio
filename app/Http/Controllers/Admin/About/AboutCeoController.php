<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\AboutCeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutCeoController extends Controller
{
    public function edit()
    {
        $aboutCeo = AboutCeo::firstOrFail();

        return view('admin.about.edit_ceo', compact('aboutCeo'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'paragraph_one.en' => 'required|string',
            'paragraph_one.ar' => 'required|string',
            'paragraph_two.en' => 'nullable|string',
            'paragraph_two.ar' => 'nullable|string',
            'paragraph_three.en' => 'nullable|string',
            'paragraph_three.ar' => 'nullable|string',
            'ceo_name.en' => 'required|string|max:255',
            'ceo_name.ar' => 'required|string|max:255',
            'ceo_title.en' => 'required|string|max:255',
            'ceo_title.ar' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $aboutCeo = AboutCeo::firstOrFail();

        $data = [
            'title' => $validated['title'],
            'paragraph_one' => $validated['paragraph_one'],
            'paragraph_two' => $validated['paragraph_two'] ?? null,
            'paragraph_three' => $validated['paragraph_three'] ?? null,
            'ceo_name' => $validated['ceo_name'],
            'ceo_title' => $validated['ceo_title'],
        ];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($aboutCeo->image) {
                Storage::disk('public')->delete($aboutCeo->image);
            }

            $data['image'] = $request->file('image')->store('about_ceo', 'public');
        }

        $aboutCeo->update($data);

        return redirect()->back()->with('success', 'CEO section updated successfully.');
    }
}
