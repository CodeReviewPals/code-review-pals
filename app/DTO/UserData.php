<?php

namespace App\DTO;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use App\Enums\Auth\SocialiteProvider;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class UserData extends Data
{
    public function __construct(
        public string             $name,
        public string             $email,
        public ?string            $avatar,
        public ?string            $githubId,
        public ?Carbon            $emailVerifiedAt,
        public ?SocialiteProvider $loginProvider,
    ) {}
}