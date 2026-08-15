<?php

namespace App\Modules\Category\Domain\Repositories;

use App\Modules\Category\Infrastructure\Persistence\Models\CategoryModel;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface
{
    public function getAll(): Collection;

    public function find(int $id): ?CategoryModel;

    public function create(array $data): CategoryModel;

    public function update(
        CategoryModel $category,
        array $data
    ): CategoryModel;

    public function delete(CategoryModel $category): bool;
}
