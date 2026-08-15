<?php

namespace App\Modules\Category\Application\DTOs;

class CreateCategoryDTO
{
    public function __construct(
        public readonly array $data
    ) {}
}
