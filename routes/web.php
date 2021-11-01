<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\VideoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard/video', function()
// {
//     return Inertia::render('Video');
// })->name('dashboard.video.index');

/*
    Dashboard Video Routes || START
*/

    Route::prefix('/dashboard/videos')
        ->middleware(['auth'])
        ->group(function()
        {
            Route::get('/', [VideoController::class, 'index'])->name('dashboard.videos.index');
            Route::post('/', [VideoController::class, 'store'])->name('dashboard.videos.store');
            Route::get('/create', [VideoController::class, 'create'])->name('dashboard.videos.create');
            Route::get('/{video}', [VideoController::class, 'show'])->name('dashboard.videos.show');
            Route::patch('/{video}', [VideoController::class, 'update'])->name('dashboard.videos.update');
            Route::delete('/{video}', [VideoController::class, 'destroy'])->name('dashboard.videos.destroy');
            Route::get('/{video}/edit', [VideoController::class, 'edit'])->name('dashboard.videos.edit');
        });

/*
    Dashboard Video Routes || END
*/

Route::get('/dashboard/profile', function()
{
    return Inertia::render('Profile');
})->name('dashboard.profile.index');

Route::get('/dashboard/settings', function()
{
    return Inertia::render('Settings');
})->name('dashboard.settings.index');

require __DIR__.'/auth.php';
