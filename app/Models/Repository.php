<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @property string $username
 * @property string $repository
 */
class Repository extends Model
{
    use SoftDeletes;

    protected $fillable = ['node_id', 'user_id', 'full_name', 'description', 'language', 'html_url'];

    /**
     * @var string[]
     */
    protected $appends = ['username', 'repository', 'can_delete'];

    /**
     * @return BelongsTo<User, Repository>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return MorphMany<User, Webhook>
     */
    public function webhooks(): MorphMany
    {
        return $this->morphMany(Webhook::class, 'webhookable');
    }

    /**
     * @return Attribute<string, never>
     */
    public function username(): Attribute
    {
        return Attribute::make(get: fn () => explode('/', $this->full_name)[0]);
    }

    /**
     * @return Attribute<string, never>
     */
    public function repository(): Attribute
    {
        return Attribute::make(get: fn () => explode('/', $this->full_name)[1]);
    }

    public function canDelete(): Attribute
    {
        return Attribute::make(get: fn () => auth()->user()->can('delete', $this));
    }

    /**
     * @param Builder<Repository> $query
     *
     * @return Builder<Repository>
     */
    public function scopeForJob(Builder $query): Builder
    {
        return $query->select(['id', 'node_id', 'full_name', 'user_id']);
    }
}
