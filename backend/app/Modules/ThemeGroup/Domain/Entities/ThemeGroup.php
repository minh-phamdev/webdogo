<?php

namespace App\Modules\ThemeGroup\Domain\Entities;

class ThemeGroup
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $code = null,
    ) {}
}
