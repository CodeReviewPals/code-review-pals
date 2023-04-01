<?php

namespace App\DTO\Github\User;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;
use app\DTO\Github\Repository\OwnerData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

#[MapInputName(SnakeCaseMapper::class)]
class UserRepositoryData extends Data
{
    public function __construct(
        public int             $id,
        public string          $nodeId,
        public string          $name,
        public string          $fullName,
        public bool            $private,
        public string          $htmlUrl,
        public ?string         $description,
        public OwnerData       $owner,
        #[MapInputName('fork')]
        public bool            $isFork,
        public string          $url,
        #[WithTransformer(DateTimeInterfaceTransformer::class)]
        public CarbonImmutable $createdAt,
        #[WithTransformer(DateTimeInterfaceTransformer::class)]
        public CarbonImmutable $updatedAt,
        #[WithTransformer(DateTimeInterfaceTransformer::class)]
        public CarbonImmutable $pushedAt,
        public int             $size,
        public int             $stargazersCount,
        public int             $watchersCount,
        public int             $forksCount,
        public ?string         $language,
        public string          $defaultBranch,
        public bool            $isTemplate,
    ) {}
}