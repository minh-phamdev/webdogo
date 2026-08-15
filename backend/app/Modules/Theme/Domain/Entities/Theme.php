<?php

namespace App\Modules\Theme\Domain\Entities;

class Theme
{
    public function __construct(
        public ?int $id = null,
        public ?int $themeGroupId = null,
        public ?string $code = null,
        public ?string $name = null,
        public ?string $meaning = null,
    ) {}
}
