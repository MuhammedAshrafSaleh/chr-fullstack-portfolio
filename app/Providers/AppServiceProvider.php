<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\ContactLocations;
use App\Models\FixedLink;
use App\Models\FooterSection;
use App\Models\Nav;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('navItems', Nav::all());
        View::share('footerSection', FooterSection::first());
        View::share('fixedLinks', FixedLink::first());
        View::share('contacts', Contact::all());
        View::share('socialMediaLinks', SocialMedia::all());
        View::share('contactLocations', ContactLocations::first());
    }
}
