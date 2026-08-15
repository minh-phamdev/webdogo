<?php

namespace App\Modules\WoodType\Domain\Repositories;

use App\Modules\WoodType\Infrastructure\Persistence\Models\WoodTypeModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface WoodTypeRepositoryInterface
{
    public function getAll(array $filters = []): LengthAwarePaginator;

    public function find(int $id): ?WoodTypeModel;

    public function create(array $data): WoodTypeModel;

    public function update(
        WoodTypeModel $woodType,
        array $data
    ): WoodTypeModel;

    public function delete(WoodTypeModel $woodType): bool;
}
