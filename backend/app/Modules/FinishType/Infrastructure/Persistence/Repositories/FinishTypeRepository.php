<?php

namespace App\Modules\FinishType\Infrastructure\Persistence\Repositories;

use App\Modules\FinishType\Domain\Repositories\FinishTypeRepositoryInterface;
use App\Modules\FinishType\Infrastructure\Persistence\Models\FinishTypeModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FinishTypeRepository implements FinishTypeRepositoryInterface
{
    public function getAll(array $filters = []): LengthAwarePaginator
    {
        $query = FinishTypeModel::query();

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

        if (!empty($filters['code'])) {
            $query->where(
                'code',
                $filters['code']
            );
        }

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

        $perPage = (int) (
            $filters['per_page'] ?? 12
        );

        $perPage = min(
            max($perPage, 1),
            100
        );

        return $query->paginate($perPage);
    }

    public function find(int $id): ?FinishTypeModel
    {
        return FinishTypeModel::query()->find($id);
    }

    public function create(array $data): FinishTypeModel
    {
        return FinishTypeModel::create($data);
    }

    public function update(
        FinishTypeModel $finishType,
        array $data
    ): FinishTypeModel {
        $finishType->update($data);

        return $finishType->fresh();
    }

    public function delete(
        FinishTypeModel $finishType
    ): bool {
        return (bool) $finishType->delete();
    }
}
