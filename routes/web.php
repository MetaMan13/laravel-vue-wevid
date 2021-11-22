<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\VideoController;

// Dashboard imports
use App\Http\Controllers\Dashboard\ProfileController as DashboardProfileController;
use App\Http\Controllers\Dashboard\SettingsController as DashboardSettingsController;
use App\Http\Controllers\Dashboard\VideoController as DashboardVideoController;


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


/*
    Dashboard Video Routes || START
*/

Route::prefix('/dashboard/videos')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', [DashboardVideoController::class, 'index'])->name('dashboard.videos.index');
        Route::post('/', [DashboardVideoController::class, 'store'])->name('dashboard.videos.store');
        Route::get('/create', [DashboardVideoController::class, 'create'])->name('dashboard.videos.create');
        Route::get('/{video}', [DashboardVideoController::class, 'show'])->name('dashboard.videos.show');
        Route::patch('/{video}', [DashboardVideoController::class, 'update'])->name('dashboard.videos.update');
        Route::delete('/{video}', [DashboardVideoController::class, 'destroy'])->name('dashboard.videos.destroy');
        Route::get('/{video}/edit', [DashboardVideoController::class, 'edit'])->name('dashboard.videos.edit');
    });

/*
    Dashboard Video Routes || END
*/


/*
    Dashboard Profile Routes || START
*/

Route::prefix('/dashboard/profile')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', [DashboardProfileController::class, 'index'])->name('dashboard.profile.index');
        Route::post('/', [DashboardProfileController::class, 'store'])->name('dashboard.profile.store');
        Route::get('/create', [DashboardProfileController::class, 'create'])->name('dashboard.profile.create');
        Route::get('/{user}', [DashboardProfileController::class, 'show'])->name('dashboard.profile.show');
        Route::patch('/{user}', [DashboardProfileController::class, 'update'])->name('dashboard.profile.update');
        Route::delete('/{user}', [DashboardProfileController::class, 'destroy'])->name('dashboard.profile.destroy');
        Route::get('/{user}/edit', [DashboardProfileController::class, 'edit'])->name('dashboard.profile.edit');
    });

/*
    Dashboard Profile Routes || END
*/


/*
    Dashboard Settings Routes || START
*/

Route::prefix('/dashboard/settings')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', [DashboardSettingsController::class, 'index'])->name('dashboard.settings.index');
    });

/*
    Dashboard Settings Routes || END
*/

require __DIR__ . '/auth.php';
