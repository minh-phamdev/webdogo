<?php

namespace App\Modules\Category\Infrastructure\Persistence\Repositories;

use App\Modules\Category\Domain\Repositories\CategoryRepositoryInterface;
use App\Modules\Category\Infrastructure\Persistence\Models\CategoryModel;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll(): Collection
    {
        return CategoryModel::query()
            ->with([
                'parent',
                'children',
            ])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }

    public function find(int $id): ?CategoryModel
    {
        return CategoryModel::query()
            ->with([
                'parent',
                'children',
            ])
            ->find($id);
    }

    public function create(array $data): CategoryModel
    {
        $category = CategoryModel::create($data);

        return $category->load([
            'parent',
            'children',
        ]);
    }

    public function update(
        CategoryModel $category,
        array $data
    ): CategoryModel {
        $category->update($data);

        return $category->load([
            'parent',
            'children',
        ]);
    }

    public function delete(CategoryModel $category): bool
    {
        return (bool) $category->delete();
    }
}
