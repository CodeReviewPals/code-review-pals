<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "body",
        "url",
        "github_profile"
    ];

    public function briefBody(): string
    {
        return implode(' ', array_slice(str_word_count($this->body, 1), 0, 10));
    }

    public function readableCreatedAt(): string
    {
        return $this->created_at->format('d F Y');
    }
}
