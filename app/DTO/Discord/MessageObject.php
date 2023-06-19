<?php

namespace App\DTO\Discord;

use Spatie\LaravelData\Data;
use App\Enums\Discord\ChannelType;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Attributes\MapOutputName;

#[MapInputName(SnakeCaseMapper::class)]
#[MapOutputName(SnakeCaseMapper::class)]
class MessageObject extends Data
{
    public function __construct(public string $content, public ?array $embeds = null)
    {
    }
}
