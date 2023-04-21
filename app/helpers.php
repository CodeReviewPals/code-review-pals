<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

if (!function_exists('isSelfUser')) {
    /***
     * @param Model  $model
     * @param User   $user
     * @param string $key
     *
     * @return bool
     */
    function isSelfUser(Model $model, User $user, string $key = 'user_id'): bool
    {
        return $model->$key === $user->id;
    }
}
