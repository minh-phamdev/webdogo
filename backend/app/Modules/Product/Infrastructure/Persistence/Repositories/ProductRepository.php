<?php

namespace App\Modules\Product\Infrastructure\Persistence\Repositories;

use App\Modules\Product\Domain\Repositories\ProductRepositoryInterface;
use App\Modules\Product\Infrastructure\Persistence\Models\ProductModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * Các relationship được load khi trả về Product.
     */
    private array $relations = [
        'category',
        'group',
        'theme',
        'woodType',
        'finishType',
        'artisan',
        'status',
        'media',
    ];

    /**
     * Lấy danh sách sản phẩm.
     *
     * Hỗ trợ:
     * - Search
     * - Filter
     * - Sort
     * - Pagination
     */
    public function paginate(
        array $filters
    ): LengthAwarePaginator {
        $query = ProductModel::query()
            ->with($this->relations);

        // =====================================================
        // SEARCH
        // =====================================================

        if (
            isset($filters['search'])
            && trim($filters['search']) !== ''
        ) {
            $search = trim($filters['search']);

            $query->whereRaw(
                "search_vector @@ plainto_tsquery('simple', ?)",
                [$search]
            );
        }

        // =====================================================
        // FILTER THEO ID
        // =====================================================

        $idFilters = [
            'category_id',
            'group_id',
            'theme_id',
            'wood_type_id',
            'finish_id',
            'artisan_id',
            'status_id',
        ];

        foreach ($idFilters as $field) {
            if (
                isset($filters[$field])
                && $filters[$field] !== ''
            ) {
                $query->where(
                    $field,
                    $filters[$field]
                );
            }
        }

        // =====================================================
        // FILTER BOOLEAN
        // =====================================================

        if (array_key_exists('is_unique', $filters)) {
            $query->where(
                'is_unique',
                filter_var(
                    $filters['is_unique'],
                    FILTER_VALIDATE_BOOLEAN
                )
            );
        }

        if (array_key_exists('is_handmade', $filters)) {
            $query->where(
                'is_handmade',
                filter_var(
                    $filters['is_handmade'],
                    FILTER_VALIDATE_BOOLEAN
                )
            );
        }

        // =====================================================
        // FILTER PRICE
        // =====================================================

        $this->applyRangeFilter(
            $query,
            'price',
            $filters['min_price'] ?? null,
            $filters['max_price'] ?? null
        );

        // =====================================================
        // FILTER HEIGHT
        // =====================================================

        $this->applyRangeFilter(
            $query,
            'height_cm',
            $filters['min_height'] ?? null,
            $filters['max_height'] ?? null
        );

        // =====================================================
        // FILTER WIDTH
        // =====================================================

        $this->applyRangeFilter(
            $query,
            'width_cm',
            $filters['min_width'] ?? null,
            $filters['max_width'] ?? null
        );

        // =====================================================
        // FILTER DEPTH
        // =====================================================

        $this->applyRangeFilter(
            $query,
            'depth_cm',
            $filters['min_depth'] ?? null,
            $filters['max_depth'] ?? null
        );

        // =====================================================
        // FILTER WEIGHT
        // =====================================================

        $this->applyRangeFilter(
            $query,
            'weight_kg',
            $filters['min_weight'] ?? null,
            $filters['max_weight'] ?? null
        );

        // =====================================================
        // FILTER STOCK
        // =====================================================

        if (array_key_exists('in_stock', $filters)) {
            $inStock = filter_var(
                $filters['in_stock'],
                FILTER_VALIDATE_BOOLEAN
            );

            if ($inStock) {
                $query->whereColumn(
                    'quantity',
                    '>',
                    'reserved_quantity'
                );
            } else {
                $query->whereColumn(
                    'quantity',
                    '<=',
                    'reserved_quantity'
                );
            }
        }

        // =====================================================
        // FILTER SLUG
        // =====================================================

        if (
            isset($filters['slug'])
            && $filters['slug'] !== ''
        ) {
            $query->where(
                'slug',
                $filters['slug']
            );
        }

        // =====================================================
        // SORT
        // =====================================================

        $allowedSorts = [
            'id',
            'name',
            'price',
            'created_at',
            'updated_at',
            'quantity',
            'height_cm',
            'width_cm',
            'weight_kg',
        ];

        $sortBy = $filters['sort_by']
            ?? 'created_at';

        if (
            !in_array(
                $sortBy,
                $allowedSorts,
                true
            )
        ) {
            $sortBy = 'created_at';
        }

        $sortOrder = strtolower(
            $filters['sort_order']
                ?? 'desc'
        );

        if (
            !in_array(
                $sortOrder,
                ['asc', 'desc'],
                true
            )
        ) {
            $sortOrder = 'desc';
        }

        $query->orderBy(
            $sortBy,
            $sortOrder
        );

        // =====================================================
        // PAGINATION
        // =====================================================

        $perPage = (int) (
            $filters['per_page']
                ?? 12
        );

        $perPage = min(
            max($perPage, 1),
            100
        );

        return $query->paginate(
            $perPage
        );
    }

    /**
     * Lấy một sản phẩm theo ID.
     */
    public function find(
        int $id
    ): ?ProductModel {
        return ProductModel::query()
            ->with($this->relations)
            ->find($id);
    }

    /**
     * Tạo sản phẩm.
     */
    public function create(
        array $data
    ): ProductModel {
        $product = ProductModel::create(
            $data
        );

        return $product->load(
            $this->relations
        );
    }

    /**
     * Cập nhật sản phẩm.
     */
    public function update(
        ProductModel $product,
        array $data
    ): ProductModel {
        $product->update(
            $data
        );

        return $product->load(
            $this->relations
        );
    }

    /**
     * Xóa mềm sản phẩm.
     */
    public function delete(
        ProductModel $product
    ): bool {
        return (bool) $product->delete();
    }

    /**
     * Áp dụng filter min/max.
     */
    private function applyRangeFilter(
        Builder $query,
        string $column,
        mixed $min,
        mixed $max
    ): void {
        if (
            $min !== null
            && $min !== ''
        ) {
            $query->where(
                $column,
                '>=',
                $min
            );
        }

        if (
            $max !== null
            && $max !== ''
        ) {
            $query->where(
                $column,
                '<=',
                $max
            );
        }
    }
}
