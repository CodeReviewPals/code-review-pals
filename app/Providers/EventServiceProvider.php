<?php

namespace App\Providers;

use App\Models\Repository;
use App\Models\PullRequest;
use App\Observers\RepositoryObserver;
use Illuminate\Auth\Events\Registered;
use App\Observers\PullRequestObserver;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [SendEmailVerificationNotification::class],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        PullRequest::observe(PullRequestObserver::class);
        Repository::observe(RepositoryObserver::class);
    }
}
