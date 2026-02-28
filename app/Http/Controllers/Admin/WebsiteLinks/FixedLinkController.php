<?php

namespace App\Http\Controllers\Admin\WebsiteLinks;

use App\Http\Controllers\Controller;
use App\Models\FixedLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class FixedLinkController extends Controller
{
    public function edit()
    {
        $fixedLink = FixedLink::firstOrFail();

        return view('admin.website_links.fixed_links', compact('fixedLink'));
    }

    public function update(Request $request)
    {
        $fixedLink = FixedLink::firstOrFail();

        $request->validate([
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'logo_link' => 'required|string|max:255',
            'whatsapp_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'whatsapp_link' => 'required|string|max:255',
            'location_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'location_link' => 'required|string|max:255',
            'hotline_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'hotline_link' => 'required|string|max:255',
        ]);

        $data = [
            'logo_link' => $request->logo_link,
            'whatsapp_link' => $request->whatsapp_link,
            'location_link' => $request->location_link,
            'hotline_link' => $request->hotline_link,
        ];

        $imageFields = ['logo_image', 'whatsapp_image', 'location_image', 'hotline_image'];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                Storage::disk('public')->delete($fixedLink->$field);
                $data[$field] = $request->file($field)->store('fixed_links', 'public');
            }
        }

        $fixedLink->update($data);

        return redirect()->back()->with('success', __('Fixed Links updated successfully.'));
    }
}
