<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Repository extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        "title",
        "about",
        "tags",
        "code_languages",
    ];

    /**
     * cast tags to Array
     *
     * @return Attribute<string, never>
     */
    public function tags(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => explode(",", $value),
            set: fn ($value) => implode(",", $value)
        );
    }

    /**
     * cast tags to Array
     *
     * @return Attribute<string, never>
     */
    public function code_languages(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => explode(",", $value),
            set: fn ($value) => implode(",", $value)
        );
    }
}
