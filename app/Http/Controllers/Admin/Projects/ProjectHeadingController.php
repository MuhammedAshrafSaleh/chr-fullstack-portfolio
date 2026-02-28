<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectHeading;  
class ProjectHeadingController extends Controller
{
    public function edit()
    {
        $projectHeading = ProjectHeading::firstOrFail();

        return view('admin.projects.project_headings', compact('projectHeading'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'details_heading.en'     => 'required|string|max:255',
            'details_heading.ar'     => 'required|string|max:255',
            'details_subheading.en'  => 'required|string|max:255',
            'details_subheading.ar'  => 'required|string|max:255',
            'images_heading.en'      => 'required|string|max:255',
            'images_heading.ar'      => 'required|string|max:255',
            'images_subheading.en'   => 'required|string|max:255',
            'images_subheading.ar'   => 'required|string|max:255',
            'services_heading.en'    => 'required|string|max:255',
            'services_heading.ar'    => 'required|string|max:255',
            'services_subheading.en' => 'required|string|max:255',
            'services_subheading.ar' => 'required|string|max:255',
            'plans_heading.en'       => 'required|string|max:255',
            'plans_heading.ar'       => 'required|string|max:255',
            'plans_subheading.en'    => 'required|string|max:255',
            'plans_subheading.ar'    => 'required|string|max:255',
            'location_heading.en'    => 'required|string|max:255',
            'location_heading.ar'    => 'required|string|max:255',
            'location_subheading.en' => 'required|string|max:255',
            'location_subheading.ar' => 'required|string|max:255',
        ]);

        $projectHeading = ProjectHeading::firstOrFail();

        $projectHeading->update([
            'details_heading'     => $request->input('details_heading'),
            'details_subheading'  => $request->input('details_subheading'),
            'images_heading'      => $request->input('images_heading'),
            'images_subheading'   => $request->input('images_subheading'),
            'services_heading'    => $request->input('services_heading'),
            'services_subheading' => $request->input('services_subheading'),
            'plans_heading'       => $request->input('plans_heading'),
            'plans_subheading'    => $request->input('plans_subheading'),
            'location_heading'    => $request->input('location_heading'),
            'location_subheading' => $request->input('location_subheading'),
        ]);

        return redirect()->route('project_headings.edit')
            ->with('success', 'Project headings updated successfully.');
    }
}
