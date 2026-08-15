<?php

namespace App\Modules\ProductStatus\Infrastructure\Persistence\Repositories;

use App\Modules\ProductStatus\Domain\Repositories\ProductStatusRepositoryInterface;
use App\Modules\ProductStatus\Infrastructure\Persistence\Models\ProductStatusModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductStatusRepository implements ProductStatusRepositoryInterface
{
    public function getAll(array $filters = []): LengthAwarePaginator
    {
        $query = ProductStatusModel::query();

        // SEARCH

        if (!empty($filters['search'])) {
            $search = trim($filters['search']);

            $query->where(function ($q) use ($search) {
                $q->where(
                    'name',
                    'ILIKE',
                    "%{$search}%"
                )->orWhere(
                    'code',
                    'ILIKE',
                    "%{$search}%"
                );
            });
        }

        // FILTER CODE

        if (!empty($filters['code'])) {
            $query->where(
                'code',
                $filters['code']
            );
        }

        // SORT

        $allowedSorts = [
            'id',
            'code',
            'name',
        ];

        $sortBy = $filters['sort_by'] ?? 'id';

        if (!in_array($sortBy, $allowedSorts, true)) {
            $sortBy = 'id';
        }

        $sortOrder = strtolower(
            $filters['sort_order'] ?? 'asc'
        );

        if (!in_array($sortOrder, ['asc', 'desc'], true)) {
            $sortOrder = 'asc';
        }

        $query->orderBy(
            $sortBy,
            $sortOrder
        );

        // PAGINATION

        $perPage = (int) (
            $filters['per_page'] ?? 12
        );

        $perPage = min(
            max($perPage, 1),
            100
        );

        return $query->paginate($perPage);
    }

    public function find(int $id): ?ProductStatusModel
    {
        return ProductStatusModel::query()->find($id);
    }

    public function create(array $data): ProductStatusModel
    {
        return ProductStatusModel::create($data);
    }

    public function update(
        ProductStatusModel $productStatus,
        array $data
    ): ProductStatusModel {
        $productStatus->update($data);

        return $productStatus->fresh();
    }

    public function delete(
        ProductStatusModel $productStatus
    ): bool {
        return (bool) $productStatus->delete();
    }
}
