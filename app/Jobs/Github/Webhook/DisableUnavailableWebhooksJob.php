<?php

namespace App\Jobs\Github\Webhook;

use App\Actions\Github\Webhook\FetchWebhook;
use App\Models\Webhook;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Database\Eloquent\Collection;

class DisableUnavailableWebhooksJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @param Collection<Webhook>|null $repositories
     */
    public function __construct(public ?Collection $webhooks = null)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->webhooks as $webhook) {
            $this->disableIfWebhookIsUnavailable($webhook);
        }
    }

    public function disableIfWebhookIsUnavailable(Webhook $webhook)
    {
        try {
            /** @var \App\DTO\Github\Repository\Webhook\WebhookCreatedData $webhookData */
            $webhookData = app(FetchWebhook::class)
                ->execute($webhook, $webhook->webhookable)
                ->dtoOrFail();
            if (!$webhookData->active) {
                throw new Exception('webhook is not active');
            }
        } catch (\Throwable $th) {
            $webhook->delete();
        }
    }
}
