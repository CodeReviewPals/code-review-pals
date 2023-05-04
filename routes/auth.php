<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SocialiteController;

Route::middleware('guest')->group(function () {
    Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect'])->name(
        'socialite.redirect'
    );

    Route::get('/auth/callback/{provider}', [SocialiteController::class, 'callback'])->name(
        'socialite.callback'
    );
});

Route::middleware('auth')->group(function () {
    Route::post('logout', LogoutController::class)->name('logout');
});
