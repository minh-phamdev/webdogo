<?php

namespace App\Modules\Product\Infrastructure\Persistence\Mappers;

use App\Modules\Product\Domain\Entities\Product;
use App\Modules\Product\Domain\ValueObjects\{
    Sku, Slug, Money, Dimension, Weight, Inventory, ProductStatus
};
use App\Modules\Product\Infrastructure\Persistence\Models\ProductModel;

class ProductMapper
{
    public static function toDomain(ProductModel $model): Product
    {
        return new Product(
            id: $model->id,
            sku: new Sku($model->sku),
            groupId: $model->group_id,
            categoryId: $model->category_id,
            themeId: $model->theme_id,
            woodTypeId: $model->wood_type_id,
            finishId: $model->finish_id,
            artisanId: $model->artisan_id,
            status: new ProductStatus($model->status_id),
            name: $model->name,
            slug: $model->slug ? new Slug($model->slug) : null,
            description: $model->description,
            price: new Money((int)$model->price),
            compareAtPrice: $model->compare_at_price
                ? new Money((int)$model->compare_at_price)
                : null,
            dimension: new Dimension(
                (float)$model->height_cm,
                $model->width_cm,
                $model->depth_cm
            ),
            weight: $model->weight_kg
                ? new Weight((float)$model->weight_kg)
                : null,
            isUnique: $model->is_unique,
            isHandmade: $model->is_handmade,
            craftedYear: $model->crafted_year,
            inventory: new Inventory(
                $model->quantity,
                $model->reserved_quantity
            ),
            leadTimeDays: $model->lead_time_days
        );
    }

    public static function toModel(Product $entity): ProductModel
    {
        $model = $entity->id
            ? ProductModel::findOrFail($entity->id)
            : new ProductModel();

        $model->sku = $entity->sku->value();
        $model->group_id = $entity->groupId;
        $model->category_id = $entity->categoryId;
        $model->theme_id = $entity->themeId;
        $model->wood_type_id = $entity->woodTypeId;
        $model->finish_id = $entity->finishId;
        $model->artisan_id = $entity->artisanId;
        $model->status_id = $entity->status->value();
        $model->name = $entity->name;
        $model->slug = $entity->slug?->value();
        $model->description = $entity->description;
        $model->price = $entity->price->amount();
        $model->compare_at_price = $entity->compareAtPrice?->amount();
        $model->height_cm = $entity->dimension->height;
        $model->width_cm = $entity->dimension->width;
        $model->depth_cm = $entity->dimension->depth;
        $model->weight_kg = $entity->weight?->value();
        $model->is_unique = $entity->isUnique;
        $model->is_handmade = $entity->isHandmade;
        $model->crafted_year = $entity->craftedYear;
        $model->quantity = $entity->inventory->available();
        $model->reserved_quantity = 0;
        $model->lead_time_days = $entity->leadTimeDays;

        return $model;
    }
}
