<?php

namespace App\DTO\Github\Repository\Webhook;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Attributes\MapOutputName;

#[MapInputName(SnakeCaseMapper::class)]
#[MapOutputName(SnakeCaseMapper::class)]
class WebhookCreatedData extends Data
{
    public function __construct(public int $id)
    {
    }
}
