<?php

namespace App\DTO;

use App\DTO\Github\Repository\OwnerData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Attributes\MapOutputName;

#[MapInputName(SnakeCaseMapper::class)]
#[MapOutputName(SnakeCaseMapper::class)]
class RepositoryData extends Data
{
    public function __construct(
        public string $nodeId,
        public string $fullName,
        public ?string $description,
        public ?string $language,
        public string $htmlUrl,
        public array $topics,
        public OwnerData $owner
    ) {
    }
}
