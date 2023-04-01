<?php

namespace App\Services\Avatar;

use Illuminate\Support\Arr;

class UiAvatar
{
    /**
     * @param string $name
     * @param mixed  $size
     * @param mixed  $color
     * @param mixed  $background
     * @param mixed  $bold
     */
    public function __construct(
        private readonly string $name,
        private mixed           $size = null,
        private mixed           $color = null,
        private mixed           $background = null,
        private mixed           $bold = null,
    )
    {
        $this->size = $this->size ?? config('ui-avatar.default.size');
        $this->color = $this->color ?? config('ui-avatar.default.color');
        $this->background = $this->background ?? config('ui-avatar.default.background');
        $this->bold = $this->bold ?? config('ui-avatar.default.bold');
    }

    /**
     * @return string
     */
    public function make(): string
    {
        $query = Arr::query([
            'name'       => $this->name,
            'color'      => $this->color,
            'background' => $this->background,
            'size'       => $this->size,
            'bold'       => $this->bold,
        ]);

        return config('ui-avatar.base_path') . '?' . $query;
    }
}