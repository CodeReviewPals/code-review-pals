<?php

namespace App\Jobs;

use App\Models\User;
use App\Services\Github\PullRequestService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreatePullRequestByUrlJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected string $url, protected User $user)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        app(PullRequestService::class)->createFromUrl($this->url, $this->user);
    }
}
