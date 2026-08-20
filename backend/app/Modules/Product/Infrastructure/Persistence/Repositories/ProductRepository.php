<?php

namespace App\Modules\Product\Infrastructure\Persistence\Repositories;

use App\Modules\Product\Domain\Repositories\ProductRepositoryInterface;
use App\Modules\Product\Domain\Entities\Product;
use App\Modules\Product\Infrastructure\Persistence\Models\ProductModel;
use App\Modules\Product\Infrastructure\Persistence\Mappers\ProductMapper;

class ProductRepository implements ProductRepositoryInterface
{
    public function findById(int $id): ?Product
    {
        $model = ProductModel::find($id);

        return $model ? ProductMapper::toDomain($model) : null;
    }

    public function save(Product $product): void
    {
        $model = ProductMapper::toModel($product);
        $model->save();
    }

    public function delete(Product $product): void
    {
        $model = ProductModel::findOrFail($product->id);
        $model->delete();
    }
}
