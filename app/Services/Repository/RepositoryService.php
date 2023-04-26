<?php

namespace App\Services\Repository;

use App\Models\Repository;

class RepositoryService
{
    public function getRepositoryByFullName(string $fullName): ?Repository
    {
        $repository = Repository::where('full_name', $fullName)->first();
        return $repository;
    }
}
