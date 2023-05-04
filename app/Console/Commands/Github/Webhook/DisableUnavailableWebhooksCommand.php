<?php

namespace App\Console\Commands\Github\Webhook;

use App\Jobs\Github\Webhook\DisableUnavailableWebhooksJob;
use App\Models\Webhook;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class DisableUnavailableWebhooksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'github:disable-unavailable-webhooks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'disable unavailable webhooks';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Webhook::chunk(50, function (Collection $webhooks) {
            DisableUnavailableWebhooksJob::dispatch($webhooks);
        });
    }
}
