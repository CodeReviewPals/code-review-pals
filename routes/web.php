<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

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
        'canLogin'       => Route::has('login') && !Auth::check(),
        'laravelVersion' => Application::VERSION,
        'phpVersion'     => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])->name("dashboard.")->prefix("/dashboard")->group(function () {
    Route::get('/', \App\Http\Controllers\Dashboard\DashboardController::class)->name("index");
    Route::resources([
        'repository' => \App\Http\Controllers\Dashboard\RepositoryController::class,
    ]);
});

require __DIR__ . '/auth.php';
