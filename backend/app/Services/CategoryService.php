<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CategoryService
{
    public function getAll(): Collection
    {
        return Category::query()
            ->with('children')
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();
    }

    public function getById(int $id): Category
    {
        return Category::query()
            ->with([
                'parent',
                'children',
            ])
            ->findOrFail($id);
    }

    public function create(array $data): Category
    {
        return DB::transaction(function () use ($data) {
            $this->validateParent($data['parent_id'] ?? null);

            return Category::create([
                'parent_id' => $data['parent_id'] ?? null,
                'name' => $data['name'],
                'slug' => $data['slug'],
                'sort_order' => $data['sort_order'] ?? 0,
                'is_active' => $data['is_active'] ?? true,
            ]);
        });
    }

    public function update(Category $category, array $data): Category
    {
        return DB::transaction(function () use ($category, $data) {
            if (array_key_exists('parent_id', $data)) {
                $this->validateParent(
                    $data['parent_id'],
                    $category->id
                );
            }

            $category->update($data);

            return $category->fresh([
                'parent',
                'children',
            ]);
        });
    }

    public function delete(Category $category): void
    {
        DB::transaction(function () use ($category) {
            if ($category->children()->exists()) {
                throw ValidationException::withMessages([
                    'category' => [
                        'Không thể xóa danh mục đang có danh mục con.',
                    ],
                ]);
            }

            $category->delete();
        });
    }

    private function validateParent(
        ?int $parentId,
        ?int $categoryId = null
    ): void {
        if ($parentId === null) {
            return;
        }

        if ($categoryId !== null && $parentId === $categoryId) {
            throw ValidationException::withMessages([
                'parent_id' => [
                    'Danh mục không thể là danh mục cha của chính nó.',
                ],
            ]);
        }

        if (!Category::whereKey($parentId)->exists()) {
            throw ValidationException::withMessages([
                'parent_id' => [
                    'Danh mục cha không tồn tại.',
                ],
            ]);
        }
    }
}
