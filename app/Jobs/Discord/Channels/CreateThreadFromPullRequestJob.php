<?php

namespace App\Jobs\Discord\Channels;

use App\Actions\Channel\GetOrCreateAChannelByPullRequestAction;
use App\Actions\Discord\CreateThreadFromPullRequest;
use App\Models\Repository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Enums\Discord\ChannelType;
use App\Models\Channel;
use App\Models\PullRequest;

class CreateThreadFromPullRequestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected PullRequest $pullRequest)
    {
    }

    /**
     *
     * Steps :
     * 1- main category of PR (Main language of the PR or Repository) x
     * 2- find or make the channel of the main language x
     * 3- prepare tags : [Topics, Languages]
     * 4- create the thread on the forum
     *
     * Execute the job.
     */
    public function handle(): void
    {
        /** @var \App\Models\Channel */
        $channel = app(GetOrCreateAChannelByPullRequestAction::class)->execute($this->pullRequest);

        app(CreateThreadFromPullRequest::class)->execute($this->pullRequest, $channel);
    }
}
