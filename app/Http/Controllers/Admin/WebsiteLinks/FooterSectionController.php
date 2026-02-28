<?php

namespace App\Http\Controllers\Admin\WebsiteLinks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class FooterSectionController extends Controller
{
    public function edit(): View
    {
        $footerSection = FooterSection::firstOrFail();

        return view('admin.website_links.footer_section', compact('footerSection'));
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message.en' => 'required|string|max:500',
            'message.ar' => 'required|string|max:500',
            'rights.en' => 'required|string|max:255',
            'rights.ar' => 'required|string|max:255',
            'policy_title.en' => 'required|string|max:255',
            'policy_title.ar' => 'required|string|max:255',
            'policy_link' => 'required|string|max:255',
            'terms_title.en' => 'required|string|max:255',
            'terms_title.ar' => 'required|string|max:255',
            'terms_link' => 'required|string|max:255',
        ]);

        $footerSection = FooterSection::firstOrFail();

        $footerSection->update($validated);

        return redirect()->route('admin.footer_section.edit')
            ->with('success', 'Footer section updated successfully.');
    }
}
