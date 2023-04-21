<?php

namespace App\Observers;

use Exception;
use App\Models\Repository;
use Illuminate\Support\Facades\Bus;
use App\Jobs\Discord\Channels\CreateThreadFromRepositoryJob;
use App\Actions\Github\Repository\DeleteWebhookFromRepository;
use App\Jobs\Github\Repository\CreateWebhookFromRepositoryJob;

class RepositoryObserver
{
    /**
     * If the model is not deleted, don't restore it.
     */
    public function restoring(Repository $repository): bool
    {
        return $repository->deleted_at !== null;
    }

    /**
     * Handle the Repository "created" event.
     */
    public function created(Repository $repository): void
    {
        CreateWebhookFromRepositoryJob::dispatch($repository);

        Bus::chain([
            new CreateThreadFromRepositoryJob($repository),
            //TODO: Add first message
        ])->dispatch();
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
