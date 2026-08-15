<?php

namespace App\Modules\Theme\Domain\Repositories;

use App\Modules\Theme\Infrastructure\Persistence\Models\ThemeModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ThemeRepositoryInterface
{
    public function getAll(array $filters = []): LengthAwarePaginator;

    public function find(int $id): ?ThemeModel;

    public function create(array $data): ThemeModel;

    public function update(
        ThemeModel $theme,
        array $data
    ): ThemeModel;

    public function delete(ThemeModel $theme): bool;
}
