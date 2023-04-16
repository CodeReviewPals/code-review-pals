<?php

use App\Http\Controllers\Webhook\HandleGithubRepositoryWebhookController;

Route::group(
    [
        'prefix' => 'github',
        'as' => 'github.',
    ],
    function () {
        Route::post('repository', HandleGithubRepositoryWebhookController::class)->name('repository');
    }
);
