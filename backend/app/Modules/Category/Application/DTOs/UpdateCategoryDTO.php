<?php

namespace App\Modules\Category\Application\DTOs;

use App\Modules\Category\Infrastructure\Persistence\Models\CategoryModel;

class UpdateCategoryDTO
{
    public function __construct(
        public readonly CategoryModel $category,
        public readonly array $data
    ) {}
}
