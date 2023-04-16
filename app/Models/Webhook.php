<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Webhook extends Model
{
    protected $fillable = ['title', 'hook_id'];

    /**
     * @return MorphTo
     */
    public function webhookable(): MorphTo
    {
        return $this->morphTo();
    }
}
