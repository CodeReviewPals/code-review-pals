<?php

namespace App\DTO\Github\Repository;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class OwnerData extends Data
{
    public function __construct(
        #[MapInputName('login')] public string $userName,
        public int $id,
        public string $nodeId,
        public string $avatarUrl,
        public ?string $gravatarId
    ) {
    }
}
