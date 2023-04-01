<?php

namespace App\Services\Avatar;

use Illuminate\Support\Arr;

class UiAvatar
{
    /**
     * @param string      $name
     * @param int|null    $size
     * @param string|null $color
     * @param string|null $background
     * @param bool|null   $bold
     */
    public function __construct(
        private readonly string $name,
        private ?int            $size = null,
        private ?string         $color = null,
        private ?string         $background = null,
        private ?bool           $bold = null,
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

        return url(config('ui-avatar.base_path')) . '?' . $query;
    }
}