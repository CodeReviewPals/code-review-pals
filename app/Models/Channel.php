<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Channel extends Model
{
    protected $fillable = [
        'channel_id',
        'parent_id',
        'guild_id',
        'type',
        'name',
    ];

    public function channelable(): MorphTo
    {
        return $this->morphTo();
    }
}
