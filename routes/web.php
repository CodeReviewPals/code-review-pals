<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\PullRequestController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\API\ThirdPartyRepositoriesController;

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
        'canLogin' => Route::has('login') && !Auth::check(),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(
    [
        'middleware' => ['auth'],
    ],
    static function () {
        Route::get('/dashboard', DashboardController::class)->name('dashboard');

        Route::resource('repositories', RepositoryController::class)->only(['index', 'store']);

    Route::resource('pull-requests', PullRequestController::class)
        ->only(['index', 'create', 'store']);

    Route::get('third-party-repositories', ThirdPartyRepositoriesController::class)
        ->name('third-party-repositories.index');
});

require __DIR__ . '/auth.php';
