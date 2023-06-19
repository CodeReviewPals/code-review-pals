<?php

namespace App\DTO\Discord;

use Spatie\LaravelData\Data;
use App\Enums\Discord\ChannelType;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Attributes\MapOutputName;

#[MapInputName(SnakeCaseMapper::class)]
#[MapOutputName(SnakeCaseMapper::class)]
class ChannelData extends Data
{
    public function __construct(
        #[MapInputName('id')]
        public string $channelId,
        public ChannelType $type,
        public string $name,
        public ?string $parentId,
        public string $guildId,
    ) {}
}
