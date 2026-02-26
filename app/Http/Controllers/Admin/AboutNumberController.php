<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutNumber;
use Illuminate\Http\Request;

class AboutNumberController extends Controller
{
    public function index()
    {
        $aboutNumbers = AboutNumber::latest()->simplePaginate(10);

        return view('admin.about.about_numbers', compact('aboutNumbers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|string|max:50',
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'subtitle.en' => 'required|string|max:500',
            'subtitle.ar' => 'required|string|max:500',
        ]);

        AboutNumber::create([
            'number' => $request->number,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
        ]);

        return redirect()->route('admin.about_numbers.index')
            ->with('success', __('Record created successfully.'));
    }

    public function update(Request $request, AboutNumber $about_number)
    {
        $request->validate([
            'number' => 'required|string|max:50',
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'subtitle.en' => 'required|string|max:500',
            'subtitle.ar' => 'required|string|max:500',
        ]);

        $about_number->update([
            'number' => $request->number,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
        ]);

        return redirect()->route('admin.about_numbers.index')
            ->with('success', __('Record updated successfully.'));
    }

    public function destroy(AboutNumber $about_number)
    {
        $about_number->delete();

        return redirect()->route('admin.about_numbers.index')
            ->with('success', __('Record deleted successfully.'));
    }
}
