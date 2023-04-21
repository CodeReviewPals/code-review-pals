<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\PullRequest;
use App\Models\Repository;
use App\Policies\PullRequestPolicy;
use App\Policies\RepositoryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        PullRequest::class => PullRequestPolicy::class,
        Repository::class => RepositoryPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
