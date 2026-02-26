<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\ChrAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChrAboutController extends Controller
{
    public function edit()
    {
        $chrAbout = ChrAbout::firstOrFail();

        return view('admin.about.edit_about', compact('chrAbout'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'eyebrow.en' => 'required|string|max:255',
            'eyebrow.ar' => 'required|string|max:255',
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'paragraph_one.en' => 'required|string',
            'paragraph_one.ar' => 'required|string',
            'paragraph_two.en' => 'nullable|string',
            'paragraph_two.ar' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $chrAbout = ChrAbout::firstOrFail();

        $data = [
            'eyebrow' => $request->input('eyebrow'),
            'title' => $request->input('title'),
            'paragraph_one' => $request->input('paragraph_one'),
            'paragraph_two' => $request->input('paragraph_two'),
        ];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($chrAbout->image) {
                Storage::disk('public')->delete($chrAbout->image);
            }

            $data['image'] = $request->file('image')->store('chr_about', 'public');
        }

        $chrAbout->update($data);

        return redirect()->route('admin.chr_about.edit')->with('success', 'About section updated successfully.');
    }
}
