<?php

namespace App\Observers;

use Exception;
use App\Models\Webhook;
use App\Models\Repository;
use App\Actions\Github\Repository\CreateWebhook;
use App\Actions\Github\Repository\DeleteWebhookFromRepository;
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
     * Handle the Repository "deleting” event to delete webhook before soft delete the repository.
     *
     * @param Repository $repository
     *
     * @return void
     */
    public function deleting(Repository $repository): void
    {
        $this->deleteWebhooks($repository);
    }

    /**
     * Handle the Repository "force deleting" event to delete webhook before deleting the repository.
     */
    public function forceDeleting(Repository $repository): void
    {
        $this->deleteWebhooks($repository);
    }

    /**
     * @param Repository $repository
     *
     * @return void
     */
    private function deleteWebhooks(Repository $repository): void
    {
        try {
            foreach ($repository->webhooks as $webhook) {
                app(DeleteWebhookFromRepository::class)->execute($webhook);
            }
        } catch (Exception $e) {
            //TODO: Issue #60
            return;
        }
    }
}
