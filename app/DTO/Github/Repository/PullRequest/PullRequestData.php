<?php

namespace App\DTO\Github\Repository\PullRequest;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;
use App\DTO\Github\Repository\OwnerData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\WithTransformer;
use App\Enums\Github\Repository\PullRequest\State;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

#[MapInputName(SnakeCaseMapper::class)]
#[MapOutputName(SnakeCaseMapper::class)]
class PullRequestData extends Data
{
    public function __construct(
        public string           $htmlUrl,
        public int              $id,
        public string           $nodeId,
        public int              $number,
        #[MapOutputName('status')]
        public State            $state,
        public bool             $locked,
        public string           $title,
        public OwnerData        $user,
        #[MapOutputName('description')]
        public ?string          $body,
        #[WithTransformer(DateTimeInterfaceTransformer::class)]
        public CarbonImmutable  $createdAt,
        #[WithTransformer(DateTimeInterfaceTransformer::class)]
        public CarbonImmutable  $updatedAt,
        #[WithTransformer(DateTimeInterfaceTransformer::class)]
        public ?CarbonImmutable $closedAt,
        #[WithTransformer(DateTimeInterfaceTransformer::class)]
        public ?CarbonImmutable $mergedAt,
        public ?int             $comments,
        public ?int             $reviewComments,
        public ?int             $commits,
        public ?int             $additions,
        public ?int             $deletions,
        public ?int             $changedFiles,
    ) {}
}
