<?php

namespace App\DTO\Github\Repository;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

#[MapInputName(SnakeCaseMapper::class)]
class RepositoryData extends Data
{
    public function __construct(
        public int              $id,
        public string           $nodeId,
        public string           $name,
        public string           $fullName,
        public bool             $private,
        public OwnerData        $owner,
        public ?string          $description,
        #[MapInputName('fork')]
        public bool             $isFork,
        public string           $cloneUrl,
        public string           $sshUrl,
        public ?string          $homepage,
        public int              $size,
        public int              $stargazersCount,
        public int              $watchersCount,
        public string           $language,
        public array            $topics,
        public string           $defaultBranch,
        #[WithTransformer(DateTimeInterfaceTransformer::class)]
        public CarbonImmutable  $createdAt,
        #[WithTransformer(DateTimeInterfaceTransformer::class)]
        public CarbonImmutable  $updatedAt,
        #[WithTransformer(DateTimeInterfaceTransformer::class)]
        public ?CarbonImmutable $pushedAt,
    ) {}
}