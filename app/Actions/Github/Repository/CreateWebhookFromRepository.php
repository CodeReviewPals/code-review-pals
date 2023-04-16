<?php

namespace App\Actions\Github\Repository;

use Exception;
use App\Models\Webhook;
use App\Models\Repository;
use App\Actions\Github\GithubAction;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class CreateWebhookFromRepository
{
    use GithubAction;

    public function execute(Repository $repository): Model|bool
    {
        try {
            $webhookData = app(CreateWebhook::class)->execute(
                username: $repository->username,
                repository: $repository->repository,
                secret: Hash::make($repository->node_id),
            )->dtoOrFail();

            return $repository->webhooks()->save(
                new Webhook([
                    'title'   => $repository->full_name . ' hook',
                    'hook_id' => $webhookData->id,
                ]),
            );
        } catch (Exception) {
            return false;
        }
    }
}
