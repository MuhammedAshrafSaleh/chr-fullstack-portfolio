<?php

namespace App\Http\Controllers\Admin\WebsiteLinks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nav;

class NavController extends Controller
{
    public function index()
    {
        $navs = Nav::latest()->get();
        return view('admin.website_links.nav', compact('navs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'link'     => 'required|string|max:255',
            'icon'     => 'required|string|max:255',
        ]);

        Nav::create([
            'title' => $request->title,
            'link'  => $request->link,
            'icon'  => $request->icon,
        ]);

        return redirect()->route('admin.nav.index')->with('success', 'Nav item created successfully.');
    }

    public function update(Request $request, Nav $nav)
    {
        $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'link'     => 'required|string|max:255',
            'icon'     => 'required|string|max:255',
        ]);

        $nav->update([
            'title' => $request->title,
            'link'  => $request->link,
            'icon'  => $request->icon,
        ]);

        return redirect()->route('admin.nav.index')->with('success', 'Nav item updated successfully.');
    }

    public function destroy(Nav $nav)
    {
        $nav->delete();
        return redirect()->route('admin.nav.index')->with('success', 'Nav item deleted successfully.');
    }
}
