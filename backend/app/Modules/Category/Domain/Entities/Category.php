<?php

namespace App\Modules\Category\Domain\Entities;

class Category
{
    public function __construct(
        public ?int $id = null,

        public ?int $parentId = null,

        public string $name = '',

        public string $slug = '',

        public int $sortOrder = 0,

        public bool $isActive = true,
    ) {
    }
}
