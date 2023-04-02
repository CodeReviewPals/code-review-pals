<?php

namespace App\Enums\Github\Repository\PullRequest;

enum State: string
{
    case OPEN = 'open';
    case CLOSED = 'closed';
}
