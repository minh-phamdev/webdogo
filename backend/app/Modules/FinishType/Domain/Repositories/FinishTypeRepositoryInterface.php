<?php

namespace App\Modules\FinishType\Domain\Repositories;

use App\Modules\FinishType\Infrastructure\Persistence\Models\FinishTypeModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface FinishTypeRepositoryInterface
{
    public function getAll(array $filters = []): LengthAwarePaginator;

    public function find(int $id): ?FinishTypeModel;

    public function create(array $data): FinishTypeModel;

    public function update(
        FinishTypeModel $finishType,
        array $data
    ): FinishTypeModel;

    public function delete(FinishTypeModel $finishType): bool;
}
