<?php

namespace App\Modules\WoodType\Infrastructure\Persistence\Repositories;

use App\Modules\WoodType\Domain\Repositories\WoodTypeRepositoryInterface;
use App\Modules\WoodType\Infrastructure\Persistence\Models\WoodTypeModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class WoodTypeRepository implements WoodTypeRepositoryInterface
{
    public function getAll(array $filters = []): LengthAwarePaginator
    {
        $query = WoodTypeModel::query();

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
                )->orWhere(
                    'description',
                    'ILIKE',
                    "%{$search}%"
                );
            });
        }

        if (!empty($filters['code'])) {
            $query->where(
                'code',
                $filters['code']
            );
        }

        if (isset($filters['is_precious'])) {
            $query->where(
                'is_precious',
                filter_var(
                    $filters['is_precious'],
                    FILTER_VALIDATE_BOOLEAN
                )
            );
        }

        if (isset($filters['is_restricted'])) {
            $query->where(
                'is_restricted',
                filter_var(
                    $filters['is_restricted'],
                    FILTER_VALIDATE_BOOLEAN
                )
            );
        }

        if (!empty($filters['group_no'])) {
            $query->where(
                'group_no',
                $filters['group_no']
            );
        }

        $allowedSorts = [
            'id',
            'code',
            'name',
            'group_no',
            'is_precious',
            'is_restricted',
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

        $perPage = (int) (
            $filters['per_page'] ?? 12
        );

        $perPage = min(
            max($perPage, 1),
            100
        );

        return $query->paginate($perPage);
    }

    public function find(int $id): ?WoodTypeModel
    {
        return WoodTypeModel::query()->find($id);
    }

    public function create(array $data): WoodTypeModel
    {
        return WoodTypeModel::create($data);
    }

    public function update(
        WoodTypeModel $woodType,
        array $data
    ): WoodTypeModel {
        $woodType->update($data);

        return $woodType->fresh();
    }

    public function delete(
        WoodTypeModel $woodType
    ): bool {
        return (bool) $woodType->delete();
    }
}
