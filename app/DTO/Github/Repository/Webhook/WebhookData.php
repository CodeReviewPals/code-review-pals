<?php

namespace App\DTO\Github\Repository\Webhook;

use App\DTO\UserData;
use Spatie\LaravelData\Data;
use App\DTO\Github\Repository\OwnerData;
use App\DTO\Github\Repository\RepositoryData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Attributes\MapOutputName;

#[MapInputName(SnakeCaseMapper::class)]
#[MapOutputName(SnakeCaseMapper::class)]
class WebhookData extends Data
{
    public function __construct(
        public string $action,
        public RepositoryData $repository,
        public ?OwnerData $sender
    ) {
    }
}
