<?php

namespace App\Modules\StatueTheme\Domain\Entities;

class StatueTheme
{
    public function __construct(
        public readonly ?int $id,
        public readonly ?int $themeGroupId,
        public readonly string $code,
        public readonly string $name,
        public readonly ?string $meaning,
    ) {
    }
}
