<?php

namespace App\Concerns\Model;

use Auth;
use App\Models\User;

trait HasPermissions
{
    public function permissions(?User $user = null): array
    {
        $user = $user ?? Auth::user();

        $actions = ['view', 'update', 'delete', 'restore', 'forceDelete'];

        $can = [];

        foreach ($actions as $action) {
            $can[$action] = $user?->can($action, $this) ?? false;
        }

        return [
            'can' => $can,
        ];
    }
}
