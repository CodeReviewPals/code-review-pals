<?php

namespace App\Services\Repository;

use App\Models\Repository;

class RepositoryService
{
    public function isRegistered(string $fullName): Repository|false
    {
        $repository = Repository::where('full_name', $fullName)->first();
        return $repository ?? false;
    }
}
