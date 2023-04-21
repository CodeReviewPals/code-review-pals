<?php

namespace App\Concerns\Model;

use Auth;
use App\Models\User;

trait HasPermissions
{
    protected array $actions = ['view', 'update', 'delete', 'restore', 'forceDelete'];

    public function permissions(?User $user = null): array
    {
        $user = $user ?? Auth::user();

        $can = [];

        foreach ($this->actions as $action) {
            $can[$action] = $user?->can($action, $this) ?? false;
        }

        return [
            'can' => $can,
        ];
    }
}
