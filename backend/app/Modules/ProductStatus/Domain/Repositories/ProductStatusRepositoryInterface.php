<?php

namespace App\Modules\ProductStatus\Domain\Repositories;

use App\Modules\ProductStatus\Infrastructure\Persistence\Models\ProductStatusModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductStatusRepositoryInterface
{
    public function getAll(array $filters = []): LengthAwarePaginator;

    public function find(int $id): ?ProductStatusModel;

    public function create(array $data): ProductStatusModel;

    public function update(
        ProductStatusModel $productStatus,
        array $data
    ): ProductStatusModel;

    public function delete(
        ProductStatusModel $productStatus
    ): bool;
}
