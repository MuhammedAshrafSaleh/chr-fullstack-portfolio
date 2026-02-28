<?php

use App\Http\Controllers\Admin\About\AboutCeoController;
use App\Http\Controllers\Admin\About\AboutHeadingController;
use App\Http\Controllers\Admin\About\AboutNumberController;
use App\Http\Controllers\Admin\About\ChrAboutController;
use App\Http\Controllers\Admin\About\FeatureController;
use App\Http\Controllers\Admin\About\TeamController;
use App\Http\Controllers\Admin\About\TestimonialController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ConstructionUpdates\ConstructionUpdateController;
use App\Http\Controllers\Admin\ConstructionUpdates\ConstructionUpdateProjectController;
use App\Http\Controllers\Admin\ContactUs\ClientRequestController;
use App\Http\Controllers\Admin\ContactUs\ContactLocationsController;
use App\Http\Controllers\Admin\ContactUs\CoordinateController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Home\AboutHomeController;
use App\Http\Controllers\Admin\Home\HeroController;
use App\Http\Controllers\Admin\PreviousProjectController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\Projects\CurrentProjectController;
use App\Http\Controllers\Admin\Projects\ProjectController;
use App\Http\Controllers\Admin\Projects\ProjectDetailController;
use App\Http\Controllers\Admin\Projects\ProjectHeadingController;
use App\Http\Controllers\Admin\Projects\ProjectImageController;
use App\Http\Controllers\Admin\Projects\ProjectPlanController;
use App\Http\Controllers\Admin\Projects\ProjectServiceController;
use App\Http\Controllers\Admin\WebsiteLinks\FooterSectionController;
use App\Http\Controllers\Admin\WebsiteLinks\NavController;
use App\Http\Controllers\Admin\WebsiteLinks\ContactController;
use App\Http\Controllers\Admin\WebsiteLinks\SocialMediaController;  
use App\Http\Controllers\Admin\WebsiteLinks\FixedLinkController;  
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.home.home');
});

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
    }

    return redirect()->back();
})->name('lang.switch');

// ── Frontend ────────────────────────────────────────────
Route::group(['as' => 'frontend.'], function () {
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/construction_updates', [PageController::class, 'constructionUpdates'])->name('construction_updates');
    Route::get('/construction-updates/{id}', [PageController::class, 'constructionUpdatesShow'])->name('construction-updates');
    Route::get('/previous_projects', [PageController::class, 'previousProjects'])->name('previous_projects');
    Route::get('/contact_us', [ContactUsController::class, 'index'])->name('contact_us');
    Route::post('/clients-requests', [ContactUsController::class, 'store'])->name('clients-requests.store')->middleware('throttle:5,1');
    Route::get('/current_projects', [PageController::class, 'currentProjects'])->name('current_projects');
    Route::get('/blogs', [PageController::class, 'blog'])->name('blogs');
    Route::get('/blog/{id}', [PageController::class, 'blogSingle'])->name('blog.single');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'password_update'])->name('password.update');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('about_numbers', AboutNumberController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('previous_projects', PreviousProjectController::class);
    Route::resource('current_projects', CurrentProjectController::class);
    Route::resource('construction-update-project', ConstructionUpdateProjectController::class);
    Route::resource('project_services', ProjectServiceController::class);
    Route::resource('features', FeatureController::class);
    Route::resource('clients_requests', ClientRequestController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('project_images', ProjectImageController::class);
    Route::resource('project_plans', ProjectPlanController::class);
    Route::resource('project_details', ProjectDetailController::class);
    Route::resource('nav', NavController::class);
    Route::resource('social_media', SocialMediaController::class);
    Route::resource('contacts', ContactController::class);
    Route::get('fixed_links/edit',    [FixedLinkController::class, 'edit'])->name('fixed_links.edit');
    Route::put('fixed_links/update',  [FixedLinkController::class, 'update'])->name('fixed_links.update');
    Route::get('project_headings/edit', [ProjectHeadingController::class, 'edit'])->name('project_headings.edit');
    Route::put('project_headings/update', [ProjectHeadingController::class, 'update'])->name('project_headings.update');
    Route::get('footer_section/edit', [FooterSectionController::class, 'edit'])->name('footer_section.edit');
    Route::put('footer_section/update', [FooterSectionController::class, 'update'])->name('footer_section.update');
    Route::resource('construction_updates', ConstructionUpdateController::class);
    Route::resource('team', TeamController::class);
    Route::resource('/blogs', BlogController::class);
    Route::get('coordinates/edit', [CoordinateController::class, 'edit'])->name('coordinates.edit');
    Route::put('coordinates/update', [CoordinateController::class, 'update'])->name('coordinates.update');
    Route::get('chr_about/edit', [ChrAboutController::class, 'edit'])->name('chr_about.edit');
    Route::put('chr_about/update', [ChrAboutController::class, 'update'])->name('chr_about.update');
    Route::get('about_ceo/edit', [AboutCeoController::class, 'edit'])->name('about_ceo.edit');
    Route::put('about_ceo/update', [AboutCeoController::class, 'update'])->name('about_ceo.update');
    Route::get('about_headings/edit', [AboutHeadingController::class, 'edit'])->name('about_headings.edit');
    Route::put('about_headings/update', [AboutHeadingController::class, 'update'])->name('about_headings.update');
    Route::get('about_home/edit', [AboutHomeController::class, 'edit'])->name('about_home.edit');
    Route::put('about_home/update', [AboutHomeController::class, 'update'])->name('about_home.update');
    Route::get('hero/edit', [HeroController::class, 'edit'])->name('hero.edit');
    Route::put('hero/update', [HeroController::class, 'update'])->name('hero.update');
    Route::get('contact_locations/edit', [ContactLocationsController::class, 'edit'])
        ->name('contact_locations.edit');
    Route::put('contact_locations/update', [ContactLocationsController::class, 'update'])
        ->name('contact_locations.update');
});
