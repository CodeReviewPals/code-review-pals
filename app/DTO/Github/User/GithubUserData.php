<?php

namespace App\DTO\Github\User;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

#[MapInputName(SnakeCaseMapper::class)]
class GithubUserData extends Data
{
    public function __construct(
        public string $login,
        public int $id,
        public string $nodeId,
        public string $avatarUrl,
        public ?string $gravatarId,
        public string $htmlUrl,
        public string $name,
        public ?string $blog,
        public string $location,
        public ?string $email,
        public bool $hireable,
        public string $bio,
        public ?string $twitterUsername,
        public int $publicRepos,
        public int $publicGists,
        public int $followers,
        public int $following,
        #[WithTransformer(DateTimeInterfaceTransformer::class)] public CarbonImmutable $createdAt,
        #[WithTransformer(DateTimeInterfaceTransformer::class)] public CarbonImmutable $updatedAt
    ) {
    }
}
