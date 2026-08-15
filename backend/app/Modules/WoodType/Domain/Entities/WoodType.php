<?php

namespace App\Modules\WoodType\Domain\Entities;

class WoodType
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $code,
        public readonly string $name,
        public readonly ?int $groupNo,
        public readonly bool $isPrecious,
        public readonly bool $isRestricted,
        public readonly ?string $description,
    ) {
    }
}
