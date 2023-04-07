<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum', 'api'])->prefix('/dashboard')->name("dashboard.")->group(function () {
    Route::get('/third-party-repo-list/{provider}', \App\Http\Controllers\Dashboard\API\ThirdPartyRepositoriesListController::class)->name("third-party-repo-list");
});
