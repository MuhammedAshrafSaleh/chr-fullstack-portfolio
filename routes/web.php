<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CoordinateController;
use App\Http\Controllers\Admin\CurrentProjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Home\HeroController;
use App\Http\Controllers\Admin\PreviousProjectController;
use App\Http\Controllers\Admin\ProfileController;
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
    Route::get('/previous_projects', [PageController::class, 'previousProjects'])->name('previous_projects');
    Route::get('/contact_us', [ContactUsController::class, 'index'])->name('contact_us');
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
    Route::resource('hero', HeroController::class);
    Route::resource('previous_projects', PreviousProjectController::class);
    Route::resource('current_projects', CurrentProjectController::class);
    Route::resource('/blogs', BlogController::class);
    Route::get('coordinates/edit', [CoordinateController::class, 'edit'])->name('coordinates.edit');
    Route::put('coordinates/update', [CoordinateController::class, 'update'])->name('coordinates.update');
});
