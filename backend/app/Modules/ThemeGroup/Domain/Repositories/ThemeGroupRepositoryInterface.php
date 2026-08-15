<?php

namespace App\Modules\ThemeGroup\Domain\Repositories;

use App\Modules\ThemeGroup\Infrastructure\Persistence\Models\ThemeGroupModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ThemeGroupRepositoryInterface
{
    public function getAll(array $filters = []): LengthAwarePaginator;

    public function find(int $id): ?ThemeGroupModel;

    public function create(array $data): ThemeGroupModel;

    public function update(
        ThemeGroupModel $themeGroup,
        array $data
    ): ThemeGroupModel;

    public function delete(ThemeGroupModel $themeGroup): bool;
}
