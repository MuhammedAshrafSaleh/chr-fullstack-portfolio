<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutHeading;
use Illuminate\Http\Request;

class AboutHeadingController extends Controller
{
    public function edit()
    {
        $aboutHeading = AboutHeading::firstOrFail();

        return view('admin.about.about_headings', compact('aboutHeading'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'about_numbers_title.en' => 'required|string|max:255',
            'about_numbers_title.ar' => 'required|string|max:255',
            'about_numbers_subtitle.en' => 'nullable|string|max:255',
            'about_numbers_subtitle.ar' => 'nullable|string|max:255',
            'testimonials_title.en' => 'required|string|max:255',
            'testimonials_title.ar' => 'required|string|max:255',
            'testimonials_subtitle.en' => 'nullable|string|max:255',
            'testimonials_subtitle.ar' => 'nullable|string|max:255',
            'about_ceo_title.en' => 'required|string|max:255',
            'about_ceo_title.ar' => 'required|string|max:255',
            'about_ceo_subtitle.en' => 'nullable|string|max:255',
            'about_ceo_subtitle.ar' => 'nullable|string|max:255',
            'features_title.en' => 'required|string|max:255',
            'features_title.ar' => 'required|string|max:255',
            'features_subtitle.en' => 'nullable|string|max:255',
            'features_subtitle.ar' => 'nullable|string|max:255',
            'team_title.en' => 'required|string|max:255',
            'team_title.ar' => 'required|string|max:255',
            'team_subtitle.en' => 'nullable|string|max:255',
            'team_subtitle.ar' => 'nullable|string|max:255',
        ]);

        $aboutHeading = AboutHeading::firstOrFail();

        $aboutHeading->update([
            'about_numbers_title' => $request->input('about_numbers_title'),
            'about_numbers_subtitle' => $request->input('about_numbers_subtitle'),
            'testimonials_title' => $request->input('testimonials_title'),
            'testimonials_subtitle' => $request->input('testimonials_subtitle'),
            'about_ceo_title' => $request->input('about_ceo_title'),
            'about_ceo_subtitle' => $request->input('about_ceo_subtitle'),
            'features_title' => $request->input('features_title'),
            'features_subtitle' => $request->input('features_subtitle'),
            'team_title' => $request->input('team_title'),
            'team_subtitle' => $request->input('team_subtitle'),
        ]);

        return redirect()->back()->with('success', __('About Headings updated successfully.'));
    }
}
