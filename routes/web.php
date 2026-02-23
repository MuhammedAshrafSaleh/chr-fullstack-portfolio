<?php

use App\Http\Controllers\Admin\CoordinateController;
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

Route::get('/blogs', function () {
    return view('frontend.blog.blog_page');
});

// ── Frontend ────────────────────────────────────────────
Route::group(['as' => 'frontend.'], function () {
    Route::get('/previous_projects', [PageController::class, 'previousProjects'])->name('previous_projects');
    Route::get('/contact_us', [ContactUsController::class, 'index'])->name('contact');
    // باقي الـ frontend routes هنا
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
    Route::get('coordinates/edit', [CoordinateController::class, 'edit'])->name('coordinates.edit');
    Route::put('coordinates/update', [CoordinateController::class, 'update'])->name('coordinates.update');
});
