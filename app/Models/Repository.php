<?php

namespace App\Models;

use App\Concerns\Model\HasPermissions;
use App\Enums\Discord\ChannelType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @property string $username
 * @property string $repository
 */
class Repository extends Model
{
    use SoftDeletes, HasPermissions;

    protected $fillable = [
        'node_id',
        'owner_third_party_id',
        'user_id',
        'full_name',
        'description',
        'language',
        'html_url',
    ];

    /**
     * @var string[]
     */
    protected $appends = ['username', 'repository'];

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
     * @return MorphMany<User, Channel>
     */
    public function channels(): MorphMany
    {
        return $this->morphMany(Channel::class, 'channelable');
    }

    /**
     * @return MorphOne
     */
    public function threadChannel(): MorphOne
    {
        return $this->morphOne(Channel::class, 'channelable')
            ->ofMany([], function (Builder $query) {
                $query->whereType(ChannelType::FORUM);
            });
    }

    /**
     * @return Attribute<string, never>
     */
    public function username(): Attribute
    {
        return Attribute::make(get: fn() => explode('/', $this->full_name)[0]);
    }

    /**
     * @return Attribute<string, never>
     */
    public function repository(): Attribute
    {
        return Attribute::make(get: fn() => explode('/', $this->full_name)[1]);
    }

    /**
     * @param Builder<Repository> $query
     *
     * @return Builder<Repository>
     */
    public function scopeForJob(Builder $query): Builder
    {
        return $query->select(['id', 'node_id', 'full_name', 'added_by', 'owner_id']);
    }
}
