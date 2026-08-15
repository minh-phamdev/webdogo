<?php

namespace App\Modules\Artisan\Infrastructure\Persistence\Repositories;

use App\Modules\Artisan\Domain\Repositories\ArtisanRepositoryInterface;
use App\Modules\Artisan\Infrastructure\Persistence\Models\ArtisanModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ArtisanRepository implements ArtisanRepositoryInterface
{
    /**
     * Lấy danh sách nghệ nhân.
     *
     * Hỗ trợ:
     * - Search
     * - Filter trạng thái
     * - Filter làng nghề
     * - Filter số năm kinh nghiệm
     * - Sort
     * - Pagination
     */
    public function paginate(
        array $filters
    ): LengthAwarePaginator {
        $query = ArtisanModel::query();

        // =====================================================
        // SEARCH
        // =====================================================

        if (
            isset($filters['search'])
            && trim($filters['search']) !== ''
        ) {
            $search = trim($filters['search']);

            $query->where(function ($q) use ($search) {
                $q->where(
                    'full_name',
                    'ILIKE',
                    "%{$search}%"
                )->orWhere(
                    'craft_village',
                    'ILIKE',
                    "%{$search}%"
                );
            });
        }

        // =====================================================
        // FILTER IS ACTIVE
        // =====================================================

        if (array_key_exists('is_active', $filters)) {
            $isActive = filter_var(
                $filters['is_active'],
                FILTER_VALIDATE_BOOLEAN
            );

            $query->where(
                'is_active',
                $isActive
            );
        }

        // =====================================================
        // FILTER CRAFT VILLAGE
        // =====================================================

        if (
            isset($filters['craft_village'])
            && $filters['craft_village'] !== ''
        ) {
            $query->where(
                'craft_village',
                $filters['craft_village']
            );
        }

        // =====================================================
        // FILTER YEARS EXP
        // =====================================================

        if (
            isset($filters['min_years_exp'])
            && $filters['min_years_exp'] !== ''
        ) {
            $query->where(
                'years_exp',
                '>=',
                $filters['min_years_exp']
            );
        }

        if (
            isset($filters['max_years_exp'])
            && $filters['max_years_exp'] !== ''
        ) {
            $query->where(
                'years_exp',
                '<=',
                $filters['max_years_exp']
            );
        }

        // =====================================================
        // SORT
        // =====================================================

        $allowedSorts = [
            'id',
            'full_name',
            'years_exp',
        ];

        $sortBy = $filters['sort_by']
            ?? 'id';

        if (!in_array(
            $sortBy,
            $allowedSorts,
            true
        )) {
            $sortBy = 'id';
        }

        $sortOrder = strtolower(
            $filters['sort_order']
                ?? 'desc'
        );

        if (!in_array(
            $sortOrder,
            ['asc', 'desc'],
            true
        )) {
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
     * Lấy nghệ nhân theo ID.
     */
    public function find(
        int $id
    ): ?ArtisanModel {
        return ArtisanModel::query()
            ->find($id);
    }

    /**
     * Tạo nghệ nhân.
     */
    public function create(
        array $data
    ): ArtisanModel {
        return ArtisanModel::create(
            $data
        );
    }

    /**
     * Cập nhật nghệ nhân.
     */
    public function update(
        ArtisanModel $artisan,
        array $data
    ): ArtisanModel {
        $artisan->update($data);

        return $artisan->fresh();
    }

    /**
     * Xóa nghệ nhân.
     */
    public function delete(
        ArtisanModel $artisan
    ): bool {
        return (bool) $artisan->delete();
    }
}
