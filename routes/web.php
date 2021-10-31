<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/dashboard/video', function()
{
    return Inertia::render('Video');
})->name('dashboard.video.index');

Route::get('/dashboard/profile', function()
{
    return Inertia::render('Profile');
})->name('dashboard.profile.index');

Route::get('/dashboard/settings', function()
{
    return Inertia::render('Settings');
})->name('dashboard.settings.index');

require __DIR__.'/auth.php';
