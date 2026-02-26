<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutHome;
use App\Models\Blog;
use App\Models\ConstructionUpdate;
use App\Models\ConstructionUpdateProject;
use App\Models\ContactLocations;
use App\Models\CurrentProject;
use App\Models\Hero;
use App\Models\PreviousProject;

class PageController extends Controller
{
    public function home()
    {
        $blogs = Blog::whereNotNull('published_at')
            ->latest('published_at')
            ->take(3)
            ->get();
        $aboutHome = AboutHome::firstOrFail();
        $hero = Hero::first();
        $contactLocations = ContactLocations::firstOrFail();
        $currentProjects = CurrentProject::latest()->get();

        return view('frontend.home.home', compact('blogs', 'aboutHome', 'hero', 'contactLocations', 'currentProjects'));
    }

    public function previousProjects()
    {
        $projects = PreviousProject::latest()->get();

        return view('frontend.previous_projects.previous_projects', compact('projects'));
    }

    public function currentProjects()
    {
        $currentProjects = CurrentProject::latest()->get();

        return view('frontend.current_projects.current_projects', compact('currentProjects'));
    }

    // Blog Listing
    public function blog()
    {
        $blogs = Blog::whereNotNull('published_at')
            ->latest('published_at')
            ->get();

        return view('frontend.blog.blogs', compact('blogs'));
    }

    public function blogSingle($id)
    {
        $blog = Blog::whereNotNull('published_at')
            ->findOrFail($id);

        return view('frontend.blog.blog', compact('blog'));
    }

    public function constructionUpdates()
    {
        $constructionUpdates = ConstructionUpdate::with('projects')->latest()->get();

        return view('frontend.construction_updates.construction_updates', compact('constructionUpdates'));
    }

    public function show($id)
    {
        $constructionUpdate = ConstructionUpdate::findOrFail($id);

        $projects = ConstructionUpdateProject::where('construction_update_id', $id)
            ->latest()
            ->get();

        return view('frontend.construction_updates.construction_updates_project', compact('constructionUpdate', 'projects'));
    }

    public function constructionUpdatesShow($id)
    {
        $constructionUpdate = ConstructionUpdate::findOrFail($id);
        $projects = ConstructionUpdateProject::where('construction_update_id', $id)->get();

        return view('frontend.construction_updates.construction_updates_project', compact('constructionUpdate', 'projects'));
    }
}
