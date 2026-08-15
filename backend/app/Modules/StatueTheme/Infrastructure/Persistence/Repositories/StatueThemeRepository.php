<?php

namespace App\Modules\StatueTheme\Infrastructure\Persistence\Repositories;

use App\Modules\StatueTheme\Domain\Repositories\StatueThemeRepositoryInterface;
use App\Modules\StatueTheme\Infrastructure\Persistence\Models\StatueThemeModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StatueThemeRepository implements StatueThemeRepositoryInterface
{
    public function getAll(array $filters = []): LengthAwarePaginator
    {
        $query = StatueThemeModel::query()
            ->with('themeGroup');

        // FILTER THEME GROUP

        if (!empty($filters['theme_group_id'])) {
            $query->where(
                'theme_group_id',
                $filters['theme_group_id']
            );
        }

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
                )->orWhere(
                    'meaning',
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
            'theme_group_id',
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

    public function find(int $id): ?StatueThemeModel
    {
        return StatueThemeModel::query()
            ->with('themeGroup')
            ->find($id);
    }

    public function create(array $data): StatueThemeModel
    {
        return StatueThemeModel::create($data)
            ->load('themeGroup');
    }

    public function update(
        StatueThemeModel $statueTheme,
        array $data
    ): StatueThemeModel {
        $statueTheme->update($data);

        return $statueTheme->fresh('themeGroup');
    }

    public function delete(
        StatueThemeModel $statueTheme
    ): bool {
        return (bool) $statueTheme->delete();
    }
}
