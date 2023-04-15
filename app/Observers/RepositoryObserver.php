<?php

namespace App\Observers;

use Exception;
use App\Models\Webhook;
use App\Models\Repository;
use App\Actions\Github\Repository\CreateWebhook;
use App\DTO\Github\Repository\Webhook\WebhookCreatedData;

class RepositoryObserver
{
    /**
     * Handle the Repository "created" event.
     */
    public function created(Repository $repository): void
    {
        try {
            /** @var WebhookCreatedData $webhookData */
            $webhookData = app(CreateWebhook::class)->execute($repository)->dtoOrFail();

            $repository
                ->webhooks()
                ->save(
                    new Webhook([
                        'title'   => $repository->full_name . ' hook',
                        'hook_id' => $webhookData->id,
                    ]),
                );
        } catch (Exception $e) {
            return;
        }
    }

    /**
     * Handle the Repository "force deleted" event.
     */
    public function forceDeleted(Repository $repository): void
    {
        // TODO: Delete webhook
    }
}
