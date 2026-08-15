<?php

namespace App\Modules\ProductGroup\Domain\Repositories;

use App\Modules\ProductGroup\Infrastructure\Persistence\Models\ProductGroupModel;
use Illuminate\Database\Eloquent\Collection;

interface ProductGroupRepositoryInterface
{
    public function getAll(): Collection;

    public function find(int $id): ?ProductGroupModel;

    public function create(array $data): ProductGroupModel;

    public function update(
        ProductGroupModel $productGroup,
        array $data
    ): ProductGroupModel;

    public function delete(
        ProductGroupModel $productGroup
    ): bool;
}
