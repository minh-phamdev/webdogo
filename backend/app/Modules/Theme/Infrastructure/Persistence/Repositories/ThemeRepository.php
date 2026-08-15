<?php

namespace App\Modules\Theme\Infrastructure\Persistence\Repositories;

use App\Modules\Theme\Domain\Repositories\ThemeRepositoryInterface;
use App\Modules\Theme\Infrastructure\Persistence\Models\ThemeModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ThemeRepository implements ThemeRepositoryInterface
{
    public function getAll(array $filters = []): LengthAwarePaginator
    {
        $query = ThemeModel::query()
            ->with('themeGroup');

        if (!empty($filters['theme_group_id'])) {
            $query->where(
                'theme_group_id',
                $filters['theme_group_id']
            );
        }

        if (!empty($filters['code'])) {
            $query->where(
                'code',
                $filters['code']
            );
        }

        if (!empty($filters['search'])) {
            $search = trim($filters['search']);

            $query->where(function ($q) use ($search) {
                $q->where(
                    'name',
                    'ILIKE',
                    "%{$search}%"
                )
                ->orWhere(
                    'code',
                    'ILIKE',
                    "%{$search}%"
                )
                ->orWhere(
                    'meaning',
                    'ILIKE',
                    "%{$search}%"
                );
            });
        }

        $allowedSorts = [
            'id',
            'code',
            'name',
            'created_at',
            'updated_at',
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

    public function find(int $id): ?ThemeModel
    {
        return ThemeModel::query()
            ->with('themeGroup')
            ->find($id);
    }

    public function create(array $data): ThemeModel
    {
        $theme = ThemeModel::create($data);

        return $theme->load('themeGroup');
    }

    public function update(
        ThemeModel $theme,
        array $data
    ): ThemeModel {
        $theme->update($data);

        return $theme->load('themeGroup');
    }

    public function delete(ThemeModel $theme): bool
    {
        return (bool) $theme->delete();
    }
}
