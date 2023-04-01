<?php

namespace App\Enums\Pull;

enum Status: string
{
    case Draft = 'draft';
    case Open = 'open';
    case Solved = 'solved';
}
