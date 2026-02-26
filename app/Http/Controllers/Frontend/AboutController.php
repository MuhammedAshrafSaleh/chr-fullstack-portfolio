<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutCeo;
use App\Models\AboutHeading;
use App\Models\AboutNumber;
use App\Models\ChrAbout;
use App\Models\Feature;
use App\Models\Team;
use App\Models\Testimonial;

class AboutController extends Controller
{
    public function index()
    {
        $chrAbout = ChrAbout::first();
        $aboutNumbers = AboutNumber::all();
        $aboutCeo = AboutCeo::firstOrFail();
        $testimonials = Testimonial::all();
        $team = Team::all();
        $features = Feature::all();
        $aboutHeading = AboutHeading::firstOrFail();

        return view('frontend.about.about_page', compact('chrAbout', 'aboutNumbers', 'aboutCeo', 'testimonials', 'team', 'features', 'aboutHeading'));
    }
}
