<?php

namespace App\Http\Controllers\Admin\WebsiteLinks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
     public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.website_links.contacts', compact('contacts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'link'     => 'required|string|max:255',
        ]);

        Contact::create([
            'title' => $request->input('title'),
            'link'  => $request->input('link'),
        ]);

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact created successfully.');
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'link'     => 'required|string|max:255',
        ]);

        $contact->update([
            'title' => $request->input('title'),
            'link'  => $request->input('link'),
        ]);

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact deleted successfully.');
    }
}
