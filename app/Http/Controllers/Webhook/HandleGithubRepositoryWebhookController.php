<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Github\WebhookService;
use App\DTO\Github\Repository\Webhook\WebhookData;

final class HandleGithubRepositoryWebhookController extends Controller
{
    public function __invoke(Request $request): mixed
    {
        $webhookService = new WebhookService($request);

        $webhookService->validateRequest(
            secret: $request->input('repository.node_id'),
        );

        $handler = $webhookService->getHandler(
            webhookData: WebhookData::from($request->all()),
        );

        if (method_exists($this, $handler)) {
            return $this->$handler($request);
        }

        return response();
    }
}
