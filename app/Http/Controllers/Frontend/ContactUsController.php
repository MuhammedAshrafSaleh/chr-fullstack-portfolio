<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ClientRequest;
use App\Models\Coordinate;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $coordinate = Coordinate::first();

        return view('frontend.contact.contact_page', compact('coordinate'));
    }

    public function store(Request $request)
    {
        // ✅ 1. Strict validation — only expected fields, strict formats
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'telephone' => ['required', 'string', 'max:50', 'regex:/^[0-9\+\-\s\(\)]+$/'],
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'preferred_date' => 'required|date|after_or_equal:today',
            'role' => 'required|in:CEO,Manager,Developer,Designer,Other',
            'preferred_time' => 'required|date_format:H:i',
        ]);

        // ✅ 2. Strip any HTML or JS tags from all string fields
        foreach ($validated as $key => $value) {
            if (is_string($value)) {
                $validated[$key] = strip_tags($value);
            }
        }

        // ✅ 3. Only whitelisted $validated array goes to DB — no mass assignment risk
        ClientRequest::create($validated);

        return response()->json([
            'message' => __('app.form_success'),
        ], 201);
    }
}
