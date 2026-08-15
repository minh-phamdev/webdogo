<?php

namespace App\Modules\ThemeGroup\Infrastructure\Persistence\Repositories;

use App\Modules\ThemeGroup\Domain\Repositories\ThemeGroupRepositoryInterface;
use App\Modules\ThemeGroup\Infrastructure\Persistence\Models\ThemeGroupModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ThemeGroupRepository implements ThemeGroupRepositoryInterface
{
    public function getAll(array $filters = []): LengthAwarePaginator
    {
        $query = ThemeGroupModel::query()
            ->with('themes');

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
            'name',
            'code',
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

    public function find(int $id): ?ThemeGroupModel
    {
        return ThemeGroupModel::query()
            ->with('themes')
            ->find($id);
    }

    public function create(array $data): ThemeGroupModel
    {
        return ThemeGroupModel::create($data)
            ->load('themes');
    }

    public function update(
        ThemeGroupModel $themeGroup,
        array $data
    ): ThemeGroupModel {
        $themeGroup->update($data);

        return $themeGroup->fresh('themes');
    }

    public function delete(
        ThemeGroupModel $themeGroup
    ): bool {
        return (bool) $themeGroup->delete();
    }
}
