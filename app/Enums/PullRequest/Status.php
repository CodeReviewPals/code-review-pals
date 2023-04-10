<?php

namespace App\Enums\PullRequest;

enum Status: string
{
    case DRAFT = 'draft';
    case OPEN = 'open';
    case SOLVED = 'solved';
}
