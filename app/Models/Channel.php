<?php

namespace App\Models;

use App\Enums\Discord\ChannelType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Channel extends Model
{
    protected $fillable = ['channel_id', 'parent_id', 'guild_id', 'type', 'name'];

    protected $casts = [
        'type' => ChannelType::class,
    ];

    public function scopeName(Builder $query, string $name): Builder
    {
        return $query->where('name', $name);
    }
}
