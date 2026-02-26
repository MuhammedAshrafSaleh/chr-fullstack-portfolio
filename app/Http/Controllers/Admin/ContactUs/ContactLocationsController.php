<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Http\Controllers\Controller;
use App\Models\ContactLocations;
use Illuminate\Http\Request;

class ContactLocationsController extends Controller
{
    public function edit()
    {
        $contactLocations = ContactLocations::firstOrFail();

        return view('admin.contact_us.edit_contact_locations', compact('contactLocations'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'location_one_title.en' => 'required|string|max:255',
            'location_one_title.ar' => 'required|string|max:255',
            'location_one_address_one.en' => 'required|string|max:255',
            'location_one_address_one.ar' => 'required|string|max:255',
            'location_one_address_two.en' => 'nullable|string|max:255',
            'location_one_address_two.ar' => 'nullable|string|max:255',
            'location_one_address_three.en' => 'nullable|string|max:255',
            'location_one_address_three.ar' => 'nullable|string|max:255',
            'location_one_navigate_url' => 'nullable|url|max:2048',

            'location_two_title.en' => 'required|string|max:255',
            'location_two_title.ar' => 'required|string|max:255',
            'location_two_address_one.en' => 'required|string|max:255',
            'location_two_address_one.ar' => 'required|string|max:255',
            'location_two_address_two.en' => 'nullable|string|max:255',
            'location_two_address_two.ar' => 'nullable|string|max:255',
            'location_two_address_three.en' => 'nullable|string|max:255',
            'location_two_address_three.ar' => 'nullable|string|max:255',
            'location_two_navigate_url' => 'nullable|url|max:2048',

            'phone' => 'required|string|max:50',
        ]);

        $contactLocations = ContactLocations::firstOrFail();

        $contactLocations->update([
            'location_one_title' => $validated['location_one_title'],
            'location_one_address_one' => $validated['location_one_address_one'],
            'location_one_address_two' => $validated['location_one_address_two'] ?? null,
            'location_one_address_three' => $validated['location_one_address_three'] ?? null,
            'location_one_navigate_url' => $validated['location_one_navigate_url'] ?? null,

            'location_two_title' => $validated['location_two_title'],
            'location_two_address_one' => $validated['location_two_address_one'],
            'location_two_address_two' => $validated['location_two_address_two'] ?? null,
            'location_two_address_three' => $validated['location_two_address_three'] ?? null,
            'location_two_navigate_url' => $validated['location_two_navigate_url'] ?? null,

            'phone' => $validated['phone'],
        ]);

        return redirect()->route('admin.contact_locations.edit')
            ->with('success', 'Contact locations updated successfully.');
    }
}
