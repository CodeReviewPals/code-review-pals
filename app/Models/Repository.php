<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Repository extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'node_id',
        'user_id',
        'full_name',
        'description',
        'language',
        'html_url',
    ];

    /**
     * @return BelongsTo<User>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
