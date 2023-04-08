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

    public function tags(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => explode(",", $value),
            set: fn (array $value) => implode(",", $value)
        );
    }

    public function codeLanguages(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => explode(",", $value),
            set: fn (array $value) => implode(",", $value)
        );
    }
}
