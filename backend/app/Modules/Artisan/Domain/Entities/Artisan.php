<?php

namespace App\Modules\Artisan\Domain\Entities;

class Artisan
{
    public function __construct(
        public ?int $id = null,

        public string $fullName = '',

        public ?string $craftVillage = null,

        public ?int $yearsExp = null,

        public ?string $bio = null,

        public ?string $avatarUrl = null,

        public bool $isActive = true,
    ) {}
}
