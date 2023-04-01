<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use App\Services\Avatar\UiAvatar;
use App\Enums\Auth\SocialiteProvider;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'avatar_url',
        'github_id',
        'github_token',
        'github_refresh_token',
        'password',
        'login_provider',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'avatar_url',
        'github_token',
        'github_refresh_token',
        'password',
        'remember_token',
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'avatar',
        'is_auth_user',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'login_provider'    => SocialiteProvider::class,
    ];

    /**
     * Implement logic with file upload or remote avatar.
     *
     * @return Attribute<string, never>
     */
    public function avatar(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->avatar_url ?? (new UiAvatar($this->name))->make(),
        );
    }

    /**
     * @return Attribute<bool, never>
     */
    public function isAuthUser(): Attribute
    {
        return Attribute::make(
            get: fn() => !$this->login_provider instanceof SocialiteProvider,
        );
    }
}
