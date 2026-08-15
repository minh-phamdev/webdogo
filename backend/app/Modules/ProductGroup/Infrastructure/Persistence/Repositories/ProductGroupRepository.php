<?php

namespace App\Modules\ProductGroup\Infrastructure\Persistence\Repositories;

use App\Modules\ProductGroup\Domain\Repositories\ProductGroupRepositoryInterface;
use App\Modules\ProductGroup\Infrastructure\Persistence\Models\ProductGroupModel;
use Illuminate\Database\Eloquent\Collection;

class ProductGroupRepository implements ProductGroupRepositoryInterface
{
    public function getAll(): Collection
    {
        return ProductGroupModel::query()
            ->orderBy('id')
            ->get();
    }

    public function find(int $id): ?ProductGroupModel
    {
        return ProductGroupModel::query()
            ->find($id);
    }

    public function create(array $data): ProductGroupModel
    {
        return ProductGroupModel::create($data);
    }

    public function update(
        ProductGroupModel $productGroup,
        array $data
    ): ProductGroupModel {
        $productGroup->update($data);

        $productGroup->refresh();

        return $productGroup;
    }

    public function delete(
        ProductGroupModel $productGroup
    ): bool {
        return (bool) $productGroup->delete();
    }
}
