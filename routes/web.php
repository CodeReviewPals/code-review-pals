<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\PullRequestController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\API\ThirdPartyRepositoriesController;
use App\Http\Controllers\HomeController;

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

Route::get('/', HomeController::class)->name('home');

Route::group(
    [
        'middleware' => ['auth'],
    ],
    static function () {
        Route::get('/dashboard', DashboardController::class)->name('dashboard');

        Route::resource('repositories', RepositoryController::class)->only([
            'index',
            'store',
            'destroy',
        ]);

        Route::resource('pull-requests', PullRequestController::class)->only([
            'index',
            'create',
            'store',
            'destroy',
        ]);

        Route::get('third-party-repositories', ThirdPartyRepositoriesController::class)->name(
            'third-party-repositories.index'
        );
    }
);

require __DIR__ . '/auth.php';
