<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\AboutHome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutHomeController extends Controller
{
    public function edit()
    {
        $aboutHome = AboutHome::firstOrFail();

        return view('admin.home.about.index', compact('aboutHome'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'section_label.en' => 'required|string|max:255',
            'section_label.ar' => 'required|string|max:255',
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'description.en' => 'required|string',
            'description.ar' => 'required|string',
            'years_count' => 'required|integer|min:0',
            'years_label.en' => 'required|string|max:255',
            'years_label.ar' => 'required|string|max:255',
            'projects_count' => 'required|integer|min:0',
            'projects_label.en' => 'required|string|max:255',
            'projects_label.ar' => 'required|string|max:255',
            'workers_count' => 'required|integer|min:0',
            'workers_label.en' => 'required|string|max:255',
            'workers_label.ar' => 'required|string|max:255',
            'feature_one.en' => 'required|string|max:255',
            'feature_one.ar' => 'required|string|max:255',
            'feature_two.en' => 'required|string|max:255',
            'feature_two.ar' => 'required|string|max:255',
            'feature_three.en' => 'required|string|max:255',
            'feature_three.ar' => 'required|string|max:255',
            'feature_four.en' => 'nullable|string|max:255',
            'feature_four.ar' => 'nullable|string|max:255',
            'feature_five.en' => 'nullable|string|max:255',
            'feature_five.ar' => 'nullable|string|max:255',
            'image_right' => 'nullable|image|max:2048',
            'image_left' => 'nullable|image|max:2048',
        ]);

        $aboutHome = AboutHome::firstOrFail();

        $data = $request->only([
            'section_label',
            'title',
            'description',
            'years_count',
            'years_label',
            'projects_count',
            'projects_label',
            'workers_count',
            'workers_label',
            'feature_one',
            'feature_two',
            'feature_three',
            'feature_four',
            'feature_five',
        ]);

        // Handle image_right upload
        if ($request->hasFile('image_right')) {
            if ($aboutHome->image_right) {
                Storage::disk('public')->delete($aboutHome->image_right);
            }
            $data['image_right'] = $request->file('image_right')->store('about_home', 'public');
        }

        // Handle image_left upload
        if ($request->hasFile('image_left')) {
            if ($aboutHome->image_left) {
                Storage::disk('public')->delete($aboutHome->image_left);
            }
            $data['image_left'] = $request->file('image_left')->store('about_home', 'public');
        }

        $aboutHome->update($data);

        return redirect()->back()->with('success', 'About Home section updated successfully.');
    }
}
