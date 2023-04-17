<?php

namespace App\Services\Github;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use App\DTO\Github\Repository\Webhook\WebhookData;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class WebhookService
{
    public function __construct(private readonly Request $request)
    {
    }

    public function validateRequest(string $secret): void
    {
        $signature = $this->request->headers->get('X-Hub-Signature');

        if ($signature === null) {
            throw new BadRequestHttpException('X-Hub-Signature Header not set');
        }

        $signatureParts = explode('=', $signature);

        if (count($signatureParts) !== 2 && !$this->request->headers->has('X-GitHub-Event')) {
            throw new BadRequestHttpException('Signature has invalid format');
        }

        $knownSignature = hash_hmac('sha1', $this->request->getContent(), $secret);

        if (!hash_equals($knownSignature, $signatureParts[1])) {
            throw new UnauthorizedException('Could not verify request signature ' . $signatureParts[1]);
        }
    }

    public function getHandler(WebhookData $webhookData): string
    {
        return 'handle' . Str::studly(value: $this->request->header('X-GitHub-Event') . '_' . $webhookData->action);
    }
}
