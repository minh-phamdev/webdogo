<?php

namespace App\Modules\StatueTheme\Domain\Repositories;

use App\Modules\StatueTheme\Infrastructure\Persistence\Models\StatueThemeModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface StatueThemeRepositoryInterface
{
    public function getAll(array $filters = []): LengthAwarePaginator;

    public function find(int $id): ?StatueThemeModel;

    public function create(array $data): StatueThemeModel;

    public function update(
        StatueThemeModel $statueTheme,
        array $data
    ): StatueThemeModel;

    public function delete(
        StatueThemeModel $statueTheme
    ): bool;
}
