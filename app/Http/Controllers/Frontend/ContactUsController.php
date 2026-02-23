<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coordinate;

class ContactUsController extends Controller
{
    public function index()
    {
        $coordinate = Coordinate::first();

        return view('frontend.contact.contact_page', compact('coordinate'));
    }
}
